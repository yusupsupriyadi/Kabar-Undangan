<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicBackgroundController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('user.music-background.index')
            ->with('user', $user);
    }

    public function getData(Request $request){
        return response()->json($request->user()->musicBackgroundApi->toArray());
    }
}
