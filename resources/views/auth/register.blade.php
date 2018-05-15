@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cadatrar-se</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Telefone</label>
                            <div class="col-md-6">
                                <input id="telefone" type="tel" class="form-control" name="telefone" value="{{ old('telefone') }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nascimento') ? ' has-error' : '' }}">
                            <label for="telefone" class="col-md-4 control-label">Nascimento</label>

                            <div class="col-md-6">
                                <input id="nascimento" type="date" class="form-control" name="nascimento" value="{{ old('nascimento') }}" required>

                                @if ($errors->has('nascimento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nascimento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control" name="status" value="{{ old('status') }}" required>
                                    <option value="iniciante">Iniciante</option>
                                    <option value="ensaio">Apto para Ensaio</option>
                                    <option value="rjm">Apto para Reunião de Jovens e Menores</option>
                                    <option value="oficial">Apto para Culto Oficial</option>
                                    <option value="oficializado">Oficializado</option>
                                    <option value="auxiliar">Auxiliar</option>
                                    <option value="instrutor">Instrutor</option>
                                    <option value="local">Encarregado Local</option>
                                    <option value="regional">Encarregado Regional</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('responsavel') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Responsável</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('responsavel') }}" autofocus>

                                @if ($errors->has('responsavel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('responsavel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contato_resp') ? ' has-error' : '' }}">
                            <label for="contato_resp" class="col-md-4 control-label">Contato</label>

                            <div class="col-md-6">
                                <input id="contato_resp" type="tel" class="form-control" name="contato_resp" value="{{ old('contato_resp') }}" autofocus>

                                @if ($errors->has('contato_resp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contato_resp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('localidade_id') ? ' has-error' : '' }}">
                            <label for="localidade_id" class="col-md-4 control-label">Localidade</label>

                            <div class="col-md-6">
                            
                                <input id="localidade_id" type="number" class="form-control" name="localidade_id" value="{{ old('localidade_id') }}" autofocus>

                                @if ($errors->has('localidade_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contato_resp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('plano_id') ? ' has-error' : '' }}">
                            <label for="plano_id" class="col-md-4 control-label">{{ 'Plano' }}</label>
                            <div class="col-md-6">
                                <select id="plano_id" name="plano_id" class="form-control" value="{{old('plano_id')}}" autofocus>
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
                                 @if ($errors->has('plano_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plano_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('instrumento') ? ' has-error' : '' }}">
                            <label for="instrumento" class="col-md-4 control-label">{{ 'Instrumento' }}</label>
                            <div class="col-md-6">
                                <select id="instrumento" name="instrumento" class="form-control" value="{{old('instrumento')}}" autofocus>
                                    @foreach($instrumentos as $instrumento)
                                        <option>{!! $instrumento->nome !!}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('instrumento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instrumento') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('adm') ? ' has-error' : '' }}">
                            <label for="adm" class="col-md-4 control-label">{{ 'Administrador' }}</label>
                            <div class="col-md-6">
                                <select id="adm" name="adm" class="form-control" value="{{old('adm')}}">
                                    <option value="0">Não</option> 
                                    <option value="1">Sim</option>
                                </select>
                                @if ($errors->has('adm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adm') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('adm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('adm') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme a Senha</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar-se
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
