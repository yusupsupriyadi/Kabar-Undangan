<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.setting-tema.index')
            ->with('user', $user);
    }
}
