@extends('layouts.app')
@section('content')
@if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor' || Auth::user()->status == 'auxiliar')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                @include('admin.info')
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Resumo</b></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <th>Localidad</th>
                                        <th>Enc. Reg.</th>
                                        <th>Enc. Local</th>
                                        <th>Músicos</th>
                                        <th>Organistas</th>
                                        <th>Alunos</th>
                                        <th>Alunas</th>
                                        <th>Soprano</th>
                                        <th>Contralto</th>
                                        <th>Tenor</th>
                                        <th>Baixo</th>
                                        <th>Cordas</th>
                                        <th>Madeiras</th>
                                        <th>Metais</th>                                        
                                    </thead>         
                                    <tbody>
                                        <tr>
                                            <td>{{$localidade->nome}}</td>
                                            <td>{{$enc_regional->name}}</td>
                                            <td>{{$enc_local->name}}</td>
                                            <td style="text-align: center">{{$qtd_musicos}}</td>
                                            <td style="text-align: center">{{$organistas}}</td>
                                            <td style="text-align: center">{{$alunos}}</td>
                                            <td style="text-align: center">{{$alunas}}</td>

                                            @if($soprano < (($soprano + $contralto + $tenor + $baixo) * 0.4))
                                                <td style="text-align: center; color: red"><b>{{$soprano}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$soprano}}</td>
                                            @endif
                                            @if($contralto < (($soprano + $contralto + $tenor + $baixo) * 0.25))
                                                <td style="text-align: center; color: red"><b>{{$contralto}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$contralto}}</td>
                                            @endif
                                            @if($tenor < (($soprano + $contralto + $tenor + $baixo) * 0.25))
                                                <td style="text-align: center; color: red"><b>{{$tenor}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$tenor}}</td>
                                            @endif
                                            @if($baixo < (($soprano + $contralto + $tenor + $baixo) * 0.10))
                                                <td style="text-align: center; color: red"><b>{{$baixo}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$baixo}}</td>
                                            @endif

                                            @if($cordas < (($cordas + $madeiras + $metais) * 0.5))
                                                <td style="text-align: center; color: red"><b>{{$cordas}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$cordas}}</td>
                                            @endif
                                            @if($madeiras < (($cordas + $madeiras + $metais) * 0.25))
                                                <td style="text-align: center; color: red"><b>{{$madeiras}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$madeiras}}</td>
                                            @endif
                                            @if($metais < (($cordas + $madeiras + $metais) * 0.25))
                                                <td style="text-align: center; color: red"><b>{{$metais}}</b></td>
                                            @else
                                                <td style="text-align: center; color: black">{{$metais}}</td>
                                            @endif
                                        </tr>                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Músicos do Culto Oficial</b></div>
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Instrumento</th>
                                </thead>
                                <tbody>
                                    @foreach($musicos as $musico)
                                        @if(($musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor' || $musico->status == 'enc_local' || $musico->status == 'enc_regional') && $musico->instrumento != 'Órgão')
                                            <tr>
                                                <td>{{$musico->name}}</td>
                                                <td>
                                                    @if($musico->status == 'iniciante')
                                                        {{'Iniciante'}}
                                                    @elseif($musico->status == 'ensaio')
                                                        {{'Ensaio'}}
                                                    @elseif($musico->status == 'rjm')
                                                        {{'Reunião de Jovens e Menores'}}
                                                    @elseif($musico->status == 'oficial')
                                                        {{'Culto Oficial'}}
                                                    @elseif($musico->status == 'oficializado')
                                                        {{'Oficializado'}}
                                                    @elseif($musico->status == 'auxiliar')
                                                        {{'Auxiliar'}}
                                                    @elseif($musico->status == 'instrutor')
                                                        {{'Instrutor'}}
                                                    @elseif($musico->status == 'enc_local')
                                                        {{'Encarregado Local'}}
                                                    @elseif($musico->status == 'enc_regional')
                                                        {{'Encarregado Regional'}}
                                                    @endif
                                                </td>
                                                <td>{{$musico->instrumento}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Músicos da Reunião de Jovens e Menores</b></div>
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Instrumento</th>
                                </thead>
                                <tbody>
                                    @foreach($musicos   as $musico)
                                        @if($musico->status == 'rjm' && $musico->instrumento != 'Órgão')
                                            <tr>
                                                <td>{{$musico->name}}</td>
                                                <td>
                                                    @if($musico->status == 'iniciante')
                                                        {{'Iniciante'}}
                                                    @elseif($musico->status == 'ensaio')
                                                        {{'Ensaio'}}
                                                    @elseif($musico->status == 'rjm')
                                                        {{'Reunião de Jovens e Menores'}}
                                                    @elseif($musico->status == 'oficial')
                                                        {{'Culto Oficial'}}
                                                    @elseif($musico->status == 'oficializado')
                                                        {{'Oficializado'}}
                                                    @elseif($musico->status == 'auxiliar')
                                                        {{'Auxiliar'}}
                                                    @elseif($musico->status == 'instrutor')
                                                        {{'Instrutor'}}
                                                    @elseif($musico->status == 'enc_local')
                                                        {{'Encarregado Local'}}
                                                    @elseif($musico->status == 'enc_regional')
                                                        {{'Encarregado Regional'}}
                                                    @endif
                                                </td>
                                                <td>{{$musico->instrumento}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Organistas</b></div>
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Nome</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach($musicos as $musico)
                                        @if($musico->instrumento == 'Órgão' && ($musico->status == 'rjm' || $musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor' || $musico->status == 'examinadora'))
                                            <tr>
                                                <td>{{$musico->name}}</td>
                                                <td>
                                                    @if($musico->status == 'iniciante')
                                                        {{'Iniciante'}}
                                                    @elseif($musico->status == 'ensaio')
                                                        {{'Ensaio'}}
                                                    @elseif($musico->status == 'rjm')
                                                        {{'Reunião de Jovens e Menores'}}
                                                    @elseif($musico->status == 'oficial')
                                                        {{'Culto Oficial'}}
                                                    @elseif($musico->status == 'oficializado')
                                                        {{'Oficializado'}}
                                                    @elseif($musico->status == 'auxiliar')
                                                        {{'Auxiliar'}}
                                                    @elseif($musico->status == 'instrutor')
                                                        {{'Instrutora'}}                                                    
                                                    @elseif($musico->status == 'enc_regional')
                                                        {{'Examinadora'}}                                                    
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Alunos</b></div>
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Nome</th>
                                    <th>Status</th>
                                    <th>Instrumento</th>
                                </thead>
                                <tbody>
                                    @foreach($musicos as $musico)
                                        @if($musico->instrumento != 'Órgão' && ($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial'))
                                            <tr>
                                                <td>{{$musico->name}}</td>
                                                <td>
                                                    @if($musico->status == 'iniciante')
                                                        {{'Iniciante'}}
                                                    @elseif($musico->status == 'ensaio')
                                                        {{'Ensaio'}}
                                                    @elseif($musico->status == 'rjm')
                                                        {{'Reunião de Jovens e Menores'}}
                                                    @elseif($musico->status == 'oficial')
                                                        {{'Culto Oficial'}}
                                                    @endif
                                                </td>
                                                <td>{{$musico->instrumento}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Alunas</b></div>
                    <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-borderless">
                                <thead>
                                    <th>Nome</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @foreach($musicos as $musico)
                                        @if($musico->instrumento == 'Órgão' && ($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial'))
                                            <tr>
                                                <td>{{$musico->name}}</td>
                                                <td>
                                                    @if($musico->status == 'iniciante')
                                                        {{'Iniciante'}}
                                                    @elseif($musico->status == 'ensaio')
                                                        {{'Ensaio'}}
                                                    @elseif($musico->status == 'rjm')
                                                        {{'Reunião de Jovens e Menores'}}
                                                    @elseif($musico->status == 'oficial')
                                                        {{'Culto Oficial'}}
                                                    @endif
                                                </td>                                                
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
