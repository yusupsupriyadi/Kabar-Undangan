<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User\Ucapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    public function index(Request $request, $name)
    {
        $data = User::with('mempelaiPriaApi', 'mempelaiWanitaApi', 'ceritaCintaApi', 'settingAcaraApi', 'settingAkadApi', 'settingResepsiApi', 'settingUndanganApi', 'musicBackgroundApi', 'photoBackgroundApi', 'galleryApi', 'kadoNikahApi', 'ucapanApi', 'temaApi')->where('name', $name)->first()->toArray();
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
        if ($data['gallery_api'] !== null) {
            foreach ($data['gallery_api'] as $key => $value) {
                $imageGallery[] = $value['gambar'];
            }
        }
        $data['image_gallery'] = $imageGallery;
        return view('undangan.index', compact('data'));
    }

    public function sendPesan(Request $request)
    {
        $file = $request->file('imageFile');

        try {
            if ($file !== null) {
                Ucapan::create([
                    'user_id' => $request->id,
                    'foto' => $file->hashName(),
                    'nama' => $request->nama,
                    'pesan' => $request->pesan,
                    'instagram' => $request->instagram === null ? 'null' : $request->instagram,
                ]);
            } else {
                Ucapan::create([
                    'user_id' => $request->id,
                    'foto' => 'null',
                    'nama' => $request->nama,
                    'pesan' => $request->pesan,
                    'instagram' => $request->instagram === null ? 'null' : $request->instagram,
                ]);
            }
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        if ($file !== null) {
            $file->store('/images');
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }
}
