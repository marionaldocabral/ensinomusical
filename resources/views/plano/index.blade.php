@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Planos de Ensino de
                    @foreach($localidades as $localidade)
                        @if($localidade->id == Auth::user()->localidade_id)
                            <b>{!! $localidade->nome !!}</b>
                            @break
                        @endif
                    @endforeach

                </div>

                <div class="panel-body">

                    @include('admin.info')

                    <div class="form-group">
                        <div class="pull-left">
                            <a href="{{ url('/plano/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Novo
                            </a>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Ano</th>
                                    <th>Turma</th>                     
                                    <th style="width: 210px !important;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($planos as $plano) 
                                    @if($plano->localidade_id == Auth::user()->localidade_id)
                                        <tr>
                                            <td>{!!$plano->ano!!}</td>
                                            <td>{!!$plano->turma!!}</td>                                        
                                            <td>
                                                <a href = "{{ url('/plano/' . $plano->id . '/aula') }}" title="Visualizar">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('/plano/' . $plano->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ url('/plano/' . $plano->id . '/aluno') }}" title="Listar Alunos">
                                                    <button class="btn btn-success btn-sm"><i class="fa fa-graduation-cap" aria-hidden="true"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection