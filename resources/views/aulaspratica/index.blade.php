@extends('layouts.app')
@section('content')
<div class="row">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Aulas práticas de <b>{{$aluno->name}}</b>
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <div class="form-group">
                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                            <div class="pull-left">
                                <a href="{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/metodo/' . 'create') }}" class="btn btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Nova
                                </a>
                            </div>
                        @endif
                        <div class="pull-right">
                            <a href="{{ url('/plano/' . $plano->id . '/aluno/' . $aluno->id) }}" class="btn btn-warning">
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
                                    <th>Método</th> <!--nome do método-->
                                    <th>Página</th>
                                    <th>Lição</th> 
                                    <th>Status</th> <!--apto ou inapto-->
                                    <th>Observações</th>
                                    <th style="width: 210px !important;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aulaspraticas as $aulaspratica)                                   
                                    <tr>
                                        <td>{!!$aulaspratica->data!!}</td>
                                        <td>{!!$aulaspratica->metodo!!}</td>
                                        <td>{!!$aulaspratica->pagina!!}</td>
                                        <td>{!!$aulaspratica->licao!!}</td>
                                        <td>
                                            @if($aulaspratica->apto ==  1)
                                                {{"Apto"}}
                                            @else
                                                {{"Inapto"}}
                                            @endif
                                        </td>
                                        <td>{!!$aulaspratica->observacao!!}</td>
                                        <td>
                                            <a href = "{{ url('plano/'. $plano->id . '/aluno/' . $aluno->id . '/metodo/' . $aulaspratica->id) }}" title="Visualizar">
                                                <button class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href = "{{ url('/plano/' . $plano->id . '/aluno/' . $aluno->id . '/metodo/' . $aulaspratica->id . '/edit') }}" title="Editar">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ url('plano/' . $plano->id .'/aluno/' . $aluno->id . '/metodo/' . $aulaspratica->id) }}" accept-charset="UTF-8" style="display:inline">
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