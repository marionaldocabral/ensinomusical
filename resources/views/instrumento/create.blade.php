@extends('layouts.app')
@section('content')
<div class = 'container'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Instrumento Musical
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/instrumento') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input type="text" name="nome" id="nome" class="form-control">                                
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('categoria') ? 'has-error' : ''}}">
                            <label for="categoria" class="col-md-4 control-label">{{ 'Categoria' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="categoria" id="categoria">                        
                                    <option>Cordas</option>
                                    <option>Madeiras</option>
                                    <option>Metais</option>
                                    <option>Eletrônico</option>
                                </select>
                                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('tipo') ? 'has-error' : ''}}">
                            <label for="tipo" class="col-md-4 control-label">{{ 'Tipo' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="tipo" id="tipo">                                                            
                                    <option>-</option>
                                    <option>Embocadura Livre</option>
                                    <option>Palheta Simples</option>
                                    <option>Palheta Dupla</option>
                                </select>
                                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('voz') ? 'has-error' : ''}}">
                            <label for="voz" class="col-md-4 control-label">{{ 'Voz' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="voz" id="voz">                                                            
                                    <option>Soprano</option>
                                    <option>Contralto</option>
                                    <option>Tenor</option>
                                    <option>Baixo</option>
                                    <option>Soprano/Contralto/Tenor/Baixo</option>
                                </select>
                                {!! $errors->first('voz', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/instrumento') }}" class="btn btn-danger">
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