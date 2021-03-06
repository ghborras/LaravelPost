@extends('layouts.user')

@section('header')

@endsection
@section('content')

   <div class='caja'>
        <h4>&nbsp New Post</h4> 
        @include ('flash::message')             
    </div>
   <br>

    {!! Form::open(['route'=>['posts.store'], 'files' => true, 'class'=>'form-horizontal']) !!}
    {{ Form::token() }}
  
   
    <div class="form-group">
        {!! Form::label('title', 'Title', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('title', null, ['class'=>'form-control','required' => 'required']) !!}
            <!-- {!! $errors->has('title')? $error->first('title'):'' !!} -->
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::textarea('content', null, ['class'=>'form-control', 'required' => 'required']) !!}
            <!-- {!! $errors->has('descripcion')? $error->first('descripcion'):'' !!} -->
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('post_img', 'Imagen', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::file('post_img', null, ['class'=>'form-control btn btn-primary']) !!}
            <!-- {!! $errors->has('descripcion')? $error->first('descripcion'):'' !!} -->
        </div>

    </div>
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            {!! Form::submit('Save', ['class'=>'btn btn-primary', 'display'=>'inline']) !!}
            
        </div>
    </div>

    {!! Form::close() !!}

   

@endsection
