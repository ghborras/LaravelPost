@extends('layouts.user')

@section('header')

<!-- <h2>Edit User: {{ $user->name }}</h2> -->

@endsection
@section('content')

    <div class="contenido">

    {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PATCH', 'files' => true, 'class'=>'form-horizontal']) !!}
    {{ Form::token() }}
  
    <img class="imgedit" src="{{ url('img/user/'.$user->img_url) }}" alt="no image" style="width:120px;height:120px;">
   
    <div class="form-group">
        {!! Form::label('name', 'Name', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            <!-- {!! $errors->has('title')? $error->first('title'):'' !!} -->
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::text('email', null, ['class'=>'form-control']) !!}
            <!-- {!! $errors->has('descripcion')? $error->first('descripcion'):'' !!} -->
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('img_url', 'Imagen', ['class'=>'control-label col-md-2']) !!}
        <div class="col-md-10">
            {!! Form::file('img_url', null, ['class'=>'form-control btn btn-primary']) !!}
            <!-- {!! $errors->has('descripcion')? $error->first('descripcion'):'' !!} -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            {!! Form::submit('Save', ['class'=>'btn btn-primary', 'display'=>'inline']) !!}
            <a href="{{route('users.index') }}" class="btn btn-success">Volver</a>
        </div>
    </div>

    {!! Form::close() !!}

    </div>
     @include ('flash::message')

@endsection