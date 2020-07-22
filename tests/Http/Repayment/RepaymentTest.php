<?php

namespace Tests\Http;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Tests\TestCase;

class RepaymentTest extends TestCase
{
    /**
     * Setup for new test case.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /*
    * Test testCheck
    */
    public function testIndex()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $user = $this->createUserForTest($email, $password);
        $this->be($user);

        $data = [
            'interest_rate' => 1,
            'loan_term' => 12,
            'amount' => 100000,
        ];
        $response = $this->get(route('repayments.list', $data));
        $response->assertStatus(200);
    }

    /*
    * Test testSubmit
    */
    public function testSubmit()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $user = $this->createUserForTest($email, $password);
        $this->be($user);

        $data = [
            'document_date' => Carbon::now()->format('Y-m-d'),
            'interest_rate' => 1,
            'loan_term' => 12,
            'amount' => 100000,
        ];
        $response = $this->post(route('loan.submit'), $data);
        $response->assertStatus(200);
    }
}
