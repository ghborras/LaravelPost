@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Usuario</h4></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Imagen</th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                                <th>Editar</th>
                               <!--  <th>Borrar</th> -->
                              </tr>
                            </thead>
                            <tbody>
                                                     
                      

                               <tr>
                                    <td><img src="{{ url('img/user/'.$user->img_url) }}" alt="no image" style="width:60px;height:60px;"></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Editar</a></td>
                                    <!-- <td>
                
                                        {!! Form::open(['method'=>'delete', 'route'=>['users.destroy', $user->id]]) !!}
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                        
                                    </td> -->
                                </tr>             
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection

