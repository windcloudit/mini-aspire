<?php

namespace App\Services\LoanRegisterService;

use App\Http\Requests\LoanRegisterRequest;
use App\Models\LoanRegisterModel;
use App\Models\RepaymentModel;
use App\Repositories\LoanRegisterRepository\LoanRegisterRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

    public function __construct(LoanRegisterRepository $loanRegisterRepository)
    {
        $this->loanRegisterRepository = $loanRegisterRepository;
    }

    // Implement function interface here
    public function getPaymentList(LoanRegisterRequest $request): ?array
    {
        try {
            $parameters = array_values($request->only(LoanRegisterModel::INTEREST_RATE, LoanRegisterModel::AMOUNT,
                LoanRegisterModel::LOAN_TERM));
            return $this->calculateRepaymentList(...$parameters);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    private function calculateRepaymentList(float $interestRate, int $amount, int $loanTerm, int $loanRegisterId = null)
    {
        $now = Carbon::now();
        $arrRepayment = [];
        $originalAmount = $amount;
        for ($week = 0; $week < $loanTerm; $week++) {
            $dueDate = clone $now;
            $repayment = new RepaymentModel();
            $amountPerWeek = $originalAmount/($loanTerm - $week);
            $outstandingBalance = $originalAmount - $amountPerWeek;
            $interestAmount = $originalAmount * ($interestRate/100);
            $repayment->setLoanRegisterId($loanRegisterId)
            ->setRepaymentDueDate($dueDate->addWeeks($week + 1)->format('Y-m-d'))
            ->setWeek($week+1)
            ->setOriginalAmount($amountPerWeek)
            ->setInterestAmount($interestAmount)
            ->setTotalAmount($amountPerWeek + $interestAmount)
            ->setOutstandingBalance($outstandingBalance);

            $arrRepayment[] = $repayment;
            $originalAmount = $outstandingBalance;
        }
        return $arrRepayment;
    }
}
