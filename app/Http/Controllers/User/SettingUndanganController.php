<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $action = $request->action;
        $domain = strtolower($request->domain);
        $judulUndangan = $request->judul_undangan;
        $domainDefaultUser = $user->name;
        if($domain !== $domainDefaultUser){
            if (User::where('name', $domain)->exists() === true) {
                return response()->json([
                    'success' => false,
                    'message' => 'Domain sudah digunakan',
                ], 500);
            }
        }

        if ($action == 'update') {
            try {
                $user->settingUndanganApi()->update([
                    'user_id' => $user->id,
                    'domain' => strtolower($domain),
                    'judul_undangan' => $judulUndangan
                ]);

                $user->update([
                    'name' => strtolower($domain)
                ]);
            } catch (\Throwable $th) {
                return abort(500, 'Gagal mengupdate data');
            }
        } else {
            try {
                $user->settingUndanganApi()->create([
                    'user_id' => $user->id,
                    'domain' => strtolower($domain),
                    'judul_undangan' => $judulUndangan
                ]);

                $user->update([
                    'name' => strtolower($domain)
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
