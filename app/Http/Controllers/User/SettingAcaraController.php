<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingAcaraController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataInformasiAcara = $user->setting_acara;
        $dataAkadNikah = $user->setting_akad;
        $dataResepsi = $user->setting_resepsi;
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
                $user->setting_acara()->update($dataInformasiAcara);
                $user->setting_akad()->update($dataAkadNikah);
                $user->setting_resepsi()->update($dataResepsi);
            } catch (\Throwable $th) {
                return abort(500, 'error');
            }
        } else {
            try {
                $user->setting_acara()->create($dataInformasiAcara);
                $user->setting_akad()->create($dataAkadNikah);
                $user->setting_resepsi()->create($dataResepsi);
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
