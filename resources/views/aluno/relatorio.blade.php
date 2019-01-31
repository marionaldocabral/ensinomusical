<!DOCTYPE html>
<html>
<head>
    <title>Gestão Policial Militar</title>
    <link rel="shortcut icon" href="{{url('brasaopm.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media print {
            a{
                display: none;
            }
        }
        a{
            position: absolute;
            margin-top: 5px;
            background-color: #F7BE81;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 17px;
            padding-right: 17px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-family: 'arial';
            font-size: 0.9em;
        }
        a:hover { 
           background-color: #ECAF50;
        }
        body {
           -webkit-print-color-adjust: exact;
        }
        .corpo_relatorio{
            background-color: #BDBDBD;
            width: 1042px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            overflow: auto;
            border: 1px solid black;
        }
        .lado_esquerdo{
            background-color: #BDBDBD;
            width: auto;
            height: auto;
            margin-top: 8px;
            margin-bottom: 8px;
            margin-left: 8px;           
            position: relative;
            float: left;
            overflow: auto;           
        }
        .lado_direito{
            background-color: #BDBDBD;            
            width: 400px;
            height: auto;
            margin-top: 8px;
            margin-left: 8px;       
            position: relative;
            float: left;
        }
        .titulo_esquerdo{
            background-color: #0B4C5F;
            color: white;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
            font-family: "arial";
            font-size: 0.9em;
            height: 25px;
            border: 1px solid black;
        }
        .titulo_direito{
            background-color: white;
            color: #0B4C5F;
            text-align: center;
            vertical-align: middle;
            display: table-cell;
            font-family: "arial";
            font-size: 0.9em;
            width: 400px;
            height: 25px;
            border: 1px solid black;
        }
        table{
            border-collapse: collapse;
            background-color: white;
            width: 117px;
        }

        table, thead, tr, th, td{
            border: 1px solid black;
            font-family: "arial";
            font-size: 0.9em;
        }
        th, td{
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
            font-weight: bold;
        }
        .table{
            position: relative;
            float: left;
            margin-top: 8px;
        }
        .table_right{
            position: relative;
            margin-left: 8px;
        }
        .table_block{
            position: relative;
            margin-top: 8px;
        }
        .titulo_mesclado{
            line-height: 25px;
        }
        .conteiner{
            background-color: #BDBDBD;
            float: left;
        }
        .conteiner_right{
            margin-left: 8px;
        }
        .table_exception{
            width: 275px;
        }
        .height_row{
            height: 31px;
        }
        .row{
            height: 31px;
            text-align: left;
            font-size: 1.2em;
        }
        .table_ex{
            width: 198px;
        }
    </style>
