<?php

namespace App\Http\Controllers\Repayment;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanRegisterRequest;
use App\Services\RepaymentService\RepaymentService;

class RepaymentController extends Controller
{
    /**
     * @var RepaymentService
     */
    private RepaymentService $repaymentService;

    /**
     * Create a new controller instance.
     *
     * @param RepaymentService $repaymentService
     */
    public function __construct(RepaymentService $repaymentService)
    {
        $this->repaymentService = $repaymentService;
    }

    /**
     * @param LoanRegisterRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $data = $this->repaymentService->getRepaymentList();
            return view('repayment/index', ['data' => $data]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function submit(int $id)
    {
        try {
            return $this->repaymentService->submitRepay($id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
