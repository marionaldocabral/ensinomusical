@extends('layouts.app')
@section('content')

<div class = 'container'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Aula de <b>{{ $plano->ano . "." . $plano->turma }}</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano->id . '/aula') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('plano_id') ? 'has-error' : ''}}">
                            <div class="col-md-12">                        
                                <input type="hidden" name="plano_id" id="plano_id" class="form-control" value="{{$plano->id}}" required>
                                {!! $errors->first('plano_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">                        
                                <input type="date" name="data" id="data" class="form-control" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('modulo') ? 'has-error' : ''}}">
                            <label for="modulo" class="col-md-4 control-label">{{ 'Módulo' }}</label>
                            <div class="col-md-12">                        
                                <input type="number" name="modulo" id="modulo" class="form-control" required>
                                {!! $errors->first('modulo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('numero') ? 'has-error' : ''}}">
                            <div class="col-md-12">                        
                                <input type="hidden" name="numero" id="numero" class="form-control" value="{{$numero}}" required>
                                {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('conteudo') ? 'has-error' : ''}}">
                            <label for="conteudo" class="col-md-4 control-label">{{ 'Conteúdo' }}</label>
                            <div class="col-md-12">                        
                                <input type="text" name="conteudo" id="conteudo" class="form-control" required>
                                {!! $errors->first('conteudo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano->id . '/aula') }}" class="btn btn-danger">
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