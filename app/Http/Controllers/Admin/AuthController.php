<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the Admin Login Form
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Handle Login Submission
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the input data
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required'    => 'البريد الإلكتروني مطلوب.',
            'email.email'       => 'يرجى إدخال بريد إلكتروني صحيح.',
            'password.required' => 'كلمة المرور مطلوبة.',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation
            $request->session()->regenerate();

            // Redirect to intended page or admin dashboard
            return redirect()->intended('/admin/dashboard')->with('success', 'تم تسجيل الدخول بنجاح!');
        }

        // Authentication failed, redirect back with errors
        return back()->withErrors([
            'email' => 'بيانات الاعتماد المدخلة غير صحيحة.',
        ])->withInput();
    }

    /**
     * Handle Logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'تم تسجيل الخروج بنجاح!');
    }
}