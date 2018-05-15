@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create avaliacao
    </h1>
    <form method = 'get' action = '{!!url("avaliacao")!!}'>
        <button class = 'btn blue'>avaliacao Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("avaliacao")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="plano_id" name = "plano_id" type="text" class="validate">
            <label for="plano_id">plano_id</label>
        </div>
        <div class="input-field col s6">
            <input id="user_id" name = "user_id" type="text" class="validate">
            <label for="user_id">user_id</label>
        </div>
        <div class="input-field col s6">
            <input id="modulo" name = "modulo" type="text" class="validate">
            <label for="modulo">modulo</label>
        </div>
        <div class="input-field col s6">
            <input id="nota" name = "nota" type="text" class="validate">
            <label for="nota">nota</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection