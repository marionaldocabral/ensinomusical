@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Localidade</div>
                <div class="panel-body">
                    <form method="POST" action="{{ url('/localidade/' . $localidade->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        <div class="row {{ $errors->has('nome') ? 'has-error' : ''}}">
                            <label for="nome" class="col-md-4 control-label">{{ 'Nome' }}</label>
                            <div class="col-md-12">
                                <input class="form-control" name="nome" type="text" id="nome" value="{{ $localidade->nome }}" required>
                                {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('cidade_id') ? 'has-error' : ''}}">
                            <label for="cidade_id" class="col-md-4 control-label">{{ 'Cidade' }}</label>
                            <div class="col-md-12">                                
                                <select id="cidade_id" name = "cidade_id" class="form-control">
                                    <option selected value="{{$localidade->cidade_id}}">
                                        @foreach($cidades as $cidade)
                                            @if($cidade->id == $localidade->cidade_id)
                                                {{$cidade->nome}}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($cidades as $cidade)
                                        @if($cidade->id != $localidade->cidade_id)
                                            <option value="{!! $cidade->id !!}">{!! $cidade->nome !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('cidade_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('enc_reg_id') ? 'has-error' : ''}}">
                            <label for="enc_reg_id" class="col-md-4 control-label">{{ 'Encarregado Regional' }}</label>
                            <div class="col-md-12">                                
                                <select id="enc_reg_id" name = "enc_reg_id" class="form-control">
                                    <option selected value="{{$localidade->enc_reg_id}}">
                                        @foreach($regionais as $regional)
                                            @if($regional->id == $localidade->enc_reg_id)
                                                {{$regional->name}}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($regionais as $regional)
                                        @if($regional->id != $localidade->enc_reg_id)
                                            <option value="{!! $regional->id !!}">{!! $regional->name !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('enc_reg_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="row {{ $errors->has('enc_local_id') ? 'has-error' : ''}}">
                            <label for="enc_local_id" class="col-md-4 control-label">{{ 'Encarregado Local' }}</label>
                            <div class="col-md-12">                                
                                <select id="enc_local_id" name = "enc_local_id" class="form-control">
                                    <option selected value="{{$localidade->enc_local_id}}">
                                        @foreach($locais as $local)
                                            @if($local->id == $localidade->enc_local_id)
                                                {{$local->name}}
                                            @endif
                                        @endforeach
                                    </option>
                                    @foreach($locais as $local)
                                        @if($local->id != $localidade->enc_local_id)
                                            <option value="{!! $local->id !!}">{!! $local->name !!}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {!! $errors->first('enc_local_id', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 6px;">
                            <div class="pull-left">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa fa-check" aria-hidden="true"></i> Gravar
                                </button>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/localidade/') }}" class="btn btn-danger">
                                    <i class="fa fa-ban" aria-hidden="true"></i> Cancelar
                                </a>
                            </div>
                        </div>
    </form>
</div>
@endsection