@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Alunos de <b>{{ $plano->ano . "." . $plano->turma }}</b>
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <div class="form-group">
                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
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
                        @else
                            <div class="pull-right">
                                <a href="{{ url('/home') }}" class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                                </a>
                            </div>
                        @endif  
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
                                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                        <th style="width: 210px !important;">Ações</th>
                                    @endif
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
                                        <td>
                                            @if(strlen($user->telefone) != 0)
                                                {!!$user->telefone!!}
                                            @else
                                                {{'-'}}
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == 'iniciante')
                                                {{'Iniciante'}}
                                            @elseif($user->status == 'ensaio')
                                                {{'Ensaio'}}
                                            @elseif($user->status == 'rjm')
                                                {{'Reunião de Jovens e Menores'}}
                                            @elseif($user->status == 'oficial')
                                                {{'Culto Oficial'}}
                                            @elseif($user->status == 'oficializado')
                                                {{'Oficializado'}}
                                            @elseif($user->status == 'auxiliar')
                                                {{'Auxiliar'}}
                                            @elseif($user->status == 'instrutor' && $user->instrumento == 'Órgão')
                                                {{'Instrutora'}}
                                            @elseif($user->status == 'instrutor' && $user->instrumento != 'Órgão')
                                                {{'Instrutor'}}
                                            @elseif($user->status == 'enc_local')
                                                {{'Encarregado Local'}}
                                            @elseif($user->status == 'enc_regional')
                                                {{'Encarregado Regional'}}
                                            @endif
                                        </td>
                                        <td>{!!$user->instrumento!!}</td>
                                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                            <td>
                                                <a href = "{{ url('plano/'. $plano->id . '/aluno/' . $user->id) }}" title="Visualizar">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                @if(Auth::user()->adm == 1)
                                                    <a href = "{{ url('/plano/' . $plano->id . '/aluno/' . $user->id . '/edit') }}" title="Editar">
                                                        <button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </button>
                                                    </a>
                                                @endif                                  
                                            </td>
                                        @endif
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