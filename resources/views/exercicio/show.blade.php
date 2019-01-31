@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Exercício do MTS de <b>{!! $aluno->name !!}</b></div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Módulo </th><td class="col-md-10"> {!!$exercicio->modulo!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Número </th><td class="col-md-10"> {!!$exercicio->numero!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Página </th><td class="col-md-10"> {!!$exercicio->pagina!!} </td>
                            </tr>
                            <tr>
                                @if($exercicio->data != NULL)
                                    <th class="col-md-2"> Data </th><td class="col-md-10"> {!!$exercicio->data!!} </td>
                                @endif
                            </tr>
                            <tr>
                                @foreach($instrutores as $instrutor)
                                    @if($instrutor->id == $exercicio->instrutor_id)
                                        <th class="col-md-2"> Conferido por </th><td class="col-md-10"> {!!$instrutor->name!!} </td>
                                        @break
                                    @endif
                                @endforeach
                            </tr>                            
                            <tr>
                                @if($exercicio->data != NULL)
                                    <th class="col-md-2"> Observações </th>
                                    <td class="col-md-10">
                                        @if($exercicio->observacoes != NULL)
                                            {!!$exercicio->observacoes!!}
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                    @if($exercicio->data != NULL)
                        <div class="pull-left">
                            <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $exercicio->id . '/edit') }}" class="btn btn-primary">
                                <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                            </a>
                        </div>
                    @endif
                @endif
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
@endsection