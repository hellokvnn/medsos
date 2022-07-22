<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // function index ini untuk menampilkan data pada view post.create
    public function index()
    {
        return view('post.create', [
            "posts" => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  function create ini untuk menambahkan data ke database, lalu diteruskan ke view post.create,
    // compact ini untuk menampung data yang yang telah dibuat
    public function create()
    {
        $posts = Post::all(); 
        return view('post.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  function ini berfungsi untuk menyimpan data ke database sesuai dengan yang di inputkan pada function create
    // lalu akan diterukan ke view post
    public function store(Request $request)
    {
        Post::create([
            'text' => $request->text,
            'image' => $request->image,
            'file' => $request->file
        ]);
        return redirect('post')->with('status', 'Data Berhasil Ditambah !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  function edit untuk melakukan edit data, berdasarkan id pada data
    // post::find untuk mencari data yang mana datanya adalah id
    public function edit($id)
    {
        return view('post.edit', [
            'post' => Post::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  function update unutk melakukan perubahan pada data, dicari sesuai id lalu dapat diubah sesuai keingingan
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->update($request->all());
        return redirect('post')->with('status', 'Data Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  function destroy untuk menghapus data berdasarkan id
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('post')->with('status', 'Data Berhasil Dihapus !');;
    }
}
