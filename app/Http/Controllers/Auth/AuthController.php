<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * __construct
     *
     *
     */
    public function __construct()
    {
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
     * @param AuthRequest $request
     *
     * @return [type]
     *
     */
    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
        }

        // chuyển về lại form đăng nhập->giữ lại email->hiển thị lỗi
        return back()->withInput($request->only('email'))->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
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

        return redirect()->route('login');
    }
}
