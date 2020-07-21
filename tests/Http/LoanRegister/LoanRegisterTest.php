<?php

namespace Tests\Http;

use Faker\Factory as Faker;
use Tests\TestCase;

class LoanRegisterTest extends TestCase
{
    /**
     * Setup for new test case.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /*
    * Test testCreateUser
    */
    public function testCheck()
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
        $response = $this->get(route('loan.check', $data));
        $response->assertStatus(200);
    }

}
