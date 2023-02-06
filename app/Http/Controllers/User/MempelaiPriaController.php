<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MempelaiPriaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataMempelaiPria = $request->user()->mempelai_pria;
        return view('user.mempelai-pria.index')
            ->with('user', $user)
            ->with('dataMempelaiPria', $dataMempelaiPria);
    }
}
