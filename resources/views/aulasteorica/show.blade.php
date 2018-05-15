@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Aula {!!$aula->numero!!} de <b>{!!$plano->ano!!}.{!!$plano->turma!!}</b></div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="pull-left">
                        <a href="{{ url('plano/' . $plano->id . '/aula/' . $aula->id . '/recurso') }}" class="btn btn-success">
                            <i class="fa fa-bars" aria-hidden="true"></i> Recursos
                        </a>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <td><b><i>Data : </i></b></td>
                                <td>{!!$aula->data!!}</td>
                            </tr>
                            <tr>
                                <td><b><i>Módulo : </i></b></td>
                                <td>{!!$aula->modulo!!}</td>
                            </tr>
                            <tr>
                                <td><b><i>Conteúdo : </i></b></td>
                                <td>{!!$aula->conteudo!!}</td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">
                    <form method="POST" action="{{ url('/aula/' . $aula->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $aula->plano_id . '/aula') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection