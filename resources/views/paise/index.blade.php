@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Países
            </div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    <div class="pull-left">
                        <a href="{{ url('/paise/create') }}" class="btn btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ url('/home') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
                <br/><br/>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th style="width: 210px !important;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paises as $paise) 
                                <tr>
                                    <td>{!!$paise->nome!!}</td>
                                    <td>{!!$paise->sigla!!}</td>
                                    <td>
                                        <a href = "{{ url('/paise/' . $paise->id) }}" title="Visualizar">
                                            <button class="btn btn-info btn-sm">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <a href = "{{ url('/paise/' . $paise->id . '/edit') }}" title="Editar">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        <form method="POST" action="{{ url('/paise/' . $paise->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection