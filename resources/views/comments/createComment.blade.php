@extends('layouts.user')

@section('header')

@endsection
@section('content')

    <div class="contenido">

    {!! Form::open(['route'=>['comments.update', $post->id], 'method'=>'patch', 'class'=>'form-horizontal']) !!}
    {{ Form::token() }}
  
   
    <div class="form-group">
        {!! Form::label('content_com', 'Comentario', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::textarea('content_com', null, ['class'=>'form-control']) !!}
            <!-- {!! $errors->has('title')? $error->first('title'):'' !!} -->
        </div>
    </div>
    
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            {!! Form::submit('Save', ['class'=>'btn btn-primary', 'display'=>'inline']) !!}
            
        </div>
    </div>

    {!! Form::close() !!}

    </div>

@endsection

