<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingUndanganController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $dataSettingUndangan = $request->user()->setting_undangan;
        return view('user.setting-undangan.index')
            ->with('user', $user)
            ->with('dataSettingUndangan', $dataSettingUndangan);
    }
}
