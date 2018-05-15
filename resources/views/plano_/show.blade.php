@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Plano de Ensino <b>{!! $plano->ano . "." . $plano->turma !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Ano </th><td class="col-md-10"> {!!$plano->ano!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Turma </th><td class="col-md-10"> {!!$plano->turma!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">
                        <form method="POST" action="{{ url('/plano_/' . $plano->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Excluir</button>
                        </form>
                    </div>

                    <div class="pull-right">
                        <a href="{{ url('/plano_') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection