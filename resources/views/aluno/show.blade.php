@extends('layouts.app') 
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            @if($aluno->faltas > 8)
                <div class="panel-heading" style="color: red"><b>{!! $aluno->name !!}</b></div>
            @else
                <div class="panel-heading" style="color: black"><b>{!! $aluno->name !!}</b></div>
            @endif
            <div class="panel-body">
                @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                    <div class="pull-right">
                        <a href="{{ url('/plano/' . $aluno->plano_id . '/aluno') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                @else
                    <div class="pull-right">
                        <a href="{{ url('/home') }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                @endif
                
                <div class="pull-left">
                    <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/exercicio') }}" title="MTS">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                    </a>
                    
                    <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/metodo') }}" title="Métodos ">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-music" aria-hidden="true"></i>
                        </button>
                    </a>
                    <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/hino') }}" title="Hinos">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </button>
                    </a>
                    <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/avaliacao') }}" title="Avaliações ">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-font" aria-hidden="true"></i>
                        </button>
                    </a>
                    <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/exame') }}" title="Exames ">
                        <button class="btn btn-success btn-sm">
                            <i class="fa fa-medkit" aria-hidden="true"></i>
                        </button>
                    </a>
                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                        <a href = "{{ url('plano/' . $plano->id . '/aluno/' . $aluno->id . '/relatorio') }}" title="Relatório">
                            <button class="btn btn-success btn-sm">
                                <i class="fa fa-hospital-o" aria-hidden="true"></i>
                            </button>
                        </a>
                    @endif
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            @if($aluno->foto != NULL)
                                <tr>
                                    <img class="img-thumbnail" src="{{URL::to($aluno->foto)}}" alt="Foto" style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 150px; border-style: solid;">
                                </tr>
                            @endif
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {!!$aluno->name!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Endereço </th><td class="col-md-10"> {!!$aluno->endereco!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Bairro </th><td class="col-md-10"> {!!$aluno->bairro!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Email </th><td class="col-md-10"> {!!$aluno->email!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Telefone </th><td class="col-md-10">
                                    @if(strlen($aluno->telefone) != 0)
                                        {!!$aluno->telefone!!}
                                    @else
                                        {{'-'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Nascimento </th><td class="col-md-10"> {!!$aluno->nascimento!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Status </th><td class="col-md-10">
                                    @if($aluno->status == 'iniciante')
                                        {{'Iniciante'}}
                                    @elseif($aluno->status == 'ensaio')
                                        {{'Ensaio'}}
                                    @elseif($aluno->status == 'rjm')
                                        {{'Reunião de Jovens e Menores'}}
                                    @elseif($aluno->status == 'oficial')
                                        {{'Culto Oficial'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Instrumento </th><td class="col-md-10"> {!!$aluno->instrumento!!} </td>
                            </tr>
                            <tr>                                
                                @if($aluno->faltas > 8)
                                    <th class="col-md-2" style="color: red"> Faltas </th><td class="col-md-10" style="color: red"> <b>{!!$aluno->faltas!!}</b> </td>
                                @else
                                    <th class="col-md-2" style="color: black"> Faltas </th><td class="col-md-10" style="color: black"> {!!$aluno->faltas!!} </td>
                                @endif
                            </tr>
                            @if($aluno->responsavel != null)
                                <tr>
                                    <th class="col-md-2"> Responsável </th><td class="col-md-10"> {!!$aluno->responsavel!!} </td>
                                </tr>
                            @endif
                            @if($aluno->contato_resp != null)
                                <tr>
                                    <th class="col-md-2"> Contato </th><td class="col-md-10"> {!!$aluno->contato_resp!!} </td>
                                </tr>
                            @endif
                            @if($aluno->email_resp != null)
                                <tr>
                                    <th class="col-md-2"> Email </th><td class="col-md-10"> {!!$aluno->email_resp!!} </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if(Auth::user()->adm == 1)
                    <div class="pull-left">
                        <form method="POST" action="{{ url('/plano/' . $aluno->plano_id . '/aluno/' . $aluno->id) }}" accept-charset="UTF-8" style="display:inline">
                           	{{ method_field('DELETE') }}
                           	{{ csrf_field() }}
                           	<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                           		<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                           	</button>
                       	</form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection