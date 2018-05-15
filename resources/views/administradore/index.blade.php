@extends('scaffold-interface.layouts.defaultMaterialize')
@section('title','Lista de Administradores')
@section('content')

<div class = 'container'>
    <h1>
        Lista de Administradores
    </h1>
    <div class="row">
        <form class = 'col s3' method = 'get' action = '{!!url("administradore")!!}/create'>
            <button class = 'btn red' type = 'submit'>Criar novo Administrador</button>
        </form>
    </div>
    <table>
        <thead>
            <th>Usuários</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($administradores as $administradore) 
            <tr>
                <td>
                    @foreach($users as $user)
                        @if($user->id == $administradore->user_id)
                            {!!$user->name!!}
                            @break
                        @endif
                    @endforeach
                </td>
                <td>
                    <div class = 'row'>
                        <a href = '#modal1' title="Excluir" class = 'delete btn-floating modal-trigger red' data-link = "/administradore/{!!$administradore->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                        <a href = '#' title="Editar" class = 'viewEdit btn-floating blue' data-link = '/administradore/{!!$administradore->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                        <a href = '#' title="Visualizar" class = 'viewShow btn-floating orange' data-link = '/administradore/{!!$administradore->id!!}'><i class = 'material-icons'>info</i></a>
                    </div>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection