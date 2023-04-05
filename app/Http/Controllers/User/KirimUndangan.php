<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KirimUndangan extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $mempelaiWanita = $user->mempelaiWanitaApi;
        $mempelaiPria = $user->mempelaiPriaApi;
        return view('user.kirim-undangan.index')
            ->with('user', $user)
            ->with('mempelaiWanita', $mempelaiWanita)
            ->with('mempelaiPria', $mempelaiPria);
    }
}
