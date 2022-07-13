<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $validated = collect($request->validated());

        //On vérifie que le slug ne soit pas déjà utilisé
        $checkSlug = User::whereSlug(Str::lower($validated->get('lastname') . '-' . $validated->get('name')))->get();

        if($checkSlug->isEmpty()) {

            $slug = Str::lower($validated->get('lastname') . '-' . $validated->get('name'));

        } else {
            $last = $checkSlug->last()->id;
            $slug = Str::lower($validated->get('lastname') . '-' . $validated->get('name')) . '-' . $last;
        }

        $user = User::create([
            'name' => $validated->get('name'),
            'lastname' => $validated->get('lastname'),
            'email' => $validated->get('email'),
            'password' => Hash::make($validated->get('password')),
//            'terms' => $validated->has('terms') ? now() : null,
//            'privacy' => $validated->has('privacy') ? now() : null,
            'slug' => $slug
        ]);

        //Add role 2 to user create
        $user->roles()->sync(2, false);
        auth()->login($user);
        event(new Registered($user));
        $user->notify(new VerifyEmailNotification);
        return redirect(RouteServiceProvider::HOME)->with('success', trans('auth::auth.register.validating'));
    }
}
