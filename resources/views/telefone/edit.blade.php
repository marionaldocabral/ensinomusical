@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Edit')
@section('content')

<div class = 'container'>
    <h1>
        Edit telefone
    </h1>
    <form method = 'get' action = '{!!url("telefone")!!}'>
        <button class = 'btn blue'>telefone Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("telefone")!!}/{!!$telefone->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="input-field col s6">
            <input id="numero" name = "numero" type="text" class="validate" value="{!!$telefone->
            numero!!}"> 
            <label for="numero">numero</label>
        </div>
        <div class="input-field col s6">
            <input id="nome" name = "nome" type="text" class="validate" value="{!!$telefone->
            nome!!}"> 
            <label for="nome">nome</label>
        </div>
        <button class = 'btn red' type ='submit'>Update</button>
    </form>
</div>
@endsection