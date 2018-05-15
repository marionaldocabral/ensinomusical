@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alunos de <b>{{ $plano->ano . "." . $plano->turma }}</b>
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('plano/' . $plano->id . '/aluno/create/') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/plano') }}" class="btn btn-warning">
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
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Instrumento</th>
                                    <th style="width: 210px !important;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>                    
                                 @foreach($alunos as $user)
                                    <tr>
                                        @if($user->faltas > 8)
                                            <td style="color: red"><b>{!!$user->name!!}</b></td>
                                        @else
                                            <td style="color: black">{!!$user->name!!}</td>
                                        @endif
                                        <td>{!!$user->email!!}</td>
                                        <td>{!!$user->telefone!!}</td>
                                        <td>
                                            @if($user->status == 'iniciante')
                                                {{'Iniciante'}}
                                            @elseif($user->status == 'ensaio')
                                                {{'Ensaio'}}
                                            @elseif($user->status == 'rjm')
                                                {{'Reunião de Jovens e Menores'}}
                                            @elseif($user->status == 'oficial')
                                                {{'Culto Oficial'}}
                                            @endif
                                        </td>
                                        <td>{!!$user->instrumento!!}</td>                                    
                                        <td>                                            
                                            <a href = "{{ url('plano/'. $plano->id . '/aluno/' . $user->id) }}" title="Visualizar">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href = "{{ url('/plano/' . $plano->id . '/aluno/' . $user->id . '/edit') }}" title="Editar">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ url('plano/' . $plano->id .'/aluno/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
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