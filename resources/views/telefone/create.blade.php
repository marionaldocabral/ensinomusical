@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Create')
@section('content')

<div class = 'container'>
    <h1>
        Create telefone
    </h1>
    <form method = 'get' action = '{!!url("telefone")!!}'>
        <button class = 'btn blue'>telefone Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("telefone")!!}'>
        <input type = 'hidden' name = '_token' value = '{{ Session::token() }}'>
        <div class="input-field col s6">
            <input id="numero" name = "numero" type="text" class="validate">
            <label for="numero">numero</label>
        </div>
        <div class="input-field col s6">
            <input id="nome" name = "nome" type="text" class="validate">
            <label for="nome">nome</label>
        </div>
        <button class = 'btn red' type ='submit'>Create</button>
    </form>
</div>
@endsection