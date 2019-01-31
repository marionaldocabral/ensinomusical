@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Aluno de <b>{{$plano->ano . "." . $plano->turma}}</b>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/plano/' . $plano->id . '/aluno') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(session('erro'))
                            <div class="alert alert-danger">
                                {{ session('erro') }}                            
                            </div>
                        @endif
                        <div class="row {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input id="name" name = "name" type="text" class="form-control" required>
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <label for="enderco" class="col-md-4 control-label">{{ 'Endereço' }}</label>
                            <div class="col-md-12">
                                <input id="endereco" name="endereco" type="text" value="{{old('endereco')}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label for="bairro" class="col-md-4 control-label">{{ 'Bairro' }}</label>
                            <div class="col-md-12">
                                <input id="bairro" name="bairro" type="text" value="{{old('bairro')}}" class="form-control">
                            </div>
                        </div>
                        <div class="row {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
                            <div class="col-md-12">
                                <input id="email" name = "email" type="email" class="form-control" required>
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('telefone') ? 'has-error' : ''}}">
                            <label for="telefone" class="col-md-4 control-label">{{ 'Telefone' }}</label>
                            <div class="col-md-12">
                                <input id="telefone" name = "telefone" type="text" class="form-control tel" maxlength="15" required>
                                {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('nascimento') ? 'has-error' : ''}}">
                            <label for="nascimento" class="col-md-4 control-label">{{ 'Nascimento' }}</label>
                            <div class="col-md-12">
                                <input id="nascimento" name = "nascimento" type="date" class="form-control">
                                {!! $errors->first('nascimento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select name="status" id="status" class="form-control" name="status" required>
                                    <option value="iniciante">Iniciante</option>
                                    <option value="ensaio">Ensaio</option>
                                    <option value="rjm">Reunião de Jovens e Menores</option>
                                    <option value="oficial">Culto Oficial</option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('localidade_id') ? 'has-error' : ''}}">
                            <div class="col-md-12">
                                <input id="localidade_id" name="localidade_id" type="hidden" class="form-control" value="{!! $plano->localidade_id !!}">
                                {!! $errors->first('localidade_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('plano_id') ? 'has-error' : ''}}">
                            <div class="col-md-12">
                                <input id="plano_id" name = "plano_id" type="hidden" class="form-control" value="{!! $plano->id !!}">
                                {!! $errors->first('plano_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('instrumento') ? 'has-error' : ''}}">
                            <label for="instrumento" class="col-md-4 control-label">{{ 'Instrumento' }}</label>
                            <div class="col-md-12">                                
                                <select id="instrumento" name="instrumento" class="form-control">
                                    @foreach($instrumentos as $instrumento)
                                        <option>{{$instrumento->nome}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('instrumento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('adm') ? 'has-error' : ''}}">
                            <div class="col-md-12">
                                <input id="adm" name="adm" type="hidden" class="form-control" value="0">
                                {!! $errors->first('adm', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <label for="foto" class="col-md-2 control-label">{{ 'Foto' }}</label>
                            <div class="col-md-12">
                                <input id="foto" name = "foto" type="file" title="Foto" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="row {{ $errors->has('responsavel') ? 'has-error' : ''}}">
                            <label for="responsavel" class="col-md-4 control-label">{{ 'Responsável' }}</label>
                            <div class="col-md-12">
                                <input id="responsavel" name = "responsavel" type="text" class="form-control">
                                {!! $errors->first('responsavel', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('contato_resp') ? 'has-error' : ''}}">
                            <label for="contato_resp" class="col-md-4 control-label">{{ 'Contato' }}</label>
                            <div class="col-md-12">
                                <input id="contato_resp" name = "contato_resp" type="text" class="form-control tel" maxlength="15">
                                {!! $errors->first('contato_resp', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('email_resp') ? 'has-error' : ''}}">
                            <label for="email_resp" class="col-md-4 control-label">{{ 'Email' }}</label>
                            <div class="col-md-12">
                                <input id="email_resp" name = "email_resp" type="email" class="form-control">
                                {!! $errors->first('email_resp', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/plano/' . $plano->id . '/aluno') }}" class="btn btn-danger">
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