<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request, $id)
    {
        $user = User::find($id);
        $mempelaiPria = $user->mempelai_pria;
        $mempelaiWanita = $user->mempelai_wanita;
        return view('undangan.index')
            ->with('mempelaiPria', $mempelaiPria)
            ->with('mempelaiWanita', $mempelaiWanita);
    }
}
