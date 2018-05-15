@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Show')
@section('content')

<div class = 'container'>
    <h1>
        Show avaliacao
    </h1>
    <form method = 'get' action = '{!!url("avaliacao")!!}'>
        <button class = 'btn blue'>avaliacao Index</button>
    </form>
    <table class = 'highlight bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>plano_id : </i></b>
                </td>
                <td>{!!$avaliacao->plano_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>user_id : </i></b>
                </td>
                <td>{!!$avaliacao->user_id!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>modulo : </i></b>
                </td>
                <td>{!!$avaliacao->modulo!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nota : </i></b>
                </td>
                <td>{!!$avaliacao->nota!!}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection