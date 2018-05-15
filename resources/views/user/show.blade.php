@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><b>{!! $user->name !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {!!$user->name!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Email </th><td class="col-md-10"> {!!$user->email!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Telefone </th><td class="col-md-10"> {!!$user->telefone!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Nascimento </th><td class="col-md-10"> {!!$user->nascimento!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Status </th><td class="col-md-10"> {!!$user->status!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Responsável </th><td class="col-md-10"> {!!$user->responsavel!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Contato </th><td class="col-md-10"> {!!$user->contatol!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Instrumento </th><td class="col-md-10"> {!!$user->instrumento!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Administrador </th>
                                <td class="col-md-10">
                                	@if($user->adm == true)
                                        Sim
                                    @else
                                        Não
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/user/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                       	{{ method_field('DELETE') }}
                       	{{ csrf_field() }}
                       	<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                       		<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                       	</button>
                   	</form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/user') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection