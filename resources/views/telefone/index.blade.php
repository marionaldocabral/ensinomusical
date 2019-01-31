@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Index')
@section('content')

<div class = 'container'>
    <h1>
        telefone Index
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("telefone")!!}/create'>
            <button class = 'btn red' type = 'submit'>Create New telefone</button>
        </form>
    </div>
    <table>
        <thead>
            <th>numero</th>
            <th>nome</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($telefones as $telefone) 
            <tr>
                <td>{!!$telefone->numero!!}</td>
                <td>{!!$telefone->nome!!}</td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/telefone/{!!$telefone->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/telefone/{!!$telefone->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' class = 'viewShow btn-floating orange' data-link = '/telefone/{!!$telefone->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $telefones->render() !!}

</div>
@endsection