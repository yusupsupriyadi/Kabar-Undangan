<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function users()
    {
        return view('admin.users.index');
    }

    public function blog()
    {
        return view('admin.blog.index');
    }

    public function getUsers()
    {
        $data = collect(User::all())->sortBy('vip')->reverse()->values()->toArray();

        $data = array_filter($data, function ($item) {
            return $item['role'] !== 'admin';
        });

        $data = array_values($data);

        return response()->json($data);
    }

    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->vip = $request->status;
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil diupdate'
        ]);
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->id);

        $mempelaiPria = $user->MempelaiPriaApi ? $user->MempelaiPriaApi->toArray() : $user->MempelaiPriaApi;
        $this->deleteImage($mempelaiPria['foto']);

        $mempelaiWanita = $user->MempelaiWanitaApi ? $user->MempelaiWanitaApi->toArray() : $user->MempelaiWanitaApi;
        $this->deleteImage($mempelaiWanita['foto']);

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User berhasil dihapus'
        ]);
    }

    private function deleteImage($imageName)
    {
        if ($imageName !== 'null') {
            $image_path = public_path('storage/images/' . $imageName);
            try {
                unlink($image_path);
            } catch (\Throwable $th) {
            }
        }
    }
}
