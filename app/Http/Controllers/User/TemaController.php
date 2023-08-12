<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.setting-tema.index')
            ->with('user', $user);
    }

    public function getData(Request $request)
    {
        return response()->json($request->user()->temaApi->toArray());
    }

    public function update(Request $request)
    {
        $data = Tema::findOrFail($request->id);
        $payload = [
            'tema' => $request->tema,
        ];

        try {
            Tema::where('id', $data->id)->update($payload);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
