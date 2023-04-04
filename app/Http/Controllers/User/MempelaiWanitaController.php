<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MempelaiWanitaController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataMempelaiWanita = $request->user()->mempelaiWanitaApi;
        return view('user.mempelai-wanita.index')
            ->with('user', $user)
            ->with('dataMempelaiWanita', $dataMempelaiWanita);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $dataMempelaiWanita = $request->user()->mempelaiWanitaApi;
        $image_path = public_path('storage/images/' . $dataMempelaiWanita->foto);
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
                $request->user()->mempelaiWanitaApi()->update([
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
                $request->user()->mempelaiWanitaApi()->update([
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
            $dataMempelaiWanita->foto !== 'null' ? unlink($image_path) : null;
        }else{
            $dataMempelaiWanita->foto !== 'null' && $dataMempelaiWanita->foto !== null ? unlink($image_path) : null;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
