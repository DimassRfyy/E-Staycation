<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
    $googleUser = Socialite::driver('google')->user();

    $registeredUser = User::where('google_id', $googleUser->getId())->first();

    if ($registeredUser) {
        Auth::login($registeredUser);

        return redirect()->route('front.index');
    } else {
        $user = User::updateOrCreate([
            'google_id' => $googleUser->getId(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt($googleUser->getId()),
            'avatar' => $googleUser->getAvatar(),
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
        
        $user->assignRole('customer');

        event(new Registered($user));

        Auth::login($user);
    
        return redirect(route('front.index', absolute: false));
    }
    }
}
