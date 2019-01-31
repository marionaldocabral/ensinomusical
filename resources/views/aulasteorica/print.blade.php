<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{url('clave.png')}}" type="image/x-icon" />

    <title>Ensino Musical</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <style type="text/css">
    	body{
            font-family: 'times';
            -webkit-print-color-adjust: exact;
        }
        @media print {
            a{
                display: none;
            }
        }
        a{
            position: absolute;
            margin-top: 10px;
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
            right: 40px;
        }
        a:hover { 
           background-color: #ECAF50;
        }
        .brasao{
        	height: 100px;
        }
        .caixa-alta{
        	text-transform: uppercase;
        }
        .msg{
        	width: 1350px;
        	text-align: right;
        	font-style: italic;
        }
        table{
        	width: 920px;
        	border: 1px solid;
        	border-collapse: collapse;
        }
        tr{
        	border: 1px solid;
        }
        th{
        	border: 1px solid;
        	background-color: lightgray;
        	font-size: 0.9em;
        	padding: 10px;
        }
        td{
        	border: 1px solid;
        	text-align: center;
            
            font-size: 1em;
            padding-left: 10px;
            padding-right: 10px;
            padding-top: 7px;
            padding-left: 7px;
        }
        .assinatura{            
            width: 450px;
            margin-top: 30PX;
        }
        .img-ass{
            height: 90px;
            margin-bottom: -40px;
        }

    </style>
</head>
<body>
	<a href="{{'/plano/' . $plano->id . '/aula/'}}">
        <i class="fa fa-arrow-left"></i> Voltar
    </a>
	<center>
		<h3 style="margin-top: 50px; text-transform: uppercase;">
			CONGREGAÇÃO CRISTÃ NO BRASIL<br>
			{{$localidade->nome}}<br>
			GRUPO DE ESTUDO MUSICAL
		</h3>
		<h3><i>MÉTODO DE TEORIA E SOLFEJO</i></h3>
		<h3>{{'PLANO DE ENSINO ' . $plano->ano . ' - TURMA ' . $plano->turma}}</h3>

		<table>
			<thead>
				<tr>
					<th>AULA</th>
					<th>MÓD</th>
					<th>DATA</th>
					<th>CONTEÚDO</th>
				</tr>
			</thead>
			<tbody>
				@for($i = 1; $i <= $ultimaaula; $i++)
                    @foreach($aulasteoricas as $aulasteorica)
                        @if($aulasteorica->numero == $i && $aulasteorica->plano_id == $plano->id)                                        
                            <tr>
                                <td>{!!$aulasteorica->numero!!}</td>
                                <td>{!!$aulasteorica->modulo!!}</td>
                                <td>{!!$aulasteorica->data!!}</td>
                                <td style="text-align: left;">{!!$aulasteorica->conteudo!!}</td>
                            </tr>
                        @endif
                    @endforeach
                @endfor
			</tbody>	
		</table>
	</center>
</body>
</html>