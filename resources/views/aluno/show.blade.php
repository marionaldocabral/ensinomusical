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
                <div class="pull-right">
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
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                            <tr>
                                <th class="col-md-2"> Nome </th><td class="col-md-10"> {!!$aluno->name!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Email </th><td class="col-md-10"> {!!$aluno->email!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Telefone </th><td class="col-md-10"> {!!$aluno->telefone!!} </td>
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
                            <tr>
                                <th class="col-md-2"> Responsável </th><td class="col-md-10"> {!!$aluno->responsavel!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Contato </th><td class="col-md-10"> {!!$aluno->contato_resp!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Email </th><td class="col-md-10"> {!!$aluno->email_resp!!} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/plano/' . $aluno->plano_id . '/aluno/' . $aluno->id) }}" accept-charset="UTF-8" style="display:inline">
                       	{{ method_field('DELETE') }}
                       	{{ csrf_field() }}
                       	<button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                       		<i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                       	</button>
                   	</form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $aluno->plano_id . '/aluno') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection