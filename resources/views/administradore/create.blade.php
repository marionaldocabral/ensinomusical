@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Criar Administrador')
@section('content')

<div class = 'container'>
    <h1>
        Criar Administrador
    </h1>
    <form method = 'get' action = '{!!url("administradore")!!}'>
        <button class = 'btn blue'>Lista de Administradores</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("administradore")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <select id="user_id" name = "user_id" class="validate">
                @foreach($users as $user)
                    <option value="{!! $user->id !!}">{!! $user->name !!}</option>
                @endforeach
            </select>
            <label for="user_id">Usuário</label>
        </div>
        <button class = 'btn red' type ='submit'>Criar</button>
    </form>
</div>
@endsection