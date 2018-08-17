
@extends('layouts.user')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('header')
   
@endsection
@section('content')

		@if ($posts->isEmpty())
            <h4>No tienes borradores</h4>
                @else
                <div class='caja'>
                    <h4>&nbsp Borradores</h4>
                    @include ('flash::message')
                </div>
                <br>

                
                
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Modificado</th>
                            <th style='width:15%'>Titulo</th>
                            <th style='width:50%'>Contenido</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                                                 
                        @foreach($posts as $post)

                           <tr>
                                <td>{{ \Carbon\Carbon::parse($post->update_at)->format('d-m-Y') }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td><img src="{{ url('img/post/'.$post->post_img) }}" alt="no image" style="width:75px;height:50px;"></td>
                                <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-default" data-toggle="editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                
                                <td><a href="{{action('PublicController@publicar', $post->id)}}" class="btn btn-primary" data-toggle="publicar" title="Publicar" onclick="return confirm('Publicar este borrador ? No se podran realizar cambios posteriores')"><span class="glyphicon glyphicon-ok"></span></a></td>
                                <td>
            
                                    {!! Form::open(['method'=>'delete', 'route'=>['posts.destroy', $post->id]]) !!}
                                    
                                    <button class='btn btn-danger' type='submit' data-toggle="eliminar" title="Eliminar" onclick="return confirm('Eliminar este borrador ?')"><span class="glyphicon glyphicon-trash" ></span></button>
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                           
                        @endforeach
                
                        </tbody>
                    </table>
                @endif
               
@endsection

<script>
$(document).ready(function(){
    $('[data-toggle="editar"]').tooltip();   
});

$(document).ready(function(){
    $('[data-toggle="publicar"]').tooltip();   
});

$(document).ready(function(){
    $('[data-toggle="eliminar"]').tooltip();   
});

</script>

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1000);
    },2000);
});
</script>



