<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }

        $authUser = $this->findOrCreateUser($user);

        Auth()->login($authUser, true);
        return redirect()->route('dashboard')->with(['user'=>$authUser]);
    }

    public function findOrCreateUser($socialUser)
    {
        $socialAccount = User::where('google_id', $socialUser->google_id)->first();

        if ($socialAccount) {
            return $socialAccount->user;

        } else {

            $user = User::where('email', $socialUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name'  => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make('12345678'),
                    'google_id' => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'created_at' => Carbon::now(),
                    'status' => 'Aktif',
                ]);
            }

            return $user;
        }
    }

    public function dashboard()
    {
        $userLogin = Auth::user();
        return view('dashboard',['user'=>$userLogin]);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}

