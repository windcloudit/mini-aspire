<?php

namespace App\Services\LoanRegisterService;

use App\Http\Requests\LoanRegisterRequest;

/**
 *  Interface LoanRegisterService
 *
 * @category   \App
 * @package    \App\Services
 * @author     Tat Pham
 * @version    1.0
 * @see        {modelName}Service.php
 * @since      File available since Release 1.0
 */
interface LoanRegisterService
{
    // interface function here
    public function getPaymentList(LoanRegisterRequest $request): ?array;
    public function loanRegister(LoanRegisterRequest $request): ?int;
}
