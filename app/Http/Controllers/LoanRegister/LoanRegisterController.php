<?php

namespace App\Http\Controllers\LoanRegister;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanRegisterRequest;
use App\Services\LoanRegisterService\LoanRegisterService;

class LoanRegisterController extends Controller
{
    /**
     * @var LoanRegisterService
     */
    private LoanRegisterService $loanRegisterService;

    /**
     * Create a new controller instance.
     *
     * @param LoanRegisterService $loanRegisterService
     */
    public function __construct(LoanRegisterService $loanRegisterService)
    {
        $this->loanRegisterService = $loanRegisterService;
    }

    /**
     * @param LoanRegisterRequest $request
     * @return array|null
     * @throws \Exception
     */
    public function check(LoanRegisterRequest $request)
    {
        try {
            return $this->loanRegisterService->getPaymentList($request);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Function use for submit loan register
     * @uthor: tat.pham
     *
     * @param LoanRegisterRequest $request
     * @return int
     * @throws \Exception
     */
    public function submit(LoanRegisterRequest $request)
    {
        try {
            return $this->loanRegisterService->loanRegister($request);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
