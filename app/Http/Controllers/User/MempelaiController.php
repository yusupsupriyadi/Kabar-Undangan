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
        $dataMempelaiWanita = $request->user()->mempelai_wanita;
        return response()->json([
            'message' => 'success',
            'data' => $dataMempelaiWanita
        ]);
    }

    public function storeDataMempelai(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiPria = $request->dataMempelaiPria;
        $dataMempelaiWanita = $request->dataMempelaiWanita;
        $dataNull = $request->dataNull;

        if ($dataNull['dataMempelaiPria'] === 'true') {
            $user->mempelai_pria()->create([
                'user_id' => $user->id,
                'nama_lengkap' => $dataMempelaiPria['nama_lengkap'],
                'nama_panggilan' => $dataMempelaiPria['nama_panggilan'],
                'tempat_lahir' => $dataMempelaiPria['tempat_lahir'],
                'tanggal_lahir' => $dataMempelaiPria['tanggal_lahir'],
                'nama_ayah' => $dataMempelaiPria['nama_ayah'],
                'nama_ibu' => $dataMempelaiPria['nama_ibu'],
                'instagram' => $dataMempelaiPria['instagram'] ?? 'null',
            ]);
        } else {
            $user->mempelai_pria()->update([
                'user_id' => $user->id,
                'nama_lengkap' => $dataMempelaiPria['nama_lengkap'],
                'nama_panggilan' => $dataMempelaiPria['nama_panggilan'],
                'tempat_lahir' => $dataMempelaiPria['tempat_lahir'],
                'tanggal_lahir' => $dataMempelaiPria['tanggal_lahir'],
                'nama_ayah' => $dataMempelaiPria['nama_ayah'],
                'nama_ibu' => $dataMempelaiPria['nama_ibu'],
                'instagram' => $dataMempelaiPria['instagram'] ?? 'null',
            ]);
        }

        if ($dataNull['dataMempelaiWanita'] === 'true') {
            $user->mempelai_wanita()->create([
                'user_id' => $user->id,
                'nama_lengkap' => $dataMempelaiWanita['nama_lengkap'],
                'nama_panggilan' => $dataMempelaiWanita['nama_panggilan'],
                'tempat_lahir' => $dataMempelaiWanita['tempat_lahir'],
                'tanggal_lahir' => $dataMempelaiWanita['tanggal_lahir'],
                'nama_ayah' => $dataMempelaiWanita['nama_ayah'],
                'nama_ibu' => $dataMempelaiWanita['nama_ibu'],
                'instagram' => $dataMempelaiWanita['instagram'] ?? 'null',
            ]);
        } else {
            $user->mempelai_wanita()->update([
                'user_id' => $user->id,
                'nama_lengkap' => $dataMempelaiWanita['nama_lengkap'],
                'nama_panggilan' => $dataMempelaiWanita['nama_panggilan'],
                'tempat_lahir' => $dataMempelaiWanita['tempat_lahir'],
                'tanggal_lahir' => $dataMempelaiWanita['tanggal_lahir'],
                'nama_ayah' => $dataMempelaiWanita['nama_ayah'],
                'nama_ibu' => $dataMempelaiWanita['nama_ibu'],
                'instagram' => $dataMempelaiWanita['instagram'] ?? 'null',
            ]);
        }

        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function storeMempelaiPria(Request $request)
    {
        $user = User::find($request->user()->id);
        $dataMempelaiPria = $request->dataMempelaiPria;

        $user->mempelai_pria()->create([
            'user_id' => $user->id,
            'nama_lengkap' => $dataMempelaiPria['nama_lengkap'],
            'nama_panggilan' => $dataMempelaiPria['nama_panggilan'],
            'tempat_lahir' => $dataMempelaiPria['tempat_lahir'],
            'tanggal_lahir' => Carbon::parse(strtr($dataMempelaiPria['tanggal_lahir'], '/', '-'))->format('Y-m-d'),
            'nama_ayah' => $dataMempelaiPria['nama_ayah'],
            'nama_ibu' => $dataMempelaiPria['nama_ibu'],
            'instagram' => $dataMempelaiPria['instagram'] ?? 'null',
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

        $user->mempelai_pria()->update([
            'user_id' => $user->id,
            'nama_lengkap' => $dataMempelaiPria['nama_lengkap'],
            'nama_panggilan' => $dataMempelaiPria['nama_panggilan'],
            'tempat_lahir' => $dataMempelaiPria['tempat_lahir'],
            'tanggal_lahir' => Carbon::parse(strtr($dataMempelaiPria['tanggal_lahir'], '/', '-'))->format('Y-m-d'),
            'nama_ayah' => $dataMempelaiPria['nama_ayah'],
            'nama_ibu' => $dataMempelaiPria['nama_ibu'],
            'instagram' => $dataMempelaiPria['instagram'] ?? 'null',
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

        $user->mempelai_wanita()->create([
            'user_id' => $user->id,
            'nama_lengkap' => $dataMempelaiWanita['nama_lengkap'],
            'nama_panggilan' => $dataMempelaiWanita['nama_panggilan'],
            'tempat_lahir' => $dataMempelaiWanita['tempat_lahir'],
            'tanggal_lahir' => Carbon::parse(strtr($dataMempelaiWanita['tanggal_lahir'], '/', '-'))->format('Y-m-d'),
            'nama_ayah' => $dataMempelaiWanita['nama_ayah'],
            'nama_ibu' => $dataMempelaiWanita['nama_ibu'],
            'instagram' => $dataMempelaiWanita['instagram'] ?? 'null',
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

        $user->mempelai_wanita()->update([
            'user_id' => $user->id,
            'nama_lengkap' => $dataMempelaiWanita['nama_lengkap'],
            'nama_panggilan' => $dataMempelaiWanita['nama_panggilan'],
            'tempat_lahir' => $dataMempelaiWanita['tempat_lahir'],
            'tanggal_lahir' => Carbon::parse(strtr($dataMempelaiWanita['tanggal_lahir'], '/', '-'))->format('Y-m-d'),
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
