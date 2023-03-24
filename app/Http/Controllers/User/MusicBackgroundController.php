<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MusicBackgroundController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $data = $request->user()->musicBackgroundApi;
        return view('user.music-background.index')
            ->with('user', $user)
            ->with('data', $data);
    }

    public function getData(Request $request){
        return response()->json($request->user()->musicBackgroundApi->toArray());
    }

    public function update(Request $request){
        try {
            if ($request->dataExist === null) {
                $request->user()->musicBackgroundApi()->create([
                    'music' => $request->value,
                ]);
            } else {
                $request->user()->musicBackgroundApi()->update([
                    'music' => $request->value,
                ]);
            }
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
