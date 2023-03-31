<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\CeritaCinta;
use Illuminate\Http\Request;

class CeritaCintaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $data = $request->user()->ceritaCintaApi->toArray();
        return view('user.cerita-cinta.index')
            ->with('user', $user)
            ->with('data', $data);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $image_path = public_path('storage/images/');
        $file = $request->file('imageFile');

        try {
            if ($file !== null) {
                $request->user()->ceritaCintaApi()->create([
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                    'cerita' => $request->cerita,
                ]);
            } else {
                $request->user()->ceritaCintaApi()->create([
                    'gambar' => 'null',
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                    'cerita' => $request->cerita,
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

    public function getData(Request $request)
    {
        $data = $request->user()->ceritaCintaApi->toArray();

        return response()->json($data);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = $request->user();
        $dataForDelete = $user->ceritaCintaApi()->findOrFail($id);
        $gambarHasName = $dataForDelete->gambar;

        try {
            $dataForDelete->delete();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        if ($gambarHasName !== 'null') {
            $path = public_path('storage/images/' . $gambarHasName);
            unlink($path);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }

    public function update(Request $request)
    {
        $file = $request->file('imageFile');
        $ceritaCinta = CeritaCinta::findOrFail($request->id);
        $image_path = public_path('storage/images/' . $ceritaCinta->gambar);

        $payload = [
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'cerita' => $request->cerita,
        ];

        try {
            CeritaCinta::where('id', $request->id)->update($payload);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
