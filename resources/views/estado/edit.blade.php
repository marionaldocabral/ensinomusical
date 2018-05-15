@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Estado</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/estado/' . $estado->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nome" type="text" id="nome" value="{{ $estado->nome }}" required>
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('sigla') ? 'has-error' : ''}}">
                            <label for="sigla" class="col-md-4 control-label">{{ 'Sigla' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="sigla" type="text" id="sigla" value="{{ $estado->sigla }}" required>
                                {!! $errors->first('sigla', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('pais_id') ? 'has-error' : ''}}">
                            <label for="pais_id" class="col-md-4 control-label">{{ 'País' }}</label>
                            <div class="col-md-12">                                
                                <select id="pais_id" name = "pais_id" class="form-control">
                                    <option selected value="{{ $estado->pais_id }}">
                                        @foreach($paises as $pais)
                                            @if($pais->id == $estado->pais_id)
                                                {{$pais->nome}}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($paises as $pais)
                                        @if($pais->id != $estado->pais_id)
                                          <option value="{{ $pais->id }}">{!! $pais->nome !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('pais_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/estado/') }}" class="btn btn-danger">
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