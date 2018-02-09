<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'conteudo' => 'required',
        ]);


        $user = Auth::user();


        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->conteudo;

        $post->user()->associate($user);



        $post->saveOrFail();





        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        try{
            $this->authorize('edit', $post);
        }catch (\Exception $exception){
            return 'Você não tem permissão para editar este post<br>'.'<a href="/home">Sair</a>';
        }

        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'conteudo' => 'required',
        ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->conteudo;

        $post->saveOrFail();


        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        try{
            $this->authorize('destroy', $post);
            $post->delete();
        }catch (\Exception $exception){
            return 'Você não tem permissão para editar este post<br>'.'<a href="/home">Sair</a>';
        }
        return redirect('posts');
    }
}
