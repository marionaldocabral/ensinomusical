@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-14">
        <div class="panel panel-default">
            <div class="panel-heading">
                MTS de <b>{{$aluno->name}}</b>
            </div>
            <div class="panel-body">
                @include('admin.info')
                <div class="form-group">
                    <div class="pull-right">
                        <a href="{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id) }}" class="btn btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Voltar
                        </a>
                    </div>
                </div>
                <br/><br/>
                <div class="table-responsive">
                    <div class="row">
                        <div style="margin-left: 15px; float: left;">         
                            <table class="table table-bordered" style="border: 2px solid lightgray">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">1º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">2º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">3º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">4º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">5º Módulo</th>
                                        <th colspan="6" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">6º Módulo</th>
                                        <th colspan="6" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">7º Módulo</th>
                                        <th colspan="6" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">8º Módulo</th>
                                        <th colspan="6" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">9º Módulo</th>
                                        <th colspan="6" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">10º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">11º Módulo</th>
                                        <th colspan="3" style="text-align: center; border-left: 2px solid lightgray; border-right: 2px solid lightgray; background-color: #FAFAFA">12º Módulo</th>
                                    </tr>
                                    <tr>
                                        @for($i = 1; $i <= 17; $i++)
                                            <th style="border-left: 2px solid lightgray;">Ex.</th>
                                            <th>Pg.</th>
                                            <th style="border-right: 2px solid lightgray"><i class="fa fa-check-square-o"></i></th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 1; $i <= 10; $i++)
                                        <tr>                                        
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo1[$i]->id)}}">{{$modulo1[$i]->numero}}</a></td>
                                            <td>{{$modulo1[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo1[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo1[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo1[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo2[$i]->id)}}">{{$modulo2[$i]->numero}}</a></td>
                                            <td>{{$modulo2[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo2[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo2[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo2[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo3[$i]->id)}}">{{$modulo3[$i]->numero}}</a></td>
                                            <td>{{$modulo3[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo3[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo3[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo3[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo4[$i]->id)}}">{{$modulo4[$i]->numero}}</a></td>
                                            <td>{{$modulo4[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo4[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo4[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo4[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo5[$i]->id)}}">{{$modulo5[$i]->numero}}</a></td>
                                            <td>{{$modulo5[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo5[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo5[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo5[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo6a[$i]->id)}}">{{$modulo6a[$i]->numero}}</a></td>
                                            <td>{{$modulo6a[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo6a[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo6a[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo6a[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo6b[$i]->id)}}">{{$modulo6b[$i]->numero}}</a></td>
                                            <td>{{$modulo6b[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo6b[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo6b[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo6b[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo7a[$i]->id)}}">{{$modulo7a[$i]->numero}}</a></td>
                                            <td>{{$modulo7a[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo7a[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo7a[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo7a[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo7b[$i]->id)}}">{{$modulo7b[$i]->numero}}</a></td>
                                            <td>{{$modulo7b[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo7b[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo7b[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo7b[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo8a[$i]->id)}}">{{$modulo8a[$i]->numero}}</a></td>
                                            <td>{{$modulo8a[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo8a[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo8a[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo8a[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo8b[$i]->id)}}">{{$modulo8b[$i]->numero}}</a></td>
                                            <td>{{$modulo8b[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo8b[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo8b[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo8b[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo9a[$i]->id)}}">{{$modulo9a[$i]->numero}}</td>
                                            <td>{{$modulo9a[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo9a[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo9a[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo9a[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo9b[$i]->id)}}">{{$modulo9b[$i]->numero}}</a></td>
                                            <td>{{$modulo9b[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo9b[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo9b[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo9b[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo10a[$i]->id)}}">{{$modulo10a[$i]->numero}}</a></td>
                                            <td>{{$modulo10a[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo10a[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo10a[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo10a[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>
                                            
                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo10b[$i]->id)}}">{{$modulo10b[$i]->numero}}</a></td>
                                            <td>{{$modulo10b[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo10b[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo10b[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo10b[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo11[$i]->id)}}">{{$modulo11[$i]->numero}}</a></td>
                                            <td>{{$modulo11[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo11[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo11[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo11[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>

                                            <td style="border-left: 2px solid lightgray;"><a href="{{url('plano/' . $plano_id . '/aluno/' . $aluno->id . '/exercicio/' . $modulo12[$i]->id)}}">{{$modulo12[$i]->numero}}</a></td>
                                            <td>{{$modulo12[$i]->pagina}}</td>
                                            <td>
                                                <form>
                                                    @if($modulo12[$i]->data == NULL)
                                                        <input class="checkbox" type="checkbox" id="{{$modulo12[$i]->id}}" value="0">
                                                    @else
                                                        <input class="checkbox" type="checkbox" id="{{$modulo12[$i]->id}}" value="1" checked>
                                                    @endif
                                                </form>
                                            </td>           
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('.checkbox').click(function(){
                var url = 'exercicio/' + $(this).attr('id') + '/check'
                $.get(url, function(data, status){
                    if(status == 'success'){
                        if(data['data'] == null){
                            $(this).removeAttr('checked')
                        }
                        else{
                            $(this).attr('checked', 0)
                        }
                    }else{
                        alert('Falha na conexão com o servidor!')
                    }
                })
            })
        })
    </script>
</div>
@endsection