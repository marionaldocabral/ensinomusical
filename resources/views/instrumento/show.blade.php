@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><b>{!! $instrumento->nome !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {!!$instrumento->nome!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Categoria </th><td class="col-md-10"> {!!$instrumento->categoria!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Tipo </th><td class="col-md-10"> {!!$instrumento->tipo!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Voz </th><td class="col-md-10"> {!!$instrumento->voz!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/instrumento/' . $instrumento->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/instrumento/') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
@endsection