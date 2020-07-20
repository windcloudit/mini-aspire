<?php

namespace App\Services\AuthService;

use App\Exceptions\MyException;
use App\Models\UserModel;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\Auth;

/**
 *  Class AuthServiceImpl
 *
 * @category   \App
 * @package    \App\Services
 * @author     Tat Pham
 * @version    1.0
 * @see        AuthServiceImpl.php
 * @since      File available since Release 1.0
 */
class AuthServiceImpl implements AuthService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    /**
     * @var mixed
     */
    private $hasher;

    public function __construct(UserRepository $userRepository, HashManager $hasher)
    {
        $this->userRepository = $userRepository;
        $this->hasher = $hasher->driver();
    }

    /**
     * Function use for user login
     * @author: tat.pham
     *
     * @param string $email
     * @param string $password
     * @param string|null $isRemember
     * @return UserModel|null
     * @throws \Exception
     */
    public function login(string $email, string $password, string $isRemember = null): ?UserModel
    {
        try {
            // Get user by email
            $user = $this->userRepository->getFirstWhere([
                [UserModel::EMAIL, $email]
            ]);
            if (empty($user)) {
                throw new MyException(__('Email is not found'), MyException::LOGIN_ERROR);
            }
            // Check password default
            if ($this->hasher->check($password, $user->getPassword())) {
                Auth::login($user, $isRemember === 'on');
                return $user;
            }
            throw new MyException(__('Email or password is incorrect'), MyException::LOGIN_ERROR);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

}
