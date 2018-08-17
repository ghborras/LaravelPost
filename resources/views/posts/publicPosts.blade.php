@extends('layouts.user')

@section('header')
@endsection

@section('content')
    @if ($posts->isEmpty())
        <h4>No tienes posts publicados</h4>
    @else 
        <div class='caja'>
            <h4>&nbsp Publicados</h4> 
             {{ $posts->links() }}           
        </div>
        <br>                            
        @foreach($posts as $post)
            @php
               $comments = App\Post::find($post->id)->comments;
            @endphp
            <div id="cabecera">
                <h3>{{ $post->title }}</h3>
                <p>{{ \Carbon\Carbon::parse($post->fecha_public)->format('d-m-Y') }}</p>
            </div>
            <div id="cuerpo">
                <p>{{ $post->content }}</p>
                <div style='text-align: center'>
                    <img class='imgpost' src="{{ url('img/post/'.$post->post_img) }}" alt="no image" style="width:300px;height:200px;">
                    <p class='coment'>{{ $post->post_img }}</p>
                </div>
            </div>
            <div id="comentarios">
                <p style='text-decoration: underline'>Comentarios:</p>
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
        @endforeach
    @endif
@endsection
