<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Storage;

class PostsController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->where('publicado',false)->orderBy('updated_at','desc')->get();
        return view('posts/showBorrador', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! is_null($request->file('post_img'))){
            $img = $request->file('post_img');
            $file_route = time().'_'.$img->getClientOriginalName();
            Storage::disk('post')->put($file_route, file_get_contents( $img->getRealPath() ));
        }

        else  $file_route='noimage.png';

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_img = $file_route;
        $post->user_id = Auth::id();
        $post->save(); 

        flash('El borrador ha sido creado con exito');
        return redirect()->action('PostsController@index');
        
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
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/editPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (! is_null($request->file('post_img'))){
            $img = $request->file('post_img');
            $file_route = time().'_'.$img->getClientOriginalName();
            Storage::disk('post')->put($file_route, file_get_contents( $img->getRealPath() ));
            Storage::disk('post')->delete($post->post_img);
        }

        else  $file_route = $post->post_img;
 
        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_img = $file_route;
        $post->update(); 
       
        flash('El borrador ha sido actualizado con exito');
        return redirect()->action('PostsController@index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();     

     return redirect()->action('PostsController@index'); 
    }
}
