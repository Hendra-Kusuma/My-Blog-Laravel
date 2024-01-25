<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\search;

class ArticlesController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        if ($search) {
            $blogs = DB::table('articles')->where('title', 'like', "%$search%")->paginate(3);
        }else {
            $blogs = DB::table('articles')->paginate(3);
        }
        return view('articles/articles', ['blogs' => $blogs]);
    }

    public function create() {
        return view('articles/createArticle');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:100|min:5|unique:articles',
            'content' => 'required|min:10',
            'author' => 'required|min:2'
        ]);
        // unique:posts
        // dd($validated);
        DB::table('articles')->insert([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $validated['author']
        ]);

        return redirect('/article')->with('success', 'Artikel berhasil disimpan!');
    }

    public function show($id) {
        $blog = DB::table('articles')->where('id', $id)->first();
        return view('articles/show', ['blog' => $blog]);
    }

    public function edit($id) {
        $blog = DB::table('articles')->where('id', $id)->first();
        return view('articles/edit', ['blog' => $blog]);
    }

    public function update(Request $request) {
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|max:100|min:5',
            'content' => 'required|min:10',
            'author' => 'required|min:2'
        ]);
        // updated data
        DB::table('articles')->where('id', $request['id'])->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'author' => $validated['author']
        ]);

        return redirect('/article/'.$request['id'])->with('success', 'Artikel berhasil diedit!');
    }
    public function delete($id){
        DB::table('articles')->where('id', $id)->delete();
        return redirect('/article')->with('success', 'Artikel berhasil dihapus');
    }
}
