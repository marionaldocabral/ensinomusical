@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Cidade
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/cidade') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input id="nome" name="nome" type="text" class="form-control" required>
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('estado_id') ? 'has-error' : ''}}">
                            <label for="estado_id" class="col-md-4 control-label">{{ 'Estado' }}</label>
                            <div class="col-md-12">                              
                                <select id="estado_id" name="estado_id" class="form-control" required>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->nome}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('estado_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/cidade') }}" class="btn btn-danger">
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