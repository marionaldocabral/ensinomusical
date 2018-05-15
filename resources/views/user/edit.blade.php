@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuário</div>

                <div class="panel-body">

                    <form method="POST" action="{{ url('/user/' . $user->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="name" type="text" id="name" value="{{ $user->name }}" required>
                                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('email') ? 'has-error' : ''}}">
                            <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="email" type="email" id="email" value="{{ $user->email }}" required>
                                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('telefone') ? 'has-error' : ''}}">
                            <label for="telefone" class="col-md-4 control-label">{{ 'Telefone' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="telefone" type="number" id="telefone" value="{{ $user->telefone }}" required>
                                {!! $errors->first('telefone', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('nascimento') ? 'has-error' : ''}}" >
                            <label for="nascimento" class="col-md-4 control-label">{{ 'Nascimento' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nascimento" type="date" id="nascimento" value="{{ $user->nascimento }}" required>
                                {!! $errors->first('nascimento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('status') ? 'has-error' : ''}}">
                            <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
                            <div class="col-md-12">
                                <select name="status" id="status" class="form-control" name="status" value="{{ old('status') }}" required>
                                    <option selected value="{{$user->status}}">
                                        @if($user->status == "iniciante")
                                            {{"Iniciante"}}
                                        @elseif($user->status == "ensaio")
                                            {{"Ensaio"}}
                                        @elseif($user->status == "rjm")
                                            {{"Reunião de Jovens e Menores"}}
                                        @elseif($user->status == "oficial")
                                            {{"Culto Oficial"}}
                                        @elseif($user->status == "oficializado")
                                            {{"Oficializado"}}
                                        @elseif($user->status == "auxiliar")
                                            {{"Auxiliar"}}
                                        @elseif($user->status == "instrutor")
                                            {{"Instrutor"}}
                                        @elseif($user->status == "enc_local")
                                            {{"Encarregado Local"}}
                                        @elseif($user->status == "enc_regional")
                                            {{"Encarregado Regional"}}
                                        @endif
                                    </option>

                                    @if($user->status != "iniciante")
                                        <option value="iniciante">Iniciante</option>
                                    @endif
                                    @if($user->status != "ensaio")
                                        <option value="ensaio">Ensaio</option>
                                    @endif
                                    @if($user->status != "rjm")                                    
                                        <option value="rjm">Reunião de Jovens e Menores</option>
                                    @endif
                                    @if($user->status != "oficial")
                                        <option value="oficial">Culto Oficial</option>
                                    @endif
                                    @if($user->status != "oficializado")
                                        <option value="oficializado">Oficializado</option>
                                    @endif
                                    @if($user->status != "auxiliar")
                                        <option value="auxiliar">Auxiliar</option>
                                    @endif
                                    @if($user->status != "instrutor")
                                        <option value="instrutor">Instrutor</option>
                                    @endif
                                    @if($user->status != "enc_local")
                                        <option value="enc_local">Encarregado Local</option>
                                    @endif
                                    @if($user->status != "enc_regional")
                                        <option value="enc_regional">Encarregado Regional</option>
                                    @endif
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('responsavel') ? 'has-error' : ''}}" >
                            <label for="responsavel" class="col-md-4 control-label">{{ 'Responsável' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="responsavel" type="text" id="responsavel" value="{{ $user->responsavel }}">
                                {!! $errors->first('responsavel', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('contato') ? 'has-error' : ''}}" >
                            <label for="contato" class="col-md-4 control-label">{{ 'Contato' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="contato" type="number" id="contato" value="{{ $user->contato }}">
                                {!! $errors->first('contato', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('instrumento') ? 'has-error' : ''}}" >
                            <label for="instrumento" class="col-md-4 control-label">{{ 'Instrumento' }}</label>
                            <div class="col-md-12">                                
                                <select id="instrumento" name="instrumento" class="form-control">
                                    <option selected>{{$user->instrumento}}</option>
                                    @foreach($instrumentos as $instrumento)
                                        @if($instrumento->nome != $user->instrumento)
                                            <option>{{$instrumento->nome}}</option>
                                        @endif                                        
                                    @endforeach
                                </select>
                                {!! $errors->first('instrumento', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
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
@endsection