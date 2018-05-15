@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Aula prática de <b>{{$aluno->name}} </b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino/' . $hino->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <input name="user_id" type="hidden" value="{{ $hino->user_id }}">
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="data" type="date" id="data" value="{{ $hino->data }}" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('numero') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Hino' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="numero" type="number" id="numero" value="{{ $hino->numero }}" required>
                                {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('voz') ? 'has-error' : ''}}">
                            <label for="voz" class="col-md-4 control-label">{{ 'Voz' }}</label>
                            <div class="col-md-12">
                                <select id="voz" name="voz" class="form-control" required>
                                    @if($hino->voz == 1)
                                        <option selected value="1">Soprano</option>
                                    @elseif($hino->voz == 2)
                                        <option selected value="2">Contralto</option>                                    
                                    @elseif($hino->voz == 3)
                                        <option selected value="3">Tenor</option>
                                    @elseif($hino->voz == 4)
                                        <option selected value="4">Baixo</option>
                                    @elseif($hino->voz == 5)
                                        <option selected value="5">Soprano/Contralto</option>
                                    @elseif($hino->voz == 6)
                                        <option selected value="6">Soprano/Tenor</option>
                                    @elseif($hino->voz == 7)
                                        <option selected value="7">Soprano/Baixo</option>
                                    @elseif($hino->voz == 8)
                                        <option selected value="8">Contralto/Tenor</option>
                                    @elseif($hino->voz == 9)
                                        <option selected value="9">Contralto/Baixo</option>
                                    @elseif($hino->voz == 10)
                                        <option selected value="10">Tenor/Baixo</option>
                                    @elseif($hino->voz == 11)
                                        <option selected value="11">Soprano/Contralto/Tenor</option>
                                    @elseif($hino->voz == 12)
                                        <option selected value="12">Soprano/Contralto/Baixo</option>
                                    @elseif($hino->voz == 13)
                                        <option selected value="13">Soprano/Tenor/Baixo</option>
                                    @elseif($hino->voz == 14)
                                        <option selected value="14">Contralto/Tenor/Baixo</option>
                                    @elseif($hino->voz == 15)
                                        <option selected value="15">Soprano/Contralto/Tenor/Baixo</option>
                                    @endif

                                    @if($hino->voz != 1)
                                        <option value="1">Soprano</option>
                                    @endif
                                    @if($hino->voz != 2)
                                        <option value="2">Contralto</option>
                                    @endif
                                    @if($hino->voz != 3)
                                        <option value="3">Tenor</option>
                                    @endif
                                    @if($hino->voz != 4)
                                        <option value="4">Baixo</option>
                                    @endif
                                    @if($hino->voz != 5)
                                        <option value="5">Soprano/Contralto</option>
                                    @endif
                                    @if($hino->voz != 6)
                                        <option value="6">Soprano/Tenor</option>
                                    @endif
                                    @if($hino->voz != 7)
                                        <option value="7">Soprano/Baixo</option>
                                    @endif
                                    @if($hino->voz != 8)
                                        <option value="8">Contralto/Tenor</option>
                                    @endif
                                    @if($hino->voz != 9)
                                        <option value="9">Contralto/Baixo</option>
                                    @endif
                                    @if($hino->voz != 10)
                                        <option value="10">Tenor/Baixo</option>
                                    @endif
                                    @if($hino->voz != 11)
                                        <option value="11">Soprano/Contralto/Tenor</option>
                                    @endif
                                    @if($hino->voz != 12)
                                        <option value="12">Soprano/Contralto/Baixo</option>
                                    @endif
                                    @if($hino->voz != 13)
                                        <option value="13">Soprano/Tenor/Baixo</option>
                                    @endif
                                    @if($hino->voz != 14)
                                        <option value="14">Contralto/Tenor/Baixo</option>
                                    @endif
                                    @if($hino->voz != 15)
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
                                    @if($hino->status == 1)
                                        <option selected value="1">Apto</option>
                                        <option value="0">Inapto</option>
                                    @elseif($hino->status == 0)
                                        <option selected value="0">Inapto</option>
                                        <option value="1">Apto</option>
                                    @endif
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('finalidade') ? 'has-error' : ''}}">
                            <label for="finalidade" class="col-md-4 control-label">{{ 'Finalidade' }}</label>
                            <div class="col-md-12">
                                <select id="finalidade" name="finalidade" class="form-control" required>
                                    @if($hino->finalidade == 1)
                                        <option selected value="1">Reunião de Jovens e Menores</option>
                                    @elseif($hino->finalidade == 2)
                                        <option selected value="2">Culto Oficial</option>
                                    @elseif($hino->finalidade == 3)
                                        <option selected value="3">Oficialização</option>
                                    @elseif($hino->finalidade == 4)
                                        <option selected value="4">Revisão</option>
                                    @endif

                                   @if($hino->finalidade != 1)
                                        <option value="1">Reunião de Jovens e Menores</option>
                                    @endif
                                    @if($hino->finalidade != 2)
                                        <option value="2">Culto Oficial</option>
                                    @endif
                                    @if($hino->finalidade != 3)
                                        <option value="3">Oficialização</option>
                                    @endif
                                    @if($hino->finalidade != 4)
                                        <option value="4">Revisão</option>
                                    @endif
                                </select>
                                {!! $errors->first('finalidade', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('observacao') ? 'has-error' : ''}}">
                            <label for="observacao" class="col-md-4 control-label">{{ 'Observações' }}</label>
                            <div class="col-md-12">
                                <textarea id="observacao" name="observacao" class="form-control">{{$hino->observacao}}</textarea>
                                {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
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
@endsection