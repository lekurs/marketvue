<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmablePasswordController extends Controller
{
    public function show(Request $request): View
    {
        return view('auth::pages.auth.confirm-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $auth = auth()->validate([
            'email' => $request->user()->email,
            'password' => $request->get('password')
        ]);

        return !$auth
            ? back()->withErrors(['password' => trans('auth::auth.auth.password')])
            : $this->sendConfirmationResponse($request);
    }

    private function sendConfirmationResponse(Request $request): RedirectResponse
    {
        $request->session()->put('auth.password_confirmed_at', time());
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
