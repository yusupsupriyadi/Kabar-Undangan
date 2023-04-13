<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $subDomain = $request->segment(1);

        if ($subDomain !== null) {
            $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingAkadApi', 'settingResepsiApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi', 'ucapanApi', 'temaApi')->where('name', $name)->first()->toArray();
            $data['cerita_cinta_api'] = collect($data['cerita_cinta_api'])->sortBy('id')->toArray();
            $data['vip'] = intval($data['vip']) === 1 ? true : false;
            return view('undangan.index', compact('data'));
        }

        return view('home.welcome');
    }
}
