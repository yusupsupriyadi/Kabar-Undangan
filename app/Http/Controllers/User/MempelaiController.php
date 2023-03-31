<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MempelaiController extends Controller
{
    public function getDataMempelaiPria(Request $request)
    {
        $dataMempelaiPria = $request->user()->mempelai_pria;
        return response()->json([
            'message' => 'success',
            'data' => $dataMempelaiPria
        ]);
    }

    public function getDataMempelaiWanita(Request $request)
    {
        $dataMempelaiWanita = $request->user()->mempelaiWanitaApi;
        return response()->json([
            'message' => 'success',
            'data' => $dataMempelaiWanita
        ]);
    }

    public function storeMempelaiPria(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiPria = $request->dataMempelaiPria;

        $user->MempelaiPriaApi()->create([
            'user_id' => $user->id,
            'nama_lengkap' => ucfirst($dataMempelaiPria['nama_lengkap']),
            'nama_panggilan' => ucfirst($dataMempelaiPria['nama_panggilan']),
            'tempat_lahir' => 'null',
            'tanggal_lahir' => 'null',
            'nama_ayah' => $dataMempelaiPria['nama_ayah'],
            'nama_ibu' => $dataMempelaiPria['nama_ibu'],
            'foto' => 'null',
            'tampilkan_foto' => 'false',
            'instagram' =>  'null',
            'facebook' => 'null',
            'twitter' => 'null',
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function updateMempelaiPria(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiPria = $request->dataMempelaiPria;

        $user->MempelaiPriaApi()->update([
            'user_id' => $user->id,
            'nama_lengkap' => ucfirst($dataMempelaiPria['nama_lengkap']),
            'nama_panggilan' => ucfirst($dataMempelaiPria['nama_panggilan']),
            'tempat_lahir' => 'null',
            'tanggal_lahir' => 'null',
            'nama_ayah' => $dataMempelaiPria['nama_ayah'],
            'nama_ibu' => $dataMempelaiPria['nama_ibu'],
            'foto' => 'null',
            'tampilkan_foto' => 'false',
            'instagram' =>  'null',
            'facebook' => 'null',
            'twitter' => 'null',
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function storeMempelaiWanita(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiWanita = $request->dataMempelaiWanita;

        $user->mempelaiWanitaApi()->create([
            'user_id' => $user->id,
            'nama_lengkap' => ucfirst($dataMempelaiWanita['nama_lengkap']),
            'nama_panggilan' => ucfirst($dataMempelaiWanita['nama_panggilan']),
            'tempat_lahir' => 'null',
            'tanggal_lahir' => 'null',
            'nama_ayah' => $dataMempelaiWanita['nama_ayah'],
            'nama_ibu' => $dataMempelaiWanita['nama_ibu'],
            'foto' => 'null',
            'tampilkan_foto' => 'false',
            'instagram' =>  'null',
            'facebook' => 'null',
            'twitter' => 'null',
        ]);

        $namaPanggilanMempelaiPria = $user->mempelaiPriaApi->nama_panggilan;

        $user->settingUndanganApi()->create([
            'user_id' => $user->id,
            'domain' => $namaPanggilanMempelaiPria . '-' . $dataMempelaiWanita['nama_panggilan'],
            'judul_undangan' => $namaPanggilanMempelaiPria . ' & ' . $dataMempelaiWanita['nama_panggilan'],
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function updateMempelaiWanita(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiWanita = $request->dataMempelaiWanita;

        $user->mempelaiWanitaApi()->update([
            'user_id' => $user->id,
            'nama_lengkap' => ucfirst($dataMempelaiWanita['nama_lengkap']),
            'nama_panggilan' => ucfirst($dataMempelaiWanita['nama_panggilan']),
            'tempat_lahir' => 'null',
            'tanggal_lahir' => 'null',
            'nama_ayah' => $dataMempelaiWanita['nama_ayah'],
            'nama_ibu' => $dataMempelaiWanita['nama_ibu'],
            'instagram' => $dataMempelaiWanita['instagram'] ?? 'null',
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }
}
