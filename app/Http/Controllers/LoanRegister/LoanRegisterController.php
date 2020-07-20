<?php

namespace App\Http\Controllers\LoanRegister;

use App\Http\Controllers\Controller;
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
     * @return void
     */
    public function __construct(LoanRegisterService $loanRegisterService)
    {
        $this->loanRegisterService = $loanRegisterService;
    }

    /**
     * Index register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        try {

        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
