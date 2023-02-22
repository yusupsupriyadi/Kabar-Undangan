<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CeritaCintaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $data = $request->user()->ceritaCintaApi;
        return view('user.cerita-cinta.index')
            ->with('user', $user)
            ->with('data', $data);
    }
}
