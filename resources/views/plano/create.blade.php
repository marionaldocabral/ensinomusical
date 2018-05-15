@extends('layouts.app')
@section('content')

<div class = 'container'>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Plano de Ensino de 
                    @foreach($localidades as $localidade)
                        @if($localidade->id == Auth::user()->localidade_id)
                            <b>{!! $localidade->nome !!}</b>
                            @break
                        @endif
                    @endforeach
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @foreach($localidades as $localidade)
                        @if($localidade->id == Auth::user()->localidade_id)
                            <div class="row">                            
                                <div class="col-md-12">
                                    <input class="form-control" name="localidade_id" id="localidade_id" value="{{ $localidade->id }}" type="hidden">
                                </div>
                            </div>
                            @break
                        @endif
                        @endforeach                        
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
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Início' }}</label>
                            <div class="col-md-12">                        
                                <input type="date" name="data" id="data" class="form-control">
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano') }}" class="btn btn-danger">
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