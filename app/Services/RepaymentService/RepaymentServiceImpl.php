<?php

namespace App\Services\RepaymentService;

use App\Exceptions\MyException;
use App\Models\RepaymentModel;
use App\Models\UserModel;
use App\Repositories\RepaymentRepository\RepaymentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 *  Class RepaymentServiceImpl
 *
 * @category   \App
 * @package    \App\Services
 * @author     Tat Pham
 * @version    1.0
 * @see        RepaymentServiceImpl.php
 * @since      File available since Release 1.0
 */
class RepaymentServiceImpl implements RepaymentService
{
    /**
     * @var RepaymentRepository
     */
    private RepaymentRepository $repaymentRepository;

    /**
     * RepaymentServiceImpl constructor.
     * @param RepaymentRepository $repaymentRepository
     */
    public function __construct(RepaymentRepository $repaymentRepository)
    {
        $this->repaymentRepository = $repaymentRepository;
    }

    public function getRepaymentList(): ?array
    {
        try {
            $data = $this->repaymentRepository->getRepaymentList();
            return $data->toArray();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Function use for update repayment record
     * @author: tat.pham
     *
     * @param int $id
     * @return array|null
     * @throws \Exception
     */
    public function submitRepay(int $id): ?array
    {
        try {
            // Update status of this repay id
            /**@var UserModel $user*/
            $user = Auth::user();
            /**@var RepaymentModel $repayment*/
            $repayment = $this->repaymentRepository->getById($id);
            if ($user->getId() !== $repayment->getCreatedBy()) {
                throw new MyException(__('This record is not your'), MyException::DENY);
            }
            if (Carbon::now()->lt($repayment->getRepaymentDueDate())) {
                throw new MyException(__('This record is invalid'), MyException::DENY);
            }
            // Update status
            $repayment->setStatus(config('constants.status.repayment.done'));
            // Save it
            $this->repaymentRepository->saveRepayment($repayment);
            // Get repayment list again
            $data = $this->repaymentRepository->getRepaymentList();
            return $data->toArray();
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
