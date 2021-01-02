<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $user = $this->findOrCreateUser(Socialite::driver('github')->user());
        Auth::login($user);
        return redirect(route('trains.index'));
    }

    public function findOrCreateUser($githubUser)
    {
        try {
            $user = User::where('github_id', $githubUser->getId())->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            try {
                $user = User::where('email', $githubUser->getEmail())->firstOrFail();
                $user->update(['github_id' => $githubUser->getId()]);
            } catch (ModelNotFoundException $exception) {
                $user = User::create([
                    'name' => $githubUser->getNickname(),
                    'email' => $githubUser->getEmail(),
                    'password' => Hash::make(Str::random(32)),
                    'github_id' => $githubUser->getId(),
                ]);
                $user->markEmailAsVerified();
            }
        }
        return $user;
    }
}
