<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard.index');
    }

    public function users(){
        return view('admin.users.index');
    }

    public function getUsers(){
        $data = collect(User::all())->sortBy('vip')->reverse()->values()->toArray();

        $data = array_filter($data, function($item) {
            return $item['role'] !== 'admin';
        });

        $data = array_values($data);

        return response()->json($data);
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->vip = $request->status;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diupdate'
        ]);
    }
}
