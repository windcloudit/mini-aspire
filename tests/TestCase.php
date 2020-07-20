<?php

namespace Tests;

use App\Models\UserModel;
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
}
