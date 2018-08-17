@extends('layouts.app')

@php

	 $numborrador = App\Post::where('user_id', Auth::id())->where('publicado',false)->count();
	 $numpublicado = App\Post::where('user_id', Auth::id())->where('publicado',true)->count();

@endphp

     @section('aside') 
        <div class="list-group">
          <a href="{{ route('posts.create')}}" class="list-group-item">New Post</a>
          <a href="{{ route('posts.index')}}" class="list-group-item">Borradores<span style='font-weight: bold; color:white'>{{ ' - '.$numborrador }}</span></a>
          <a href="{{ action('PublicController@showPublicPost') }}" class="list-group-item">Publicados<span style='font-weight: bold; color:white'>{{ ' - '.$numpublicado }}</span></a>
          <a href="{{ route('blogs.index')}}" class="list-group-item">Ver Bloggers</a>
        </div> 
     @endsection  
       
       
