<?php

namespace App\Http\Controllers;

use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Kabar Undangan - Undangan Digital/Online');
        SEOMeta::setDescription('Kabar Undangan menyediakan platform layanan undangan digital/online yang praktis dan elegan.');
        SEOMeta::setCanonical('https://kabarundangan.com');

        OpenGraph::setDescription('Kabar Undangan menyediakan platform layanan undangan digital/online yang praktis dan elegan.');
        OpenGraph::setTitle('Kabar Undangan - Undangan Digital/Online');
        OpenGraph::setUrl('https://kabarundangan.com');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage(Storage::url('images/favicon-logo.png'));

        TwitterCard::setTitle('Kabar Undangan - Undangan Digital/Online');
        TwitterCard::setSite('@KabarUndangan');

        JsonLd::setTitle('Kabar Undangan - Undangan Digital/Online');
        JsonLd::setDescription('Kabar Undangan menyediakan platform layanan undangan digital/online yang praktis dan elegan.');
        JsonLd::addImage(Storage::url('images/favicon-logo.png'));
        return view('home.welcome');
    }

    public function undangan($subdomain)
    {
        $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingAkadApi', 'settingResepsiApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi', 'ucapanApi', 'temaApi')->where('name', $subdomain)->first()->toArray();
        $data['cerita_cinta_api'] = collect($data['cerita_cinta_api'])->sortBy('id')->toArray();
        $data['vip'] = intval($data['vip']) === 1 ? true : false;
        $data['ucapan_api'] = collect($data['ucapan_api'])->sortByDesc('created_at')->toArray();
        $dateNow = Carbon::now();
        foreach ($data['ucapan_api'] as $key => $value) {
            $data['ucapan_api'][$key]['created_at'] = Carbon::parse($value['created_at'])->locale('id')->diffForHumans($dateNow, [
                'syntax' => Carbon::DIFF_RELATIVE_TO_NOW,
                'options' => Carbon::JUST_NOW | Carbon::ONE_DAY_WORDS | Carbon::TWO_DAY_WORDS,
            ]);
        }
        $imageGallery = [];
        if($data['gallery_api'] !== null){
            foreach ($data['gallery_api'] as $key => $value) {
                $imageGallery[] = $value['gambar'];
            }
        }
        $data['image_gallery'] = $imageGallery;
        return view('undangan.index', compact('data'));
    }
}
