<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MempelaiPriaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataMempelaiPria = $request->user()->MempelaiPriaAPi;
        return view('user.mempelai-pria.index')
            ->with('user', $user)
            ->with('dataMempelaiPria', $dataMempelaiPria);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $dataMempelaiPria = $request->user()->MempelaiPriaAPi;
        $image_path = public_path('storage/images/' . $dataMempelaiPria->foto);
        $file = $request->file('imageFile');
        $tanggalLahir = $request->tanggalLahir;
        $namaLengkap = $request->namaLengkap;
        $namaPanggilan = $request->namaPanggilan;
        $namaAyah = $request->namaAyah;
        $namaIbu = $request->namaIbu;
        $tempatLahir = $request->tempatLahir;
        $instagram = $request->instagram;
        $tampilkanFoto = $request->tampilkanFoto;
        $facebook = $request->facebook;
        $twitter = $request->twitter;

        try {
            if ($file !== null) {
                $request->user()->MempelaiPriaAPi()->update([
                    'user_id' => $user->id,
                    'nama_lengkap' => $namaLengkap,
                    'nama_panggilan' => $namaPanggilan,
                    'nama_ayah' => $namaAyah,
                    'nama_ibu' => $namaIbu,
                    'foto' => $file->hashName(),
                    'tampilkan_foto' => $tampilkanFoto,
                    'instagram' => $instagram ?? 'null',
                    'facebook' => $facebook ?? 'null',
                    'twitter' => $twitter ?? 'null',
                ]);
            } else {
                $request->user()->MempelaiPriaAPi()->update([
                    'user_id' => $user->id,
                    'nama_lengkap' => $namaLengkap,
                    'nama_panggilan' => $namaPanggilan,
                    'nama_ayah' => $namaAyah,
                    'nama_ibu' => $namaIbu,
                    'foto' => 'null',
                    'tampilkan_foto' => $tampilkanFoto,
                    'instagram' => $instagram ?? 'null',
                    'facebook' => $facebook ?? 'null',
                    'twitter' => $twitter ?? 'null',
                ]);
            }
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        if ($file !== null) {
            $file->store('/images');
            $dataMempelaiPria->foto !== 'null' ? unlink($image_path) : '';
        }else{
            $dataMempelaiPria->foto !== "null" && $dataMempelaiPria->foto !== null ? unlink($image_path) : '';
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
