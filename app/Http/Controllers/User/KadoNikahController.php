<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\KadoNikah;
use Illuminate\Http\Request;

class KadoNikahController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.kado-nikah.index')
            ->with('user', $user);
    }

    public function getData(Request $request)
    {
        return response()->json($request->user()->kadoNikahApi->toArray());
    }

    public function store(Request $request)
    {
        try {
            $request->user()->kadoNikahApi()->create([
                'type' => $request->type,
                'wallet' => $request->wallet,
                'no_wallet' => $request->no_wallet,
                'user_wallet' => $request->user_wallet
            ]);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function update(Request $request)
    {
        $data = KadoNikah::findOrFail($request->id);
        $payload = [
            'type' => $request->type,
            'wallet' => $request->wallet,
            'no_wallet' => $request->no_wallet,
            'user_wallet' => $request->user_wallet
        ];

        try {
            KadoNikah::where('id', $data->id)->update($payload);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = $request->user();
        $dataForDelete = $user->kadoNikahApi()->findOrFail($id);

        try {
            $dataForDelete->delete();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
