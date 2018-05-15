@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Aula Prática de <b>{{$aluno->name}}</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input id="user_id" name="user_id" type="hidden" value="{{$aluno->id}}" class="form-control">
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input id="data" name="data" type="date" value="{{$data}}" class="form-control" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('numero') ? 'has-error' : ''}}">
                            <label for="numero" class="col-md-4 control-label">{{ 'Hino' }}</label>
                            <div class="col-md-12">
                                <input id="numero" name="numero" type="number" value="{{$numero}}" class="form-control" required>
                                {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('voz') ? 'has-error' : ''}}">
                            <label for="voz" class="col-md-4 control-label">{{ 'Voz' }}</label>
                            <div class="col-md-12">
                                <select id="voz" name="voz" class="form-control" required>
                                    @if($voz == 1)
                                        <option selected value="1">Soprano</option>
                                    @elseif($voz == 2)
                                        <option selected value="2">Contralto</option>                                    
                                    @elseif($voz == 3)
                                        <option selected value="3">Tenor</option>
                                    @elseif($voz == 4)
                                        <option selected value="4">Baixo</option>
                                    @elseif($voz == 5)
                                        <option selected value="5">Soprano/Contralto</option>
                                    @elseif($voz == 6)
                                        <option selected value="6">Soprano/Tenor</option>
                                    @elseif($voz == 7)
                                        <option selected value="7">Soprano/Baixo</option>
                                    @elseif($voz == 8)
                                        <option selected value="8">Contralto/Tenor</option>
                                    @elseif($voz == 9)
                                        <option selected value="9">Contralto/Baixo</option>
                                    @elseif($voz == 10)
                                        <option selected value="10">Tenor/Baixo</option>
                                    @elseif($voz == 11)
                                        <option selected value="11">Soprano/Contralto/Tenor</option>
                                    @elseif($voz == 12)
                                        <option selected value="12">Soprano/Contralto/Baixo</option>
                                    @elseif($voz == 13)
                                        <option selected value="13">Soprano/Tenor/Baixo</option>
                                    @elseif($voz == 14)
                                        <option selected value="14">Contralto/Tenor/Baixo</option>
                                    @elseif($voz == 15)
                                        <option selected value="15">Soprano/Contralto/Tenor/Baixo</option>
                                    @endif

                                    @if($voz != 1)
                                        <option value="1">Soprano</option>
                                    @endif
                                    @if($voz != 2)
                                        <option value="2">Contralto</option>
                                    @endif
                                    @if($voz != 3)
                                        <option value="3">Tenor</option>
                                    @endif
                                    @if($voz != 4)
                                        <option value="4">Baixo</option>
                                    @endif
                                    @if($voz != 5)
                                        <option value="5">Soprano/Contralto</option>
                                    @endif
                                    @if($voz != 6)
                                        <option value="6">Soprano/Tenor</option>
                                    @endif
                                    @if($voz != 7)
                                        <option value="7">Soprano/Baixo</option>
                                    @endif
                                    @if($voz != 8)
                                        <option value="8">Contralto/Tenor</option>
                                    @endif
                                    @if($voz != 9)
                                        <option value="9">Contralto/Baixo</option>
                                    @endif
                                    @if($voz != 10)
                                        <option value="10">Tenor/Baixo</option>
                                    @endif
                                    @if($voz != 11)
                                        <option value="11">Soprano/Contralto/Tenor</option>
                                    @endif
                                    @if($voz != 12)
                                        <option value="12">Soprano/Contralto/Baixo</option>
                                    @endif
                                    @if($voz != 13)
                                        <option value="13">Soprano/Tenor/Baixo</option>
                                    @endif
                                    @if($voz != 14)
                                        <option value="14">Contralto/Tenor/Baixo</option>
                                    @endif
                                    @if($voz != 15)
                                        <option value="15">Soprano/Contralto/Tenor/Baixo</option>
                                    @endif
                                </select>
                                {!! $errors->first('voz', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select id="status" name="status" class="form-control" required>
                                    <option value="1">Apto</option>
                                    <option value="0">Inapto</option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('finalidade') ? 'has-error' : ''}}">
                            <label for="finalidade" class="col-md-4 control-label">{{ 'Finalidade' }}</label>
                            <div class="col-md-12">
                                <select id="finalidade" name="finalidade" class="form-control" required>
                                    @if($finalidade == 1)
                                        <option selected value="1">Reunião de Jovens e Menores</option>
                                    @elseif($finalidade == 2)
                                        <option selected value="2">Culto Oficial</option>
                                    @elseif($finalidade == 3)
                                        <option selected value="3">Oficialização</option>
                                    @elseif($finalidade == 4)
                                        <option selected value="4">Revisão</option>
                                    @endif

                                    @if($finalidade != 1)
                                        <option value="1">Reunião de Jovens e Menores</option>
                                    @endif
                                    @if($finalidade != 2)
                                        <option value="2">Culto Oficial</option>
                                    @endif
                                    @if($finalidade != 3)
                                        <option value="3">Oficialização</option>
                                    @endif
                                    @if($finalidade != 4)
                                        <option value="4">Revisão</option>
                                    @endif
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('observacao') ? 'has-error' : ''}}">
                            <label for="observacao" class="col-md-4 control-label">{{ 'Observações' }}</label>
                            <div class="col-md-12">
                                <textarea id="observacao" name="observacao" class="form-control"></textarea>
                                {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino') }}" class="btn btn-danger">
                                    <i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection