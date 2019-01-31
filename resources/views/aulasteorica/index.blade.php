@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Aulas de <b>{{ $plano->ano . "." . $plano->turma }}</b></div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                        <div class="pull-left">
                            <a href="{{ url('/plano/' . $plano->id . '/aula/create') }}" class="btn btn-success">
                                <i class="fa fa-plus" aria-hidden="true"></i> Nova
                            </a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/plano') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                            <a href="{{ url('plano/' . $plano->id . '/aula/print') }}" class="btn btn-primary" title="Imprimir">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </a>
                        </div>
                    @else
                        <div class="pull-right">
                            <a href="{{ url('/home') }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                        </div>
                    @endif
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-borderless">   
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Módulo</th>
                                <th>Data</th>
                                <th>Conteúdo</th>
                                <th style="width: 175px !important;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= $ultimaaula; $i++)
                                @foreach($aulasteoricas as $aulasteorica)
                                    @if($aulasteorica->numero == $i && $aulasteorica->plano_id == $plano->id)                                        
                                        <tr>
                                            <td>{!!$aulasteorica->numero!!}</td>
                                            <td>{!!$aulasteorica->modulo!!}</td>
                                            <td>{!!$aulasteorica->data!!}</td>
                                            <td>{!!$aulasteorica->conteudo!!}</td>
                                            <td>
                                                <div style="width: 20%; display: flex;">
                                                    <a href="{{ url('plano/' . $plano->id . '/aula/' . $aulasteorica->id . '/recurso') }}" title="Recursos" style="padding-right: 2px; padding-left: 2px">
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fa fa-bars" aria-hidden="true" ></i>
                                                        </button>
                                                    </a>
                                                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                                        <a href="{{ url('plano/'. $aulasteorica->plano_id . '/aula/' . $aulasteorica->id .'/edit') }}" title="Editar" style="padding-right: 2px; padding-left: 2px">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </button>
                                                        </a>
                                                        <form method="POST" action="{{ url('plano/' . $aulasteorica->plano_id . '/aula/' . $aulasteorica->id) }}" style="padding-right: 2px; padding-left: 2px" accept-charset="UTF-8" style="display:inline">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                        <br />
                                                        <br />
                                                        <form method="get" action = "{{ url('plano/' . $aulasteorica->plano_id . '/aula/' . $aulasteorica->id . '/chamada') }}" style="padding-right: 2px; padding-left: 2px">
                                                            <button class="btn btn-success btn-sm" title="Fazer chamada">
                                                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @break
                                    @endif
                                @endforeach
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection