@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show telefone
    </h1>
    <form method = 'get' action = '{!!url("telefone")!!}'>
        <button class = 'btn blue'>telefone Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>numero : </i></b>
                </td>
                <td>{!!$telefone->numero!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nome : </i></b>
                </td>
                <td>{!!$telefone->nome!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection