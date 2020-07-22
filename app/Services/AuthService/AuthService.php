<?php

namespace App\Services\AuthService;

use App\Models\UserModel;

/**
 *  Interface AuthService
 *
 * @category   \App
 * @package    \App\Services
 * @author     Tat Pham
 * @version    1.0
 * @see        {modelName}Service.php
 * @since      File available since Release 1.0
 */
interface AuthService
{
    // interface function here
    public function login(string $email, string $password, string $isRemember = null): ?UserModel;
    public function register(string $name, string $email, string $password): ?UserModel;
}
