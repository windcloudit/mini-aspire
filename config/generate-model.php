<?php

declare(strict_types=1);

/**
 * Array for mapping table in database to model file in project
 * This file be use for generate artisan model command line
 *
 * @author: tat.pham
 */

return [
    'models' => [
        'users' => 'User',
        'loan_registers' => 'LoanRegister',
        'repayments' => 'Repayment',
    ],
    'constants' => [
    ],
    'author' => 'Tat Pham'
];
