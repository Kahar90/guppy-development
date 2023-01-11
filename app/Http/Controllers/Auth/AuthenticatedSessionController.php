<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    // login with github
    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallbackGithub()
    {
        $user = Socialite::driver('github')->stateless()->user();

        // $user->token;
        // add user to datbase

        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'password' => Hash::make('123456789'),
        ]);

        Auth::login($user);

        // go to this link /dashboard
       return redirect()->to('/dashboard');
    }


    //login with google
    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }



    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->name,
            'password' => Hash::make('123456789'),
        ]);

        Auth::login($user);

        // go to this link /dashboard
         return redirect()->to('/dashboard');
    }
}
