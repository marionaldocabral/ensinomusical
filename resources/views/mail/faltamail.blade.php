<h2>Aviso</h2>
<p>Informo a V.Sª que no dia {{$data}}, o aluno <b>{{$destinatario}}</b> não compareceu a aula de Teoria Musical.</p>
<p>Atenciosamente,</p>
<p>{{$remetente->name}}<br>
    @if($remetente->status == "iniciante")
        {{"Iniciante"}}
    @elseif($remetente->status == "ensaio")
        {{"Ensaio"}}
    @elseif($remetente->status == "rjm")
        {{"Reunião de Jovens e Menores"}}
    @elseif($remetente->status == "oficial")
        {{"Culto Oficial"}}
    @elseif($remetente->status == "oficializado")
        {{"Oficializado"}}
    @elseif($remetente->status == "auxiliar")
        {{"Auxiliar"}}
    @elseif($remetente->status == "instrutor")
        {{"Instrutor"}}
    @elseif($remetente->status == "enc_local")
        {{"Encarregado Local"}}
    @elseif($remetente->status == "enc_regional")
        {{"Encarregado Regional"}}
    @endif
</p>
