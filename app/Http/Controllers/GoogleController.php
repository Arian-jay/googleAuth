<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    // Redirect to Google for authentication
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google callback and log the user in
    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        
        // Find or create the user
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('defaultpassword') // Set a default password or handle accordingly
            ]
        );

        // Log in the user
        Auth::login($user);

        // Redirect to a desired route after login
        return redirect()->route('dashboard'); // Update with the appropriate route for your app
    }
}