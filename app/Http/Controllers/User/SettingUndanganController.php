<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingUndanganController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataSettingUndangan = $request->user()->settingUndanganApi;
        return view('user.setting-undangan.index')
            ->with('user', $user)
            ->with('dataSettingUndangan', $dataSettingUndangan);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $dataSettingUndangan = $request->user()->settingUndanganApi;
        $action = $request->action;
        $domain = $request->domain;
        $judulUndangan = $request->judul_undangan;

        if($action == 'update'){
            try {
                $user->settingUndanganApi()->update([
                    'user_id' => $user->id,
                    'domain' => $domain,
                    'judul_undangan' => $judulUndangan
                ]);
            } catch (\Throwable $th) {
                return abort(500, 'Gagal mengupdate data');
            }
        }else {
            try {
                $user->settingUndanganApi()->create([
                    'user_id' => $user->id,
                    'domain' => $domain,
                    'judul_undangan' => $judulUndangan
                ]);
            } catch (\Throwable $th) {
                return abort(500, 'Gagal menyimpan data');
            }
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
