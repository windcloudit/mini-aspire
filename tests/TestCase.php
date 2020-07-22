<?php

namespace Tests;

use App\Models\LoanRegisterModel;
use App\Models\UserModel;
use App\Services\LoanRegisterService\LoanRegisterService;
use App\Services\RepaymentService\RepaymentService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

abstract class TestCase extends BaseTestCase
{
    use DatabaseTransactions;
    use CreatesApplication;
    use WithoutMiddleware; // use the trait

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        Session::start();
        $this->withoutMiddleware(
            ThrottleRequests::class
        );
    }

    /**
     * Function use fore create default user for testing
     * @author tatpham
     *
     * @param string $email
     * @param string $password
     * @return UserModel
     */
    protected function createUserForTest($email = '', $password = ''): UserModel
    {
        $faker = Faker::create();

        if ($email === '') {
            $email = $faker->email;
        }
        if ($password === '') {
            $password = $faker->password;
        }
        // Create a user for testing
        $user = new UserModel();
        $user->setName($faker->userName)
            ->setPassword(Hash::make($password))
            ->setEmail($email)
            ->save();
        return $user;
    }

    /**
     * @param string $documentDate
     * @param int $amount
     * @param int $interestRate
     * @param int $loanTerm
     * @return int|null
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function createRepaymentListForTest(string $documentDate, int $amount = 1000, int $interestRate = 1, int $loanTerm = 10): ?int
    {
        // Create repayment
        /**@var LoanRegisterService $loanRegisterService*/
        $loanRegisterService = $this->app->make(LoanRegisterService::class);
        $parameters = [
            'document_date' => $documentDate,
            'interest_rate' => $interestRate,
            'amount' => $amount,
            'loan_term' => $loanTerm
        ];
        return $loanRegisterService->loanRegister($parameters);
    }
}
