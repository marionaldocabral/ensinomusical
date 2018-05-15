@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nova Aula Prática de <b>{{$aluno->name}}</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano->id . '/aluno/' . $aluno->id . '/metodo') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input id="data" name="data" type="date" value="{{$data}}" class="form-control" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('metodo') ? 'has-error' : ''}}">
                            <label for="metodo" class="col-md-4 control-label">{{ 'Método' }}</label>
                            <div class="col-md-12">
                                <input type="text" name="metodo" value="{{$metodo}}" class="form-control" required>
                                {!! $errors->first('metodo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('pagina') ? 'has-error' : ''}}">
                            <label for="pagina" class="col-md-4 control-label">{{ 'Página' }}</label>
                            <div class="col-md-12">
                                <input type="number" name="pagina" value="{{$pagina}}" class="form-control" required>
                                {!! $errors->first('pagina', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('licao') ? 'has-error' : ''}}">
                            <label for="licao" class="col-md-4 control-label">{{ 'Lição' }}</label>
                            <div class="col-md-12">
                                <input type="number" name="licao" value="{{$licao}}" class="form-control" required>
                                {!! $errors->first('licao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('apto') ? 'has-error' : ''}}">
                            <label for="apto" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select id="apto" name="apto" class="form-control" required>
                                    <option value="1">Apto</option>
                                    <option value="0">Inapto</option>                                    
                                </select>
                                {!! $errors->first('apto', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('observacao') ? 'has-error' : ''}}">
                            <label for="observacao" class="col-md-4 control-label">{{ 'Observações' }}</label>
                            <div class="col-md-12">
                                <textarea id="observacao" name="observacao" class="form-control"></textarea>
                                {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano->id . '/aluno/' . $aluno->id . '/metodo') }}" class="btn btn-danger">
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