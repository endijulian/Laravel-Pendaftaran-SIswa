<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact(['posts']));  //['posts' => $posts]
    }

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'required|mimes:jpg,png'
        ]);

        // dd($request->all());
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail
        ]);
        return redirect()->route('posts.index')->with('sukses', 'Data berhasil di upload');
    }

    public function hapus(Post $post, $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('sukses', 'Data  berhasil dihapus');
    }
}
