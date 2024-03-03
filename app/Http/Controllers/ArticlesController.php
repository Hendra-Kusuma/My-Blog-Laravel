<?php

namespace App\Http\Controllers;

use App\Models\articlesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\search;

class ArticlesController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if ($search) {
            // $blogs = DB::table('articles')->where('title', 'like', "%$search%")->paginate(3);
            $blogs = articlesModel::where('title', 'like', "%$search%")
             ->orWhere('content', 'like', "%$search%")
             ->paginate(3);
        }else {
            // $blogs = DB::table('articles')->paginate(3);
            $blogs = articlesModel::paginate(3);
        }
        return view('articles/articles', ['blogs' => $blogs]);
    }

    public function create() {
        return view('articles/createArticle');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:100|min:5|unique:articles',
            'content' => 'required|min:10',
            'author' => 'required|min:2',
            'image' => 'required'
        ]);
        // unique:posts
        // dd($validated);
        // DB::table('articles')->insert([
        //     'title' => $request['title'],
        //     'content' => $request['content'],
        //     'author' => $request['author'],
        //     'image_path' => $request->file('image')->store('images')
        // ]);
        $blog = new articlesModel();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->image_path = $request->file('image')->store('images');
        $blog->save();

        return redirect('/article')->with('success', 'Artikel berhasil disimpan!');
    }

    public function show($id) {
        // $blog = DB::table('articles')->where('id', $id)->first();
        $blog = articlesModel::find($id);
        return view('articles/show', ['blog' => $blog]);
    }

    public function edit($id) {
        // $blog = DB::table('articles')->where('id', $id)->first();
        $blog = articlesModel::find($id);
        return view('articles/edit', ['blog' => $blog]);
    }

    public function update(Request $request) {
        // dd($request);
        $request->validate([
            'title' => 'required|max:100|min:5',
            'content' => 'required|min:10',
            'author' => 'required|min:2',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        // updated data
        // DB::table('articles')->where('id', $request['id'])->update([
        //     'title' => $request['title'],
        //     'content' => $request['content'],
        //     'author' => $request['author']
        // ]);
        $blog = articlesModel::find($request->id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->author = $request->author;
        if ($request->hasFile('image')) { // Periksa apakah file gambar baru diunggah
            // Hapus file gambar lama
            Storage::delete($blog->image_path);
            // Simpan file gambar yang baru
            $blog->image_path = $request->file('image')->store('images');
        }
        $blog->save();

        return redirect('/article/'.$request['id'])->with('success', 'Artikel berhasil diedit!');
    }
    public function delete($id){
        // DB::table('articles')->where('id', $id)->delete();
        articlesModel::destroy($id);
        return redirect('/article')->with('success', 'Artikel berhasil dihapus');
    }
}
