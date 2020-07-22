<?php

namespace App\Services\LoanRegisterService;

use App\Http\Requests\LoanRegisterRequest;
use App\Models\LoanRegisterModel;
use App\Models\RepaymentModel;
use App\Models\UserModel;
use App\Repositories\LoanRegisterRepository\LoanRegisterRepository;
use App\Repositories\RepaymentRepository\RepaymentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 *  Class LoanRegisterServiceImpl
 *
 * @category   \App
 * @package    \App\Services
 * @author     Tat Pham
 * @version    1.0
 * @see        LoanRegisterServiceImpl.php
 * @since      File available since Release 1.0
 */
class LoanRegisterServiceImpl implements LoanRegisterService
{
    /**
     * @var LoanRegisterRepository
     */
    private LoanRegisterRepository $loanRegisterRepository;
    /**
     * @var RepaymentRepository
     */
    private RepaymentRepository $repaymentRepository;

    /**
     * LoanRegisterServiceImpl constructor.
     * @param LoanRegisterRepository $loanRegisterRepository
     * @param RepaymentRepository $repaymentRepository
     */
    public function __construct(LoanRegisterRepository $loanRegisterRepository, RepaymentRepository $repaymentRepository)
    {
        $this->loanRegisterRepository = $loanRegisterRepository;
        $this->repaymentRepository = $repaymentRepository;
    }

    /**
     * @param array $data
     * @return array|null
     * @throws \Exception
     */
    public function getPaymentList(array $data): ?array
    {
        try {
            $parameters = [
                $data[LoanRegisterModel::DOCUMENT_DATE],
                (float) $data[LoanRegisterModel::INTEREST_RATE],
                (int) $data[LoanRegisterModel::AMOUNT],
                (int) $data[LoanRegisterModel::LOAN_TERM]
            ];
            return $this->calculateRepaymentList(...$parameters);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @param array $data
     * @return int|null
     * @throws \Exception
     */
    public function loanRegister(array $data): ?int
    {
        try {
            DB::beginTransaction();
            $documentDate = $data[LoanRegisterModel::DOCUMENT_DATE];
            $interestRate = (float) $data[LoanRegisterModel::INTEREST_RATE];
            $amount = (int) $data[LoanRegisterModel::AMOUNT];
            $loanTerm = (int) $data[LoanRegisterModel::LOAN_TERM];

            /**@var UserModel $user*/
            $user = Auth::user();
            // Delete old data
            /**@var LoanRegisterModel $oldLoanRegister*/
            $oldLoanRegister = $this->loanRegisterRepository->getFirstWhere([
                [LoanRegisterModel::USER_ID, $user->getId()]
            ]);
            if ($oldLoanRegister) {
                $this->loanRegisterRepository->deleteById($oldLoanRegister->getId());
                // Delete old repayments
                $this->repaymentRepository->bulkDeleteByWhere([
                    [RepaymentModel::LOAN_REGISTER_ID, $oldLoanRegister->getId()]
                ]);
            }
            // create loan register
            $loanRegister = new LoanRegisterModel();
            $loanRegister->setUserId($user->getId())
                ->setDocumentDate($documentDate)
                ->setInterestRate($interestRate)
                ->setAmount($amount)
                ->setLoanTerm($loanTerm);
            $this->loanRegisterRepository->saveLoanRegister($loanRegister);
            // Create repayments
            $arrRepayments = $this->calculateRepaymentList($documentDate, $interestRate, $amount, $loanTerm, $loanRegister->getId());
            $result = $this->repaymentRepository->bulkInsert($arrRepayments);
            DB::commit();
            return $result;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param string $documentDate
     * @param float $interestRate
     * @param int $amount
     * @param int $loanTerm
     * @param int|null $loanRegisterId
     * @return array
     */
    private function calculateRepaymentList(string $documentDate, float $interestRate, int $amount, int $loanTerm, int $loanRegisterId = null): array
    {
        $now = Carbon::parse($documentDate);
        /**@var UserModel $user*/
        $user = Auth::user();
        $arrRepayment = [];
        $originalAmount = $amount;
        for ($week = 0; $week < $loanTerm; $week++) {
            $dueDate = clone $now;
            $repayment = new RepaymentModel();
            $amountPerWeek = $originalAmount / ($loanTerm - $week);
            $outstandingBalance = $originalAmount - $amountPerWeek;
            $interestAmount = $originalAmount * ($interestRate / 100);
            $repayment->setLoanRegisterId($loanRegisterId)
            ->setRepaymentDueDate($dueDate->addWeeks($week + 1)->format('Y-m-d'))
            ->setWeek($week + 1)
            ->setOriginalAmount($amountPerWeek)
            ->setInterestAmount($interestAmount)
            ->setTotalAmount($amountPerWeek + $interestAmount)
            ->setOutstandingBalance($outstandingBalance)
            ->setCreatedAt(Carbon::now())
            ->setUpdatedAt(Carbon::now())
            ->setCreatedBy($user->getId())
            ->setUpdatedBy($user->getId());

            $arrRepayment[] = $repayment->attributesToArray();
            $originalAmount = $outstandingBalance;
        }
        return $arrRepayment;
    }
}
