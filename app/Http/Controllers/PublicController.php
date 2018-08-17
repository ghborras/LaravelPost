<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class PublicController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publicar($id)
    {
       $post = Post::find($id);
       $post->publicado = true;
       $post->fecha_public = new \DateTime();
       $post->update();

       return redirect()->action('PostsController@index');
    }

     public function listado()
    {
    	$users = User::all();

       return view('listUsers', compact('users'));
    }

    public function showPublicPost()
    {
    	$posts = Post::where('user_id', Auth::id())->where('publicado', true)->orderBy('fecha_public','desc')->paginate(1);

       return view('posts/publicPosts', compact('posts'));
    }
}
