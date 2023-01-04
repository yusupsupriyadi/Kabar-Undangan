<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingUndanganController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('user.setting-undangan.index')
        ->with('user', $user);
    }
}
