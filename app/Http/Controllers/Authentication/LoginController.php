<?php

namespace App\Http\Controllers\Authentication;

use App\Exceptions\MyException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\UserModel;
use App\Providers\RouteServiceProvider;
use App\Services\AuthService\AuthService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var AuthService
     */
    private AuthService $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
    }

    /**
     * Index register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth/login');
    }

    /**
     * Action login
     * @author: tat.pham
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = array_values($request->only(UserModel::EMAIL, UserModel::PASSWORD,
                UserModel::REMEMBER_TOKEN));
            $this->authService->login(...$credentials);
            return redirect()->intended('/')->with('status', 'Login successful');
        } catch (MyException $exception) {
            return redirect('login')->withErrors(['email' => $exception->getMessage()]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
