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
                                                <td style="color: red" id="{{'al' . $chamada->id}}"><b>{!!$aluno->name!!}</b></td>
                                            @else
                                                <td style="color: black" id="{{'al' . $chamada->id}}">{!!$aluno->name!!}</td>
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
                                                <td style="color: red" id="{{'ft' . $chamada->id}}"><b>{!!$aluno->faltas!!}</b></td>
                                            @else
                                                <td style="color: black" id="{{'ft' . $chamada->id}}">{!!$aluno->faltas!!}</td>
                                            @endif
                                            @if($chamada->status == false)
                                                <td style="color: red" id="{{'st' . $chamada->id}}">{{ "Ausente" }}</td>
                                            @elseif($chamada->status == true)
                                                <td style="color: black" id="{{'st' . $chamada->id}}">{{ "Presente" }}</td>
                                            @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm" id="{{$chamada->id}}" title="Presente" style="display:inline; margin-right: 5px;">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="{{$chamada->id}}" title="Ausente" style="display:inline;">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
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
    <script>
        $(document).ready(function(){
            $('.btn-danger').click(function(){
                var chamada_id = $(this).attr('id')
                var url = 'chamada/' + chamada_id + '/uncheck'
                $.get(url, function(data, status){
                    if(status =='success'){
                        var celula = '#ft' + chamada_id
                        var faltas = data['faltas']
                        var aluno = '#al' + chamada_id
                        $(celula).text(faltas)
                        if(faltas > 8){
                            $(celula).css('color', 'red')
                            $(aluno).css('color', 'red')
                            $(aluno).css('font-weight', 'bold')
                        }
                        else{
                            $(celula).css('color', 'black')
                            $(aluno).css('color', 'black')
                            $(aluno).css('font-weight', 'normal')
                        }
                        celula = '#st' + chamada_id
                        if(data['status'] == false){
                            $(celula).text('Ausente')
                            $(celula).css('color', 'red')
                        }
                    }
                })
            })
            $('.btn-success').click(function(){
                var chamada_id = $(this).attr('id')
                var url = 'chamada/' + chamada_id + '/check'
                $.get(url, function(data, status){
                    if(status =='success'){
                        var celula = '#ft' + chamada_id
                        var faltas = data['faltas']
                        var aluno = '#al' + chamada_id
                        $(celula).text(faltas)
                        if(faltas > 8){
                            $(celula).css('color', 'red')
                            $(aluno).css('color', 'red')
                            $(aluno).css('font-weight', 'bold')
                        }
                        else{
                            $(celula).css('color', 'black')
                            $(aluno).css('color', 'black')
                            $(aluno).css('font-weight', 'normal')
                        }
                        celula = '#st' + chamada_id
                        if(data['status'] == true){
                            $(celula).text('Presente')
                            $(celula).css('color', 'black')
                        }
                    }
                })
            })
        })
    </script>
</div>
@endsection