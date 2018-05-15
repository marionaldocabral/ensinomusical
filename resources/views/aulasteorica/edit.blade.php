@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Aula {!!$aula->numero!!} de <b>{{ $plano->ano . "." . $plano->turma }}</b></div>
                <div class="panel-body">
                    <form method="POST" action='{!! url("/plano")!!}/{!!$aula->plano_id!!}/{!!"aula"!!}/{!!$aula->id!!}' accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}<br>
                         <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="data" type="date" id="data" value="{{ $data }}" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="row {{ $errors->has('modulo') ? 'has-error' : ''}}">
                            <label for="modulo" class="col-md-4 control-label">{{ 'Módulo' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="modulo" type="text" id="modulo" value="{{ $aula->modulo }}" required>
                                {!! $errors->first('modulo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="row {{ $errors->has('conteudo') ? 'has-error' : ''}}">
                            <label for="conteudo" class="col-md-4 control-label">{{ 'Conteúdo' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="conteudo" type="text" id="conteudo" value="{{ $aula->conteudo }}" required>
                                {!! $errors->first('conteudo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>                        
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $aula->plano_id . '/aula') }}" class="btn btn-danger">
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