@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Alterar Nota do Módulo {{$avaliacao->modulo}} de <b>{{$aluno->name}}</b></div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/avaliacao/' . $avaliacao->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nota') ? 'has-error' : ''}}">
                            <label for="nota" class="col-md-4 control-label">{{ 'Nota' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nota" type="number" step="0.1" min="0" id="nota" value="{{ $avaliacao->nota }}" required>
                                {!! $errors->first('nota', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/avaliacao') }}" class="btn btn-danger">
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