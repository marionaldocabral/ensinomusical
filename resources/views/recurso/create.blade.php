@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Recurso
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('descricao') ? 'has-error' : ''}}">
                            <label for="descricao" class="col-md-4 control-label">{{ 'Descrição' }}</label>
                            <div class="col-md-12">
                                <input id="descricao" name="descricao" type="text" class="form-control" required>
                                {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('link') ? 'has-error' : ''}}">
                            <label for="link" class="col-md-4 control-label">{{ 'Link' }}</label>
                            <div class="col-md-12">
                                <input id="link" name="link" type="text" class="form-control" required>
                                {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso') }}" class="btn btn-danger">
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