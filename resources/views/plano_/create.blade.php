@extends('layouts.app')
@section('content')
<div class = 'container'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Plano de Ensino
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano_') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('localidade_id') ? 'has-error' : ''}}">
                            <label for="localidade_id" class="col-md-4 control-label">{{ 'Localidade' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="localidade_id" id="localidade_id">
                                    @foreach($localidades as $localidade)
                                        <option value="{{$localidade->id}}">{{ $localidade->nome }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('localidade_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>                        
                        <div class="row {{ $errors->has('ano') ? 'has-error' : ''}}">
                            <label for="ano" class="col-md-4 control-label">{{ 'Ano' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="ano" id="ano">
                                    @for($i = 1970; $i < 2100; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                {!! $errors->first('ano', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano_') }}" class="btn btn-danger">
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