<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('home.welcome');
    }

    public function undangan($subdomain){
        $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingAkadApi', 'settingResepsiApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi', 'ucapanApi', 'temaApi')->where('name', $subdomain)->first()->toArray();
        $data['cerita_cinta_api'] = collect($data['cerita_cinta_api'])->sortBy('id')->toArray();
        $data['vip'] = intval($data['vip']) === 1 ? true : false;
        return view('undangan.index', compact('data'));
    }
}
