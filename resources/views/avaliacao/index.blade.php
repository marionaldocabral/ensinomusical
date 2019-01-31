@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Avaliações Teóricas de <b>{{ $aluno->name }}</b>
                </div>
                <div class="panel-body">
                    @include('admin.info')
                    <div class="form-group">
                        <div class="pull-left">
                            @if($aprovado == true)
                                <label style="font-size: 2em; color: #3ADF00">APTO</label>
                            @else
                                <label style="font-size: 1em; color: red">Existem pendências</label>
                            @endif
                        </div>
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
                                    <th>Módulo</th>
                                    <th>Conteúdo</th>
                                    <th>Nota</th>
                                    @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                        <th style="width: 210px !important;">Ações</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($avaliacaos as $avaliacao)
                                    <tr>
                                        <td>{!!$avaliacao->modulo!!}</td>
                                        <td>
                                            @if($avaliacao->modulo == 1)
                                                {{"Música/Som/Ritmo/Propriedades do som"}}
                                            @elseif($avaliacao->modulo == 2)
                                                {{"Figuras"}}
                                            @elseif($avaliacao->modulo == 3)
                                                {{"Compasso; Barras de compasso; Fórmula de compasso; Compasso simples; Acentuação métrica dos compassos; Metrônomo;"}}
                                            @elseif($avaliacao->modulo == 4)
                                                {{"Pentagrama; Clave; Notas musicais; Escala; Linhas e espaços suplementares; Linha de oitava; Diapasão;"}}
                                            @elseif($avaliacao->modulo == 5)
                                                {{"Solfejo; Respiração"}}
                                            @elseif($avaliacao->modulo == 6)
                                                {{"Intervalos; Melodia; Harmonia; Sinais de alteração; Escala cromática; Fermata;"}}
                                            @elseif($avaliacao->modulo == 7)
                                                {{"Subdivisão dos tempos; subdivisão binária; Ponto de aumento; Ligatura; Síncopa – contratempo; Endecagrama;"}}
                                            @elseif($avaliacao->modulo == 8)
                                                {{"Frases – Motivo – Semifrase; Ritmos iniciais; Terminação das frases; Bi-subdivisão dos tempos;"}}
                                            @elseif($avaliacao->modulo == 9)
                                                {{"Escalas diatônicas maiores – com sustenidos; Escalas diatônicas maiores – com bemóis; Escalas diatônicas menores – relativa; Armadura de clave – acidente; Tonalidade – círculo das quintas;"}}
                                            @elseif($avaliacao->modulo == 10)
                                                {{"Subdivisão ternária dos tempos; Quiálteras – tercinas – hemíolas; Compasso composto; Fórmula de compasso – compostos;"}}
                                            @elseif($avaliacao->modulo == 11)
                                                {{"Andamento – dinâmica; Articulação"}}
                                            @else
                                                {{"Expressão; Compassos alternados"}}
                                            @endif
                                        </td>
                                        @if($avaliacao->nota < 7)
                                            <td style="text-align: right; color: red"><b>{!!number_format($avaliacao->nota , 1)!!}</b></td>
                                        @else
                                            <td style="text-align: right; color: black">{!!number_format($avaliacao->nota , 1)!!}</td>
                                        @endif
                                        
                                        @if(Auth::user()->status == 'enc_regional' || Auth::user()->status == 'enc_local' || Auth::user()->status == 'instrutor')
                                            <td>                                            
                                                <a href = "{{ url('/plano/' . $plano_id . '/aluno/' . $aluno->id . '/avaliacao/' . $avaliacao->id . '/edit') }}" title="Editar">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
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
@endsection