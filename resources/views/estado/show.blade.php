@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><b>{!! $estado->nome !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {!!$estado->nome!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Sigla </th><td class="col-md-10"> {!!$estado->sigla!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> País </th><td class="col-md-10"> {!!$pais->nome!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/estado/' . $estado->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/estado/') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection