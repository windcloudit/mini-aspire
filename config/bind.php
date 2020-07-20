<?php

declare(strict_types=1);

/**
 * Array for injection service and repository
 *
 * @author: tat.pham
 */

return [
    // Service Injection

    \App\Services\AuthService\AuthService::class,
    \App\Services\LoanRegisterService\LoanRegisterService::class,
    //*******************AUTO GENERATED - DO NOT MODIFY FROM HERE******************************
    \App\Repositories\UserRepository\UserRepository::class,
    \App\Repositories\LoanRegisterRepository\LoanRegisterRepository::class,
    \App\Repositories\RepaymentRepository\RepaymentRepository::class,

];
