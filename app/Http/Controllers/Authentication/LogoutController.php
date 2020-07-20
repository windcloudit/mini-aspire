<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Action logut
     * @author: tat.pham
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function logout()
    {
        try {
            Auth::logout();
            return redirect()->intended('/login');
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
