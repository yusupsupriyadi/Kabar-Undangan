<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request, $name)
    {
        $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi')->where('name', $name)->first()->toArray();
        return view('undangan.index', compact('data'));
    }
}
