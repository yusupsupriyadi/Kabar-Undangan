<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request, $id)
    {
        $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi')->where('id', $id)->first();
        return view('undangan.index', compact('data'));
    }
}