</head>
<body>
    <a href="{{'/plano/' . $plano->id . '/aluno/' . $aluno->id}}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
    <div class="corpo_relatorio">
        <div style="background-color: white; margin-top: 8px; margin-left: 8px; margin-right: 8px; width: 1024px">
            <div class="titulo_esquerdo" style="text-align: center; display: table-cell; vertical-align: middle; width: 1024px;">
                <b>Ficha de Candidato de Grupo de Estudos Musicais - Congregação Cristão no Brasil - Salvador-BA</b>
            </div>
            <table style="width: 1024px; margin-bottom: 8px;">
                <tbody>
                    <tr>
                        <td style="font-weight: normal; text-align: left;">Candidato: <b>{{$aluno->name}}</b></td>
                        <td colspan="3" style="text-align: left; font-weight: normal;">Endereço: <b>{{$aluno->endereco}}</b></td>
                    </tr>
                    <tr style="border: none;">
                        <td style="font-weight: normal; text-align: left;">Bairro: <b>{{$aluno->bairro}}</b></td>
                        <td style="font-weight: normal; text-align: left;">Cidade: <b>{{$cidade->nome}}</b></td>
                        <td style="font-weight: normal; text-align: left;">Telefone: <b>{{$aluno->telefone}}</b></td>
                        <td style="font-weight: normal; text-align: left;">Contato: <b>{{$aluno->contato_resp}}</b></td>
                    </tr>
                    <tr style="border: none;">
                        <td style="font-weight: normal; text-align: left;">Email: <b>{{$aluno->email}}</b></td>
                        <td style="font-weight: bold; text-align: left;">
                            Data de nascimento: <b>{{$aluno->nascimento}}</b>
                        </td>
                        <td colspan="2" style="font-weight: normal; text-align: left;">Comum Congregação: <b>{{$localidade->nome}}</b></td>
                    </tr>
                </tbody>
            </table>            
        </div>
    </div>
    <div class="corpo_relatorio" style="margin-top: 8px;">
        <div style="background-color: #BDBDBD; margin-top: 8px; margin-left: 8px; margin-right: 8px; width: 1024px">
            <div class="titulo_esquerdo" style="text-align: center; display: table-cell; vertical-align: middle; width: 1024px;">
                <b>Controle de M.T.S. - Método de Teoria e Solfejo</b>
            </div>
            <div class="conteiner" style="float: left;">
                <div class="table_block">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">1º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo1 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">6º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo6 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block" style="float: left;">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">11º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo11 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
            </div>
            <div class="conteiner_right" style="margin-left: 8px; margin-bottom: 8px; float: left;">
                <div class="table_block"">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">2º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo2 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block"">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">7º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo7 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block"">
                    <table class="table_ex">
                        <thead>
                            <tr>
                                <th colspan="4">12º Módulo</th>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <th>Pg.</th>
                                <th>Ex.</th>
                                <th>Visto</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @foreach($modulo12 as $ex)
                                <tr>
                                    <td>{{$ex->data}}</td>
                                    <td>{{$ex->pagina}}</td>
                                    <td>{{$ex->numero}}</td>
                                    <td>
                                        @if($ex->instrutor_id != NULL)
                                            @foreach($instrutores as $instrutor)
                                                @if($instrutor->id == $ex->instrutor_id)
                                                    {{$instrutor->name}}
                                                    @break
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>  
                    </table>                
                </div>
            </div>
            <!--tabelas 3, 4, 5, 8 , 9 e 10, observacao-->
            <div style="float: left; margin-left: 8px;">
                <!--tabelas 3, 4, 5, 8, 9 e 10-->
                <div style="display: block;">
                    <!--tabelas 3 e 8-->
                    <div style=" float: left; display: block; margin-top: 8px;">
                        <table class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">3º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo3 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->name}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table>
                        <table style="margin-top: 8px;" class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">8º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo8 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->name}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table>                        
                    </div>
                    <!--tabelas 4 e 9-->
                    <div style=" float: left; display: block; margin-top: 8px; margin-left: 8px;">
                        <table class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">4º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo4 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->name}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table>
                        <table style="margin-top: 8px;" class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">9º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo9 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->name}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>        
                        </table>                    
                    </div>
                    <!--tabelas 5 e 10-->
                    <div style=" float: left; display: block; margin-top: 8px; margin-left: 8px;">
                        <table class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">5º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo5 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->nome}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table>
                        <table style="margin-top: 8px;" class="table_ex">
                            <thead>
                                <tr>
                                    <th colspan="4">10º Módulo</th>
                                </tr>
                                <tr>
                                    <th>Data</th>
                                    <th>Pg.</th>
                                    <th>Ex.</th>
                                    <th>Visto</th>
                                </tr>                   
                            </thead>
                            <tbody>
                                @foreach($modulo10 as $ex)
                                    <tr>
                                        <td>{{$ex->data}}</td>
                                        <td>{{$ex->pagina}}</td>
                                        <td>{{$ex->numero}}</td>
                                        <td>
                                            @if($ex->instrutor_id != NULL)
                                                @foreach($instrutores as $instrutor)
                                                    @if($instrutor->id == $ex->instrutor_id)
                                                        {{$instrutor->nome}}
                                                        @break
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>            
                        </table>                        
                    </div>
                </div>
            </div>            
            <!--tabela observacao-->
            <div style="float: left; margin-left: 8px;">
                <table style="margin-top: 8px; width: 610px;">
                    <thead>
                        <tr>
                            <th style="height: 17px;">Observação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 11; $i++)
                            <tr style="height: 15px;">
                                <td style="text-align: left;">
                                    @if(isset($exs[$i]))
                                        {{$exs[$i]}}
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>    
            </div> 
        </div>        
    </div>
    <div class="corpo_relatorio" style="margin-top: 8px">
        <div class="lado_esquerdo">
            <div class="titulo_esquerdo" style="width: 608px">
                <b>Controle de Método de Instrumento Musical</b>
            </div>
            <table style="margin-top: 8px; float: left;" class="table_ex">
                <thead>
                    <tr>
                        <th colspan="4">Método:</th>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>Pg.</th>
                        <th>Ex.</th>
                        <th>Visto</th>
                    </tr>                   
                </thead>
                <tbody>
                    @for($i = 1; $i <= 30; $i++)
                        <tr>
                            @if(isset($metodos[$i]))
                                <td>{{$metodos[$i]->data}}</td>
                                <td>{{$metodos[$i]->pagina}}</td>
                                <td>{{$metodos[$i]->licao}}</td>
                                <td>
                                    @foreach($instrutores as $instrutor)
                                        @if($instrutor->id == $metodos[$i]->instrutor_id)
                                            {{$instrutor->name}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                            @else
                                <td style="height: 14px;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>  
            </table>
            <table style="margin-top: 8px; margin-left: 8px; float: left;" class="table_ex">
                <thead>
                    <tr>
                        <th colspan="4">Método:</th>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>Pg.</th>
                        <th>Ex.</th>
                        <th>Visto</th>
                    </tr>                   
                </thead>
                <tbody>
                    @for($i = 31; $i <= 60; $i++)
                        <tr>
                            @if(isset($metodos[$i]))
                                <td>{{$metodos[$i]->data}}</td>
                                <td>{{$metodos[$i]->pagina}}</td>
                                <td>{{$metodos[$i]->licao}}</td>
                                <td>
                                    @foreach($instrutores as $instrutor)
                                        @if($instrutor->id == $metodos[$i]->instrutor_id)
                                            {{$instrutor->name}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                            @else
                                <td style="height: 14px;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>            
            </table>
            <table style="margin-top: 8px; margin-left: 8px; float: left;" class="table_ex">
                <thead>
                    <tr>
                        <th colspan="4">Método:</th>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>Pg.</th>
                        <th>Ex.</th>
                        <th>Visto</th>
                    </tr>                   
                </thead>
                <tbody>
                    @for($i = 61; $i <= 90; $i++)
                        <tr>
                            @if(isset($metodos[$i]))
                                <td>{{$metodos[$i]->data}}</td>
                                <td>{{$metodos[$i]->pagina}}</td>
                                <td>{{$metodos[$i]->licao}}</td>
                                <td>
                                    @foreach($instrutores as $instrutor)
                                        @if($instrutor->id == $metodos[$i]->instrutor_id)
                                            {{$instrutor->name}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                            @else
                                <td style="height: 14px;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>            
            </table>    
        </div>
        <div class="lado_direito">
            <div class="titulo_direito" style="text-align: left; padding-left: 3px;">
                Instrumento: <b>{{$aluno->instrumento}}</b>
            </div>
            <table style="margin-top: 8px; float: left;" class="table_ex">
                <thead>
                    <tr>
                        <th colspan="4">Método:</th>
                    </tr>
                    <tr>
                        <th>Data</th>
                        <th>Pg.</th>
                        <th>Ex.</th>
                        <th>Visto</th>
                    </tr>                   
                </thead>
                <tbody>
                    @for($i = 91; $i <= 120; $i++)
                        <tr>
                            @if(isset($metodos[$i]))
                                <td>{{$metodos[$i]->data}}</td>
                                <td>{{$metodos[$i]->pagina}}</td>
                                <td>{{$metodos[$i]->licao}}</td>
                                <td>
                                    @foreach($instrutores as $instrutor)
                                        @if($instrutor->id == $metodos[$i]->instrutor_id)
                                            {{$instrutor->name}}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                            @else
                                <td style="height: 14px;"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                </tbody>  
            </table>
            <table style="margin-top: 8px; margin-left: 8px; float: left; width: 194px;" class="table_ex">
                <thead>
                    <tr style="height: 27px;">
                        <th colspan="4">Observações:</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 32; $i++)
                        <tr style="height: 16px;">
                            <td>
                                @if(isset($metodos[$i]))
                                    {{$metodos[$i]->observacao}}
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>            
            </table>    
        </div>
    </div>
    <br>
    <body>
    <div class="corpo_relatorio" style="margin-top: 120px;">
        <div class="lado_esquerdo">
            <div class="titulo_esquerdo" style="width: 612px;">
                <b>Controle dos Hinos Oficiais/Reunição de Jovens e Menores/Coros</b>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Hino</th>
                            <th>S</th>
                            <th>C</th>
                            <th>T</th>
                            <th>B</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @for($i = 1; $i < 84; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($soprano[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($contralto[$i]))
                                        X
                                    @endif                      
                                </td>
                                <td>
                                    @if(isset($tenor[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($baixo[$i]))
                                        X
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>                
            </div>
            <div class="table table_right">
                <table>
                    <thead>
                        <tr>
                            <th>Hino</th>
                            <th>S</th>
                            <th>C</th>
                            <th>T</th>
                            <th>B</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @for($i = 84; $i < 167; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($soprano[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($contralto[$i]))
                                        X
                                    @endif                      
                                </td>
                                <td>
                                    @if(isset($tenor[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($baixo[$i]))
                                        X
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>            
            </div>
            <div class="table table_right">
                <table>
                    <thead>
                        <tr>
                            <th>Hino</th>
                            <th>S</th>
                            <th>C</th>
                            <th>T</th>
                            <th>B</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @for($i = 167; $i < 250; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($soprano[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($contralto[$i]))
                                        X
                                    @endif                      
                                </td>
                                <td>
                                    @if(isset($tenor[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($baixo[$i]))
                                        X
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>            
            </div>
            <div class="table table_right">
                <table>
                    <thead>
                        <tr>
                            <th>Hino</th>
                            <th>S</th>
                            <th>C</th>
                            <th>T</th>
                            <th>B</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @for($i = 250; $i < 333; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($soprano[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($contralto[$i]))
                                        X
                                    @endif                      
                                </td>
                                <td>
                                    @if(isset($tenor[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($baixo[$i]))
                                        X
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>            
            </div>
            <div class="table table_right">
                <table>
                    <thead>
                        <tr>
                            <th>Hino</th>
                            <th>S</th>
                            <th>C</th>
                            <th>T</th>
                            <th>B</th>
                        </tr>                   
                    </thead>
                    <tbody>
                        @for($i = 333; $i < 416; $i++)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(isset($soprano[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($contralto[$i]))
                                        X
                                    @endif                      
                                </td>
                                <td>
                                    @if(isset($tenor[$i]))
                                        X
                                    @endif
                                </td>
                                <td>
                                    @if(isset($baixo[$i]))
                                        X
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>            
                </table>            
            </div>
        </div>  
        <div class="lado_direito">
            <div class="titulo_direito">
                <b>Legenda: (S) Soprano/(C) Contralto/(T) Tenor/(B) Baixo</b>               
            </div>
            <div class="conteiner">
                <div class="table_block">
                    <table>
                        <thead>
                            <tr>
                                <th>Hino</th>
                                <th>S</th>
                                <th>C</th>
                                <th>T</th>
                                <th>B</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @for($i = 416; $i < 431; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        @if(isset($soprano[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($contralto[$i]))
                                            X
                                        @endif                      
                                    </td>
                                    <td>
                                        @if(isset($tenor[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($baixo[$i]))
                                            X
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>            
                    </table>                
                </div>                
                <div class="table_block">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="5" class="titulo_mesclado">
                                    Reunião de Jovens e Menores
                                </th>
                            </tr>
                            <tr>
                                <th>Hino</th>
                                <th>S</th>
                                <th>C</th>
                                <th>T</th>
                                <th>B</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @for($i = 431; $i < 481; $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        @if(isset($soprano[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($contralto[$i]))
                                            X
                                        @endif                      
                                    </td>
                                    <td>
                                        @if(isset($tenor[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($baixo[$i]))
                                            X
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="5" class="titulo_mesclado">
                                    Coros
                                </th>
                            </tr>
                            <tr>
                                <th>Hino</th>
                                <th>S</th>
                                <th>C</th>
                                <th>T</th>
                                <th>B</th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @for($i = 481; $i < 487; $i++)
                                <tr>
                                    <td>{{$i - 480}}</td>
                                    <td>
                                        @if(isset($soprano[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($contralto[$i]))
                                            X
                                        @endif                      
                                    </td>
                                    <td>
                                        @if(isset($tenor[$i]))
                                            X
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($baixo[$i]))
                                            X
                                        @endif
                                    </td>
                                </tr>
                            @endfor            
                    </table>                
                </div>
                
            </div>

            <div class="conteiner conteiner_right">
                <div class="table_block">
                    <table class="table_exception">
                        <thead>
                            <tr>
                                <th class="row">
                                    Observações:
                                </th>
                            </tr>                   
                        </thead>
                        <tbody>
                            @for($i = 1; $i < 15; $i++)
                                <tr class="height_row">
                                    <td style="text-align: left;">
                                        @if(isset($hino_obs[$i]))
                                            {{$hino_obs[$i]}}
                                        @endif
                                    </td>
                                </tr>
                            @endfor
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block">
                    <table class="table_exception">
                        <thead>
                            <tr>
                                <th colspan="2" class="titulo_esquerdo" style="font-size: 1.2em;">
                                    Avaliações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avaliacaos as $avaliacao)
                                <tr class="height_row">
                                    <td style="width: 120px">{{$avaliacao->modulo . 'º Módulo'}}</td>
                                    <td>
                                        {{$avaliacao->nota}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block">
                    <table class="table_exception">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Iniciou no G. E. M. em:</p>
                                    <p>{{$aula->data}}</p>
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <p>Iniciou no Ensaio Musical em:</p>
                                    <p>
                                        @if($teste_ensaio != NULL)
                                            {{$teste_ensaio->data}}
                                        @endif
                                    </p>                         
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <p>Iniciou na R. J. M. em:</p>
                                    <p>
                                        @if($teste_rjm != NULL)
                                            {{$teste_rjm->data}}
                                        @endif
                                    </p>                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <p>Iniciou no Culto Oficial em:</p>
                                    <p>
                                        @if($teste_culto != NULL)
                                            {{$teste_culto->data}}
                                        @endif
                                    </p>                                    
                                </td>                                
                            </tr>
                            <tr>
                                <td>
                                    <p>Oficializou em:</p>
                                    <p>
                                        @if($teste_oficial != NULL)
                                            {{$teste_oficial->data}}
                                        @endif
                                    </p>                                    
                                </td>                                
                            </tr>
                        </tbody>            
                    </table>                
                </div>
                <div class="table_block">
                    <table class="table_exception">
                        <tbody>
                            <tr>
                                <td>
                                    <p>
                                        <br>_______________________________________<br>
                                        Encarregado Local
                                    </p>
                                    <p>
                                        <br>_______________________________________<br>
                                        Encarregado Regional
                                        <br>
                                    </p>
                                </td>                                
                            </tr>
                        </tbody>            
                    </table>                
                </div>
            </div>
        </div>        
    </div>
</body>
</html>