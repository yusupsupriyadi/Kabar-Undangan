<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    private function setSeoTools($title, $description, $canonical, $image)
    {
        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::setCanonical($canonical);

        OpenGraph::setDescription($description);
        OpenGraph::setTitle($title);
        OpenGraph::setUrl($canonical);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);

        TwitterCard::setTitle($title);
        TwitterCard::setSite('@KabarUndangan');

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addImage($image);
    }

    public function caraMembuatUndangan()
    {
        $this->setSeoTools(
            'Cara Membuat Undangan Digital/Online - Kabar Undangan',
            'Mudahnya membuat undangan digital/online di Kabar Undangan. Cukup 3 langkah mudah, undangan digital/online kamu sudah jadi.',
            'https://kabarundangan.com',
            Storage::url('images/favicon-logo.png')
        );
        return view('articles.cara-membuat-undangan.index');
    }

    public function faq(){
        $this->setSeoTools(
            'FAQ - Pertanyaan',
            'Pertanyaan yang sering ditanyakan seputar Undangan Online.',
            'https://kabarundangan.com/FAQ',
            Storage::url('images/favicon-logo.png')
        );
        
        return view('articles.faq.index');
    }
}
