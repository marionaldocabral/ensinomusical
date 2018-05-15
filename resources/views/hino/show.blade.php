@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aula Prática de <b>{!! $aluno->name !!}</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-borderless">          
                        <tbody>
                             <tr>
                                <th class="col-md-2"> Data </th><td class="col-md-10"> {!!$hino->data!!} </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Hino </th><td class="col-md-10"> {!!$hino->numero!!} </td>
                            </tr>
                             <tr>
                                <th class="col-md-2"> Voz </th>
                                <td class="col-md-10">
                                    @if($hino->voz == 1)
                                        {{'Soprano'}}
                                    @elseif($hino->voz == 2)
                                        {{'Contralto'}}                                    
                                    @elseif($hino->voz == 3)
                                        {{'Tenor'}}
                                    @elseif($hino->voz == 4)
                                        {{'Baixo'}}
                                    @elseif($hino->voz == 5)
                                        {{'Soprano/Contralto'}}
                                    @elseif($hino->voz == 6)
                                        {{'Soprano/Tenor'}}
                                    @elseif($hino->voz == 7)
                                        {{'Soprano/Baixo'}}
                                    @elseif($hino->voz == 8)
                                        {{'Contralto/Tenor'}}
                                    @elseif($hino->voz == 9)
                                        {{'Contralto/Baixo'}}
                                    @elseif($hino->voz == 10)
                                        {{'Tenor/Baixo'}}
                                    @elseif($hino->voz == 11)
                                        {{'Soprano/Contralto/Tenor'}}
                                    @elseif($hino->voz == 12)
                                        {{'Soprano/Contralto/Baixo'}}
                                    @elseif($hino->voz == 13)
                                        {{'Soprano/Tenor/Baixo'}}
                                    @elseif($hino->voz == 14)
                                        {{'Contralto/Tenor/Baixo'}}
                                    @elseif($hino->voz == 15)
                                        {{'Soprano/Contralto/Tenor/Baixo'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Status </th>
                                <td class="col-md-10">
                                    @if($hino->status == 1)
                                        {{'Apto'}}
                                    @else
                                        {{'Inapto'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Finalidade </th>
                                <td class="col-md-10">
                                    @if($hino->finalidade == 1)
                                        {{'Reunião de Jovens e Menores'}}
                                    @elseif($hino->finalidade == 2)
                                        {{'Culto Oficial'}}
                                    @elseif($hino->finalidade == 3)
                                        {{'Oficialização'}}
                                    @elseif($hino->finalidade == 4)
                                        {{'Revisão'}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-2"> Observaçõees </th>
                                <td class="col-md-10">
                                    {{$hino->observacao}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pull-left">                    
                    <form method="POST" action="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino/' . $hino->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Excluir
                        </button>
                    </form>
                </div>
                <div class="pull-right">
                    <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection