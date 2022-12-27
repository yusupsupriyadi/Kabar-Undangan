<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request){
        $dataMempelaiWanita = $request->user()->mempelai_wanita;
        $user = $request->user();
        return view('dashboard')
        ->with('dataMempelaiWanita', $dataMempelaiWanita)
        ->with('user', $user);
    }
}
