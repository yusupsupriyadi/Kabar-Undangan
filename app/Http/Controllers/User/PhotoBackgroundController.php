<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\PhotoBackground;
use Illuminate\Http\Request;

class PhotoBackgroundController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('user.photo-background.index')
            ->with('user', $user);
    }

    public function getData(Request $request){
        return response()->json($request->user()->photoBackgroundApi->toArray());
    }

    public function store(Request $request){
        $user = auth()->user();
        $image_path = public_path('storage/images/');
        $file = $request->file('imageFile');

        try {
            if ($file !== null) {
                $request->user()->photoBackgroundApi()->create([
                    'gambar' => $file->hashName(),
                    'judul' => $request->judul,
                    'keterangan' => $request->keterangan,
                ]);
            } else {
                $request->user()->photoBackgroundApi()->create([
                    'gambar' => 'null',
                    'judul' => $request->judul,
                    'keterangan' => $request->keterangan,
                ]);
            }
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        if ($file !== null) {
            $file->store('/images');
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->idData;
        $user = $request->user();
        $dataForDelete = $user->photoBackgroundApi()->findOrFail($id);
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

    public function update(Request $request){
        $user = auth()->user();
        $image_path = public_path('storage/images/');
        $file = $request->file('imageFile');
        $data = PhotoBackground::findOrFail($request->id);
        $image_path = public_path('storage/images/' . $data->gambar);

        $payload = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ];

        if ($file !== null) {
            $payload['gambar'] = $file->hashName();
        }

        try {
            PhotoBackground::where('id', $request->id)->update($payload);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        if ($file !== null) {
            unlink($image_path);
            $file->store('/images');
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
