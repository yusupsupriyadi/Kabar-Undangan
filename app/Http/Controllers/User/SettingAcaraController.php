<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingAcaraController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataInformasiAcara = $user->settingAcaraApi;
        $dataAkadNikah = $user->settingAkadApi;
        $dataResepsi = $user->settingResepsiApi;
        if ($dataInformasiAcara === null) {
            $data = null;
        } else {
            $data = [
                'dataInformasiAcara' => $dataInformasiAcara,
                'dataAkadNikah' => $dataAkadNikah,
                'dataResepsi' => $dataResepsi
            ];
        }
        return view('user.setting-acara.index')
            ->with('user', $user)
            ->with('data', $data);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $dataInformasiAcara = $request->dataInformasiAcara;
        $dataAkadNikah = $request->dataAkadNikah;
        $dataResepsi = $request->dataResepsi;
        $action = $request->typeAction;
        if ($action === 'update') {
            try {
                $user->settingAcaraApi()->update($dataInformasiAcara);
                $user->settingAkadApi()->update($dataAkadNikah);
                $user->settingResepsiApi()->update($dataResepsi);
            } catch (\Throwable $th) {
                return abort(500, 'error');
            }
        } else {
            try {
                $user->settingAcaraApi()->create($dataInformasiAcara);
                $user->settingAkadApi()->create($dataAkadNikah);
                $user->settingResepsiApi()->create($dataResepsi);
            } catch (\Throwable $th) {
                return abort(500, 'error');
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
