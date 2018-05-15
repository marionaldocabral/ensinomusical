@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Aula prática de <b>{{$aluno->name}} </b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/metodo/' . $aulaspratica->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('user_id') ? 'has-error' : ''}}">
                            <div class="col-md-12">
                                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{ $aulaspratica->user_id }}" required>
                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="data" type="date" id="data" value="{{ $aulaspratica->data }}" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('metodo') ? 'has-error' : ''}}">
                            <label for="metodo" class="col-md-4 control-label">{{ 'Método' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="metodo" type="text" id="metodo" value="{{ $aulaspratica->metodo }}" required>
                                {!! $errors->first('metodo', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('pagina') ? 'has-error' : ''}}">
                            <label for="pagina" class="col-md-4 control-label">{{ 'Página' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="pagina" type="number" id="pagina" value="{{ $aulaspratica->pagina }}" required>
                                {!! $errors->first('pagina', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('licao') ? 'has-error' : ''}}">
                            <label for="licao" class="col-md-4 control-label">{{ 'Lição' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="licao" type="number" id="licao" value="{{ $aulaspratica->licao }}" required>
                                {!! $errors->first('licao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('apto') ? 'has-error' : ''}}">
                            <label for="apto" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select class="form-control" name="apto" id="apto" required>
                                    @if($aulaspratica->apto == 0)
                                        <option value="0">Inapto</option>
                                        <option value="1">Apto</option>
                                    @else                                    
                                        <option value="1">Apto</option>
                                        <option value="0">Inapto</option>
                                    @endif                                    
                                </select>
                                {!! $errors->first('apto', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('observacao') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Observações' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="observacao" type="text" id="observacao" value="{{ $aulaspratica->observacao }}">
                                {!! $errors->first('observacao', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/metodo') }}" class="btn btn-danger">
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