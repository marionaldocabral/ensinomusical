@extends('layouts.app')
@section('content')
<div class = 'container'>
   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Usuário
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <form method="POST" action="{{ url('/user/') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                         <div class="row {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input id="name" name="name" type="text" value="{{old('name')}}" class="form-control" required>
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
                                <input id="email" name="email" type="email" value="{{old('email')}}" class="form-control" required>
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="row {{ $errors->has('telefone') ? 'has-error' : ''}}">
                            <label for="telefone" class="col-md-4 control-label">{{ 'Telefone' }}</label>
                            <div class="col-md-12">
                                <input id="telefone" name="telefone" type="text" value="{{old('telefone')}}" class="form-control tel" maxlength="15" required>
                                {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="row {{ $errors->has('nascimento') ? 'has-error' : ''}}">
                            <label for="nascimento" class="col-md-4 control-label">{{ 'Nascimento' }}</label>
                            <div class="col-md-12">
                                <input id="nascimento" name="nascimento" type="date" value="{{old('nascimento')}}" class="form-control" required>
                                {!! $errors->first('nascimento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                         <div class="row {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select name="status" id="status" class="form-control" name="status" value="{{old('status')}}" required>
                                    <option value="iniciante">Iniciante</option>
                                    <option value="ensaio">Ensaio</option>
                                    <option value="rjm">Reunião de Jovens e Menores</option>
                                    <option value="oficial">Culto Oficial</option>
                                    <option value="oficializado">Oficializado</option>
                                    <option value="auxiliar">Auxiliar</option>
                                    <option value="instrutor">Instrutor</option>
                                    <option value="enc_local">Encarregado Local</option>
                                    <option value="enc_regional">Encarregado Regional</option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('localidade_id') ? ' has-error' : '' }}">
                            <label for="localidade_id" class="col-md-4 control-label">{{ 'Localidade' }}</label>
                            <div class="col-md-12">
                                <select id="localidade_id" name="localidade_id" class="form-control" value="{{old('localidade_id')}}">
                                    @foreach($localidades as $localidade)
                                        <option value="{!! $localidade->id !!}">{!! $localidade->nome !!}</option>
                                    @endforeach
                                </select>                
                                {!!$errors->first('localidade_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('plano_id') ? ' has-error' : '' }}">
                            <label for="plano_id" class="col-md-4 control-label">{{ 'Plano' }}</label>
                            <div class="col-md-12">
                                <select id="plano_id" name="plano_id" class="form-control" value={{old('plano_id')}}>
                                    @foreach($planos as $plano)
                                        <option value="{!! $plano->id !!}">
                                            @foreach($localidades as $localidade)
                                                @if($localidade->id == $plano->localidade_id)
                                                    {!! $localidade->nome . " - " . $plano->ano . "." . $plano->turma !!}
                                                    @break
                                                @endif
                                            @endforeach
                                        </option>
                                    @endforeach
                                </select>                
                                {!!$errors->first('plano_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('instrumento') ? ' has-error' : '' }}">
                            <label for="instrumento" class="col-md-4 control-label">{{ 'Instrumento' }}</label>
                            <div class="col-md-12">
                                <select id="instrumento" name="instrumento" class="form-control" value="{{old('instrumento')}}">
                                    @foreach($instrumentos as $instrumento)
                                        <option>{!! $instrumento->nome !!}</option>
                                    @endforeach
                                </select>
                                {!!$errors->first('instrumento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <label for="foto" class="col-md-2 control-label">{{ 'Foto' }}</label>
                            <div class="col-md-12">
                                <input id="foto" name = "foto" type="file" title="Foto" class="form-control" value="">
                            </div>
                        </div>
                        <br>
                        <div class="row {{ $errors->has('responsavel') ? 'has-error' : ''}}">
                            <label for="responsavel" class="col-md-4 control-label">{{ 'Responsável' }}</label>
                            <div class="col-md-12">
                                <input id="responsavel" name="responsavel" type="text" value="{{old('responsavel')}}" class="form-control">
                                {!! $errors->first('responsavel', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('contato_resp') ? 'has-error' : ''}}">
                            <label for="contato_resp" class="col-md-4 control-label">{{ 'Contato' }}</label>
                            <div class="col-md-12">
                                <input id="contato_resp" name="contato_resp" type="text" value="{{old('contato_resp')}}" class="form-control tel" maxlength="15">
                                {!! $errors->first('contato_resp', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('email_resp') ? 'has-error' : ''}}">
                            <label for="email_resp" class="col-md-4 control-label">{{ 'Email' }}</label>
                            <div class="col-md-12">
                                <input id="email_resp" name="email_resp" type="email" value="{{old('email_resp')}}" class="form-control">
                                {!! $errors->first('email_resp', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <br>
                        <div class="row {{ $errors->has('adm') ? ' has-error' : '' }}">
                            <label for="adm" class="col-md-4 control-label">{{ 'Administrador' }}</label>
                            <div class="col-md-12">
                                <select id="adm" name="adm" class="form-control" value="{{old('adm')}}">
                                    <option value="0">Não</option> 
                                    <option value="1">Sim</option>
                                </select>
                                {!!$errors->first('adm', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a Senha</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                             <div class="pull-left">
                                <button class="btn btn-success" type="submit" id="btn-cad">
                                    <i class="fa fa-check" aria-hidden="true"></i> Criar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/user') }}" class="btn btn-danger">
                                    <i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#btn-cad').attr('disabled', '')
            $('#password').keyup(function(){
                senha = $('#password').val()
                confirmacao = $('#password-confirm').val()
                if(senha != '' && senha == confirmacao)
                    $('#btn-cad').removeAttr('disabled')
                else
                    $('#btn-cad').attr('disabled', '')
            })
            $('#password-confirm').keyup(function(){
                senha = $('#password').val()
                confirmacao = $('#password-confirm').val()
                if(senha != '' && senha == confirmacao)
                    $('#btn-cad').removeAttr('disabled')
                else
                    $('#btn-cad').attr('disabled', '')
            })
        })
    </script>
</div>
@endsection