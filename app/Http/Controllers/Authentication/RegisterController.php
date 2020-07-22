<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Repositories\UserRepository\UserRepository;
use App\Services\AuthService\AuthService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest');
        $this->authService = $authService;
    }

    /**
     * Index register page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth/register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     * @author: tat.pham
     *
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function create(array $data)
    {
        try {
            $parameters = array_values(array_slice($data, 1));
            return $this->authService->register(...$parameters);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
