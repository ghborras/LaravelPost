@extends('layouts.user')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Bloggers</h4></div>

                <div class="panel-body">

                    @if ($users->isEmpty())
                        <h4>No hay usuarios registrados</h4>
                    @else 
                        <table class="table">
                            <thead>
                              <tr>
                                <th style='width: 15%'>Imagen</th>
                                <th style='width: 30%'>Nombre</th>
                                <th style='width: 40%'>E-mail</th>
                                <th style='width: 15%; text-align: center'>Ver blog</th>
                              </tr>
                            </thead>
                            <tbody>
                                                     
                            @foreach($users as $user)

                               <tr>
                                    <td><img src="{{ url('img/user/'.$user->img_url) }}" alt="no image" style="width:60px;height:60px;"></td>
                                   
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style='text-align: center'><a href="{{route('blogs.show', $user->id) }}" class="btn btn-success">Ver Blog</a></td>
                                  
                                </tr>
                               
                            @endforeach
                    
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

