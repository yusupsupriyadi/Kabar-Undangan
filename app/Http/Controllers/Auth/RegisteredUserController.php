<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\MusicBackground;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'vip' => false
        ]);

        MusicBackground::create([
            'user_id' => $user->id,
            'music' => 'My Heart Will Go On - Sexaphone.mp3'
        ]);

        Auth::login($user);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function completeRegister(Request $request)
    {
        $dataMempelaiPria = $request->user()->MempelaiPriaAPi;
        $dataMempelaiWanita = $request->user()->mempelaiWanitaApi;
        return view('user.complete-register.index')
            ->with('dataMempelaiPria', $dataMempelaiPria)
            ->with('dataMempelaiWanita', $dataMempelaiWanita);
    }
}
