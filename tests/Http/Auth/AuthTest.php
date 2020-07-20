<?php

namespace Tests\Http;

use Faker\Factory as Faker;
use Tests\TestCase;

class LoginTest extends TestCase
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
    public function testLogin()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $this->createUserForTest($email, $password);
        $data = [
            'email' => $email,
            'password' => $password
        ];
        $response = $this->post(route('login'), $data);
        $response->assertStatus(302);
    }

}
