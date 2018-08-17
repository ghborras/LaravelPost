@extends('layouts.user')

@section('header')

@endsection
@section('content')
        
        @if ($posts->isEmpty())
            <h4>No tiene posts publicados</h4>
        @else 
                <div class='caja'>
                    <h4>&nbsp Publicados</h4> 
                    {{ $posts->links() }}           
                </div>
                <br>                          
                @foreach($posts as $post)
                @if($post->publicado)
                    @php

                       $comments = App\Post::find($post->id)->comments;
                       $userpost = App\User::find($post->user_id);
                       
                    @endphp

                    <div id="cabecera">
                        <h3>{{ $post->title }}</h3>
                        <div class='autor'>
                            <img src="{{ url('img/user/'.$userpost->img_url) }}" alt="no image" style="width:25px;height:25px;">
                            <p>&nbsp<span style='font-size:12px'>Posted by: {{ $userpost->name }}</span> / {{ \Carbon\Carbon::parse($post->fecha_public)->format('d-m-Y') }}</p>
                            
                        </div>
                    </div>
                    <div id="cuerpo">
                        <p>{{ $post->content }}</p>
                        <div style='text-align: center'>
                            <img class='imgpost' src="{{ url('img/post/'.$post->post_img) }}" alt="no image" style="width:300px;height:200px;">
                            <p class='coment'>{{ $post->post_img }}</p>
                        </div>
                    </div><br>
             
                    <div id="comentarios">
                        <a href="{{ action('CommentsController@edit', ['id'=>$post->id]) }}" class="btn btn-warning">Add Comment</a>
                        <p class='titlecom' style='text-decoration: underline'>Comentarios:</p>
                        @if($comments->isEmpty())
                            <p class='comment'>No hay comentarios</p>
                        @else
                        @foreach($comments as $comment)
                            @php
                                $user = App\User::find($comment->user_id);
                            @endphp
                            <div class='autcomment'>
                                <img src="{{ url('img/user/'.$user->img_url) }}" alt="no image" style="width:25px;height:25px; margin-bottom:5px;">
                                <p class='coment'>&nbsp{{ \Carbon\Carbon::parse($comment->fecha_comment)->format('d-m-Y') }}<span style='color:blue'>{{' - '. $user->name }}</span> {{' - '. $comment->content_com }} </p>
                            </div>
                        @endforeach
                        @endif
                    </div>
                 @endif       
                                          
                @endforeach
   
        @endif
        
@endsection



