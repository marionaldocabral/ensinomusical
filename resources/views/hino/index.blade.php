@extends('layouts.app')
@section('content')
    <div>
        <label><b>Exibir:</b></label>
        <input type="checkbox" id="ckb_rjm" style="margin-left: 15px" checked> Reunião de Jovens
        <input type="checkbox" id="ckb_oficial" style="margin-left: 15px" checked> Culto Oficial
        <input type="checkbox" id="ckb_oficializacao" style="margin-left: 15px" checked> Oficialização
    </div>
    <br>
        <div class="row" id="div_rjm">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pendências para <b>Reunião de Jovens e Menores</b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    @for($i = 431; $i <= 455; $i++)
                                        @if(in_array($i, $passados_rjm))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    @for($i = 456; $i <= 480; $i++)
                                        @if(in_array($i, $passados_rjm))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="div_oficial">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pendências para <b>Culto Oficial</b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tr>
                                    @for($i = 1; $i <= 100; $i++)
                                        @if(in_array($i, $passados_oficial))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>
                                <tr>
                                    @for($i = 101; $i <= 200; $i++)
                                        @if(in_array($i, $passados_oficial))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor                                    
                                </tr>
                                <tr>
                                    @for($i = 201; $i <= 300; $i++)
                                        @if(in_array($i, $passados_oficial))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor                                    
                                </tr>
                                <tr>
                                    @for($i = 301; $i <= 400; $i++)
                                        @if(in_array($i, $passados_oficial))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor                                    
                                </tr>
                                <tr>
                                    @for($i = 401; $i <= 480; $i++)
                                        @if(in_array($i, $passados_oficial))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="div_oficializacao">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Pendências para <b>Oficialização</b>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">                                
                                <tr>
                                    <td><b>Soprano</b></td>
                                    @for($i = 1; $i <= 480; $i++)
                                        @if(in_array($i, $soprano))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>                                
                                <tr>
                                    <td><b>Contralto</b></td>
                                    @for($i = 1; $i <= 480; $i++)
                                        @if(in_array($i, $contralto))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>                                
                                <tr>
                                    <td><b>Tenor</b></td>
                                    @for($i = 1; $i <= 480; $i++)
                                        @if(in_array($i, $tenor))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>                                
                                <tr>
                                    <td><b>Baixo</b></td>
                                    @for($i = 1; $i <= 480; $i++)
                                        @if(in_array($i, $baixo))
                                            <td style="color: lightgray; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @else
                                            <td style="color: black; padding-right: 10px; padding-left: 10px">{{$i}}</td>
                                        @endif
                                    @endfor
                                </tr>                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Aulas práticas de <b>{{$aluno->name}}</b>
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <div class="form-group">
                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                            <div class="pull-left">
                                <a href="{{ url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino/' . 'create') }}" class="btn btn-success">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Nova
                                </a>
                            </div>
                        @endif
                        <div class="pull-right">
                            <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id) }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                            </a>
                        </div>  
                    </div>
                    <br/><br/>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hino</th>
                                    <th>Voz</th>
                                    <th>Status</th>
                                    <!--<th>Finalidade</th>-->
                                    <th>Observações</th>
                                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                        <th style="width: 210px !important;">Ações</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hinos as $hino)
                                    @if($hino->finalidade == 1)
                                        <tr class="hn_rjm">
                                    @elseif($hino->finalidade == 2)
                                        <tr class="hn_oficial">
                                    @elseif($hino->finalidade == 3)
                                        <tr class="hn_oficializacao">
                                    @endif
                                        <td>{!!$hino->data!!}</td>
                                        <td>{!!$hino->numero!!}</td>
                                        <td>
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
                                        <td>
                                            @if($hino->status ==  1)
                                                {{"Apto"}}
                                            @else
                                                {{"Inapto"}}
                                            @endif
                                        </td>
                                        <td>{!!$hino->observacao!!}</td>
                                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                            <td>
                                                <a href = "{{ url('plano/'. $plano_id . '/aluno/' . $aluno->id . '/hino/' . $hino->id) }}" title="Visualizar">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <a href = "{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/hino/' . $hino->id . '/edit') }}" title="Editar">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('plano/' . $plano_id .'/aluno/' . $aluno->id . '/hino/' . $hino->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir" onclick="return confirm(&quot;Confirma exclusão?&quot;)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>    
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            
            $('#ckb_rjm').click(function(){
                $('#div_rjm').toggle()
                $('.hn_rjm').toggle();
            })

            $('#ckb_oficial').click(function(){
                $('#div_oficial').toggle()
                $('.hn_oficial').toggle()
            })

            $('#ckb_oficializacao').click(function(){
                $('#div_oficializacao').toggle()
                $('.hn_oficializacao').toggle()
            })
        })
    </script>
@endsection