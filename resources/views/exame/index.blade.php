@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Exames de <b>{{$aluno->name}}</b>
            </div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    <div class="pull-left">
                        <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id) }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
                <br/><br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Categoria</th>
                                <th>Status</th>
                                <th>Observações</th>
                                <th style="width: 210px !important;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exames as $exame) 
                                <tr>
                                    <td>{{$exame->data}}</td>
                                    <td>
                                        @if($exame->categoria == 'iniciante')
                                            {{'Iniciante'}}
                                        @elseif($exame->categoria == 'ensaio')
                                            {{'Ensaio'}}
                                        @elseif($exame->categoria == 'rjm')
                                            {{'Reunião de Jovens e Menores'}}
                                        @elseif($exame->categoria == 'oficial')
                                            {{'Culto Oficial'}}
                                        @endif
                                    </td>
                                    @if($exame->apto == true)
                                        <td style="color: #3ADF00">
                                            {{"Apto"}}
                                        </td>
                                    @else
                                        <td style="color: red">
                                            {{"Inapto"}}
                                        </td>
                                    @endif
                                    <td>{!!$exame->observacao!!}</td>
                                    <td>
                                        <a href = "{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/' . $exame->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href = "{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/' . $exame->id . '/edit') }}" title="Editar">
                                            <button class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/' . $exame->id) }}" accept-charset="UTF-8" style="display:inline">
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