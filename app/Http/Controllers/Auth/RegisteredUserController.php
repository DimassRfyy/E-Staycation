<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Cek apakah file avatar diupload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } else {
            return redirect()->back()->withErrors(['avatar' => 'Avatar is required.']);
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'avatar' => $avatarPath,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Beri role kepada user baru
        $user->assignRole('customer');

        // Trigger event 'Registered'
        event(new Registered($user));

        // Login user yang baru dibuat
        Auth::login($user);

        // Debug untuk memastikan user berhasil dibuat
        // Redirect ke dashboard setelah berhasil login
        return redirect(route('dashboard', absolute: false));
    }
}
