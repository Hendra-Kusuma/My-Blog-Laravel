<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\articlesModel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = articlesModel::all();
        return response()->json(['data'=>$blog], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100|min:5|unique:articles',
            'content' => 'required|min:10',
            'author' => 'required|min:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $blog = articlesModel::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image_path' => $request->file('image')->store('images')
        ]);

        return response()->json(['data'=>$blog], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $blog = articlesModel::find($id);
        if(!$blog){
            return response()->json(['message'=>'data not found'], 404);
        }
        return response()->json(['data'=>$blog], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $blog = articlesModel::find($id);
        if(!$blog){
            return response()->json(['message'=>'data not found'], 404);
        }
        $blogs = $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'image_path' => $request->file('image')->store('images')
        ]);

        return response()->json(['data updated'=>$blogs], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogs = articlesModel::find($id);
        if(!$blogs) {
            return response()->json(['message'=> 'data not found'], 404);
        }

        $blogs->delete();
        return response()->json(['data_deleted' => $blogs], 200);

    }
}
