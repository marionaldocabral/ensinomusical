@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Exame de <b>{!! $aluno->name !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Data </th><td class="col-md-10"> {!!$exame->data!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Categoria </th><td class="col-md-10">
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
                            </tr>
                            <tr>
                                <th class="col-md-2"> Status </th>                                
                                @if($exame->apto == true)
                                    <td class="col-md-10" style="color: #3ADF00">
                                        {{"Apto"}}
                                    </td>
                                @else
                                    <td class="col-md-10" style="color: red">
                                        {{"Inapto"}}
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <th class="col-md-2"> Observações </th><td class="col-md-10"> {!!$exame->observacao!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/' . $exame->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame/') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
@endsection