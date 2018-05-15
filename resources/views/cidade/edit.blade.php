@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Cidade</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/cidade/' . $cidade->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nome" type="text" id="nome" value="{{ $cidade->nome }}" required>
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('estado_id') ? 'has-error' : ''}}">
                            <label for="estado_id" class="col-md-4 control-label">{{ 'Estado' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" id="estado_id" name = "estado_id">
                                    <option selected value="{{ $cidade->estado_id }}">
                                        @foreach($estados as $estado)
                                            @if($estado->id == $cidade->estado_id)
                                                {{ $estado->nome }}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($estados as $estado)
                                        @if($estado->id != $cidade->estado_id)
                                            <option value="{!! $estado->id !!}">{!! $estado->nome !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('estado_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/cidade/') }}" class="btn btn-danger">
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