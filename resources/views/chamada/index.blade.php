@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Chamada para <b>Aula {{$aula->numero}}</b> de {{ $plano->ano . "." . $plano->turma . " em " . $aula->data}}
            </div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ url('/plano/' . $plano->id . '/aula') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
                <br><br>  
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>                                        
                                <th>Status</th>                                        
                                <th>Instrumento</th>
                                <th>Faltas</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alunos as $aluno)
                                @foreach($chamadas as $chamada)
                                    @if($aluno->id == $chamada->user_id)
                                        <tr>
                                            @if($aluno->faltas > 8)
                                                <td style="color: red"><b>{!!$aluno->name!!}</b></td>
                                            @else
                                                <td style="color: black">{!!$aluno->name!!}</td>
                                            @endif
                                            <td>{!!$aluno->email!!}</td>
                                            <td>{!!$aluno->telefone!!}</td>                                                       
                                            <td>
                                                @if($aluno->status == 'iniciante')
                                                    {{'Iniciante'}}
                                                @elseif($aluno->status == 'ensaio')
                                                    {{'Ensaio'}}
                                                @elseif($aluno->status == 'rjm')
                                                    {{'Reunião de Jovens e Menores'}}
                                                @elseif($aluno->status == 'oficial')
                                                    {{'Culto Oficial'}}
                                                @endif
                                            </td>                                                       
                                            <td>{!!$aluno->instrumento!!}</td>
                                            @if($aluno->faltas > 8)
                                                <td style="color: red"><b>{!!$aluno->faltas!!}</b></td>
                                            @else
                                                <td style="color: black">{!!$aluno->faltas!!}</td>
                                            @endif
                                            @if($chamada->status == false)
                                                <td style="color: red">{{ "Ausente" }}</td>
                                            @elseif($chamada->status == true)
                                                <td style="color: black">{{ "Presente" }}</td>
                                            @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula/' . $aula->id . '/chamada/' . $chamada->id . '/check') }}" style="display:inline">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success btn-sm" title="Presente">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ url('plano/' . $plano->id . '/aula/ ' . $aula->id . '/chamada/' . $chamada->id . '/uncheck') }}" style="display:inline">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Ausente">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </form>                                                            
                                            </td>                            
                                        </tr>
                                        @break
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>                        
            </div>
        </div>
    </div>
</div>
@endsection