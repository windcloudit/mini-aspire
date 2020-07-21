<?php

namespace Tests\Http;

use App\Services\AuthService\AuthService;
use Faker\Factory as Faker;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    /**
     * Setup for new test case.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /*
    * Test testLogin
    */
    public function testLogin()
    {
        $faker = Faker::create();
        $email = $faker->email;
        $password = $faker->password;
        $this->createUserForTest($email, $password);
        // create instance AuthService
        /**@var AuthService $authService*/
        $authService = $this->app->make(AuthService::class);
        $response = $authService->login($email, $password);
        $response->assertStatus(302);
    }

}
