<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\MusicBackground;
use App\Models\User\SettingUndangan;
use App\Models\User\Tema;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    private function generateUniqueUsername($username)
    {
        $newUsername = $username;
        $suffix = 1;

        while (User::where('name', $newUsername)->exists()) {
            $newUsername = $username . '-' . time();
            $suffix++;
        }

        return $newUsername;
    }

    public function store(Request $request)
    {
        $username = $this->generateUniqueUsername(strtolower($request->name));

        try {
            $user = User::create([
                'name' => $username,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
                'vip' => false
            ]);
        } catch (QueryException $e) {
            // jika error karena duplicate email
            if ($e->errorInfo[1] === 1062) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email already exists',
                ], 409);
            }

            // jika error lainnya
            return response()->json([
                'success' => false,
                'message' => 'Failed to create user',
            ], 500);
        }

        MusicBackground::create([
            'user_id' => $user->id,
            'music' => 'My Heart Will Go On - Sexaphone.mp3'
        ]);

        Tema::create([
            'user_id' => $user->id,
            'tema' => 'basic'
        ]);

        SettingUndangan::create([
            'user_id' => $user->id,
            'domain' => $username,
            'judul_undangan' => ucwords($request->nama_wanita . ' & ' . $request->nama_pria)
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
