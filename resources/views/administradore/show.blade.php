@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Visualizar')
@section('content')

<div class = 'container'>
    <h1>
        {!! $user->name !!}
    </h1>
    <form method = 'get' action = '{!!url("administradore")!!}'>
        <button class = 'btn blue'>Lista de Administradores</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Atributo</th>
            <th>Valor</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>Usuário : </i></b>
                </td>
                <td>{!!$user->name!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection