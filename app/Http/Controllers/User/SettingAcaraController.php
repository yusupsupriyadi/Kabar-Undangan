<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingAcaraController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataInformasiAcara = $user->informasi_acara;
        $dataAkadNikah = $user->akad_nikah;
        $dataResepsi = $user->resepsi;
        dd($dataInformasiAcara, $dataAkadNikah, $dataResepsi);
        return view('user.setting-acara.index')
            ->with('user', $user);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $dataInformasiAcara = $request->dataInformasiAcara;
        $dataAkadNikah = $request->dataAkadNikah;
        $dataResepsi = $request->dataResepsi;
    }
}
