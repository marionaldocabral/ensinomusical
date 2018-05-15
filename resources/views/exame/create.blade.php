@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Exame de <b>{{$aluno->name}}</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('data') ? 'has-error' : ''}}">
                            <label for="data" class="col-md-4 control-label">{{ 'Data' }}</label>
                            <div class="col-md-12">                                
                                <input type="date" name="data" id="data" value="{{$data}}" class="form-control" required>
                                {!! $errors->first('data', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('categoria') ? 'has-error' : ''}}">
                            <label for="categoria" class="col-md-4 control-label">{{ 'Categoria' }}</label>
                            <div class="col-md-12">
                                <select id="categoria" name="categoria" class="form-control" required>
                                    @if($nivel < 2)
                                        <option value="ensaio">Ensaio</option>
                                    @endif
                                    @if($nivel < 3)
                                        <option value="rjm">Reunião de Jovens e Menores</option>
                                    @endif
                                    @if($nivel < 4)
                                        <option value="oficial">Culto Oficial</option>
                                    @endif
                                    @if($nivel < 5)
                                        <option value="oficializacao">Oficialização</option>
                                    @endif
                                </select>
                                {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
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
                            <label for="observacao" class="col-md-4 control-label">{{ 'Observação' }}</label>
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
                                <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/exame') }}" class="btn btn-danger">
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