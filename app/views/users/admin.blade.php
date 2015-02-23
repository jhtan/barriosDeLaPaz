@extends('layouts.default')
@section('content')

<div class="container">
  <h1>Administración de usuarios</h1>

    <div class="panel panel-default">
        <table class="table">
            <thead>
            <tr>
                <th>Nombre de usuario</th>
                <th>Correo electrónico</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de creación</th>
                <th>Fecha de última modificación</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{link_to("/users/{$user->username}", $user->username)}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->lastName}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td><a class="btn btn-xs btn-default"><i class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-xs btn-primary"><i class="fa fa-remove"></i></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if (!$users->count())
    <p>Unfoutunately, there are no users.</p>
    @endif
</div>

@stop