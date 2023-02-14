<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = User::find($id);
        $mempelaiPria = $user->MempelaiPria;
        $mempelaiWanita = $user->mempelaiWanitaApi;
        return view('undangan.index')
            ->with('mempelaiPria', $mempelaiPria)
            ->with('mempelaiWanita', $mempelaiWanita);
    }
}
