<?php

namespace Tests\Http;

use App\Services\LoanRegisterService\LoanRegisterService;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Tests\TestCase;

class LoanRegisterServiceTest extends TestCase
{
    /**
     * Setup for new test case.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /*
    * Test testGetPaymentList
    */
    public function testGetPaymentList()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $user = $this->createUserForTest($email, $password);
        // create instance AuthService
        $this->be($user);
        $parameters = [
            'document_date' => Carbon::now()->format('Y-m-d'),
            'interest_rate' => 1,
            'amount' => 1000,
            'loan_term' => 10
        ];
        // Create repayment list
        $this->createRepaymentListForTest(...(array_values($parameters)));
        // Create loan register service
        /**@var LoanRegisterService $loanRegisterService*/
        $loanRegisterService = $this->app->make(LoanRegisterService::class);
        $result = $loanRegisterService->getPaymentList($parameters);
        $this->assertCount(10, $result);
    }

    public function testLoanRegister()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $user = $this->createUserForTest($email, $password);
        // create instance AuthService
        $this->be($user);

        $parameters = [
            'document_date' => Carbon::now()->format('Y-m-d'),
            'interest_rate' => 1,
            'amount' => 1000,
            'loan_term' => 10
        ];
        // Create loan register service
        /**@var LoanRegisterService $loanRegisterService*/
        $loanRegisterService = $this->app->make(LoanRegisterService::class);
        $result = $loanRegisterService->loanRegister($parameters);
        $this->assertEquals(1, $result);
    }
}
