<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userService;

    /**
     * __construct
     *
     *
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * page login
     *
     * @return [type]
     *
     */
    public function index()
    {
        // check auth
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        // return page login
        return view('auth.login');
    }

    /**
     * submit login
     *
     * @param LoginRequest $request
     *
     * @return [type]
     *
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', __('messages.login_susscess'));
        }

        // login fails -> redirect form login
        return back()->withInput($request->only('email'))->withErrors(['email' => __('messages.error_email_password')]);
    }

    /**
     * submit logout
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }

    /**
     * page forgot_password
     *
     * @return [type]
     *
     */
    public function forgotPassword()
    {
        // check auth
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        // return page forgot_password
        return view('auth.forgot_password');
    }

    /**
     * submit forgot_password
     *
     * @param Request $request
     *
     * @return [type]
     *
     */
    public function submitForgotPassword(Request $request)
    {
        try {
            // call service update password
            $update = $this->userService->updatePassword($request['email']);

            // check data
            if ($update) {
                // redirect route login
                return redirect()->route('auth.login');
            } else {
                // return page when email not exits
                return redirect()->back()->with('error', __('messages.email_not_exits'));
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
