@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Usuários
            </div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    <div class="pull-left">
                        <a href="{{ url('/user/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ url('/home') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
                <br/><br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Nome</th>                            
                                <th>Nascimento</th>
                                <th>Status</th>                                
                                <th>Localidade</th>
                                <th>Instrumento</th>
                                <th>Adm</th>
                                <th style="width: 210px !important;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user) 
                                <tr>
                                    <td>{!!$user->name!!}</td>                                    
                    				<td>{!!$user->nascimento!!}</td>
                    				<td>
                                        @if($user->status == "iniciante")
                                            {{"Iniciante"}}
                                        @elseif($user->status == "ensaio")
                                            {{"Ensaio"}}
                                        @elseif($user->status == "rjm")
                                            {{"Reunião de Jovens e Menores"}}
                                        @elseif($user->status == "oficial")
                                            {{"Culto Oficial"}}
                                        @elseif($user->status == "oficializado")
                                            {{"Oficializado"}}
                                        @elseif($user->status == "auxiliar")
                                            {{"Auxiliar"}}
                                        @elseif($user->status == "instrutor")
                                            {{"Instrutor"}}
                                        @elseif($user->status == "enc_local")
                                            {{"Encarregado Local"}}
                                        @elseif($user->status == "enc_regional")
                                            {{"Encarregado Regional"}}
                                        @endif
                                    </td>                    			
                                    <td>
                    				    @foreach($localidades as $localidade)
                    					   @if($localidade->id == $user->localidade_id)
                    						  {!!$localidade->nome!!}
                    						  @break
                    					   @endif
                    				    @endforeach
                                    </td>
				                    <td>{!!$user->instrumento!!}</td>
                                        <td>
                                            @if($user->adm == true)
                                                Sim
                                            @else
                                                Não
                                            @endif
                                        </td>
                                    <td>
                                        <a href = "{{ url('/user/' . $user->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href = "{{ url('/user/' . $user->id . '/edit') }}" title="Editar">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        <form method="POST" action="{{ url('/user/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection