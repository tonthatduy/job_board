<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(Request $request): RedirectResponse|View
    {
        if ($request->session()->get('admin') === true) {
            return redirect()->route('admin.jobs.index');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $configured = config('admin.password');

        if ($configured === null || $configured === '') {
            abort(500, 'Chưa cấu hình ADMIN_PASSWORD trong file .env');
        }

        $request->validate([
            'password' => ['required', 'string'],
        ]);

        if (! hash_equals((string) $configured, (string) $request->input('password'))) {
            return back()
                ->withErrors(['password' => 'Mật khẩu không đúng.'])
                ->onlyInput('password');
        }

        $request->session()->put('admin', true);

        return redirect()->intended(route('admin.jobs.index'));
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('admin');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
