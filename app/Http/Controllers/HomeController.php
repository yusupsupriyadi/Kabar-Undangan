<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request){

        if($request->user()->role === 'admin'){
            return redirect()->route('admin.dashboard');
        }

        $dataMempelaiWanita = $request->user()->mempelaiWanitaApi;
        if($dataMempelaiWanita === null){
            return redirect()->route('complete-register');
        }
        $user = $request->user();
        return view('user.dashboard')
        ->with('dataMempelaiWanita', $dataMempelaiWanita)
        ->with('user', $user);
    }
}
