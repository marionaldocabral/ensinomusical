@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Instrumento</b></div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/instrumento/' . $instrumento->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nome" type="text" id="name" value="{{ $instrumento->nome }}" required>
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('categoria') ? 'has-error' : ''}}">
                            <label for="categoria" class="col-md-4 control-label">{{ 'Categoria' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="categoria" id="categoria">                        
                                    <option selected>{!! $instrumento->categoria !!}</option>
                                    @if($instrumento->categoria != "Cordas")
                                        <option>Cordas</option>
                                    @endif
                                    @if($instrumento->categoria != "Madeiras")
                                        <option>Madeiras</option>
                                    @endif
                                    @if($instrumento->categoria != "Metais")
                                        <option>Metais</option>
                                    @endif
                                    @if($instrumento->categoria != "Eletrônico")
                                        <option>Eletrônico</option>
                                    @endif
                                </select>
                                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('tipo') ? 'has-error' : ''}}">
                            <label for="tipo" class="col-md-4 control-label">{{ 'Tipo' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="tipo" id="tipo">
                                    <option selected>{!! $instrumento->tipo !!}</option>
                                    @if($instrumento->tipo != "-")
                                        <option>-</option>
                                    @endif
                                    @if($instrumento->tipo != "Embocadura Simples")
                                        <option>Embocadura Livre</option>
                                    @endif
                                    @if($instrumento->tipo != "Palheta Simples")
                                        <option>Palheta Simples</option>
                                    @endif
                                    @if($instrumento->tipo != "Palheta Dupla")
                                        <option>Palheta Dupla</option>
                                    @endif
                                </select>
                                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('voz') ? 'has-error' : ''}}">
                            <label for="voz" class="col-md-4 control-label">{{ 'Voz' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="voz" id="voz">                                                            
                                    <option selected>{!! $instrumento->voz !!}</option>
                                     @if($instrumento->voz != "Soprano")
                                        <option>Soprano</option>
                                    @endif
                                    @if($instrumento->voz != "Contralto")
                                        <option>Contralto</option>
                                    @endif
                                    @if($instrumento->voz != "Tenor")
                                        <option>Tenor</option>
                                    @endif
                                    @if($instrumento->voz != "Baixo")
                                        <option>Baixo</option>
                                    @endif
                                    @if($instrumento->voz != "Soprano/Contralto/Tenor/Baixo")
                                        <option>Soprano/Contralto/Tenor/Baixo</option>
                                    @endif
                                </select>
                                {!! $errors->first('voz', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
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
@endsection