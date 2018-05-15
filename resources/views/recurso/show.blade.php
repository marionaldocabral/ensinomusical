@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show recurso
    </h1>
    <form method = 'get' action = '{!!url("recurso")!!}'>
        <button class = 'btn blue'>recurso Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>aula_id : </i></b>
                </td>
                <td>{!!$recurso->aula_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>descricao : </i></b>
                </td>
                <td>{!!$recurso->descricao!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>link : </i></b>
                </td>
                <td>{!!$recurso->link!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection