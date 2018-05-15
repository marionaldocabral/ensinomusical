@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aula Prática de <b>{!! $aluno->name !!}</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Data </th><td class="col-md-10"> {!!$aulaspratica->data!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Método </th><td class="col-md-10"> {!!$aulaspratica->metodo!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Página </th><td class="col-md-10"> {!!$aulaspratica->pagina!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Lição </th><td class="col-md-10"> {!!$aulaspratica->licao!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Status </th>
                                <td class="col-md-10">
                                    @if($aulaspratica->apto == 1)
                                        {{"Apto"}}
                                    @else
                                        {{"Inapto"}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Observações </th><td class="col-md-10"> {!!$aulaspratica->observacao!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/metodo/' . $aulaspratica->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/metodo/') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection