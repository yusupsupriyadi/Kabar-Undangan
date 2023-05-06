<?php

namespace App\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Category;
use App\Models\Blog\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index');
    }

    public function getArticle()
    {
        $data = Article::all()->toArray();

        return response()->json($data);
    }

    public function createArticle(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'content' => 'required',
            'image' => 'required|image',
        ]);
    
        $tag = $request->tag;
        $tag = explode(',', $tag);
        
        foreach ($tag as $key => $value) {
            $tag[$key] = trim($value);
            // Memeriksa apakah nilai tag_id valid
            if (!is_numeric($tag[$key])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Nilai tag_id tidak valid'
                ], 400);
            }
        }
    
        $file = $request->file('image');
    
        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->tag_id = 1;
        $article->content = $request->content;
        $article->thumbnail = $file->hashName();
        $article->save();
    
        // Menyimpan nilai tag_id ke dalam tabel pivot article_tag
        $article->tag()->attach($tag);
    
        // Menyimpan file gambar ke dalam storage
        if ($file !== null) {
            $file->store('/images');
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Article berhasil ditambahkan'
        ]);
    }

    public function getCategory()
    {
        $data = Category::all()->toArray();

        return response()->json($data);
    }
    
    public function getTag(){
        $data = Tag::all()->toArray();

        return response()->json($data);
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category berhasil ditambahkan'
        ]);
    }

    public function createTag(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Tag berhasil ditambahkan'
        ]);
    }
}
