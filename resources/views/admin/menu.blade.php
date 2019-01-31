<li><a href="{{ url('/home') }}">Home</a></li>

@if(Auth::user()->adm == true)
	<li><a href="{{ url('/plano') }}">Planos</a></li>
    <li><a style="color: red" href="{{ url('/paise') }}">País</a></li>
    <li><a style="color: red" href="{{ url('/estado') }}">Estado</a></li>
    <li><a style="color: red" href="{{ url('/cidade') }}">Cidade</a></li>
    <li><a style="color: red" href="{{ url('/localidade') }}">Local</a></li>
    <li><a style="color: red" href="{{ url('/plano_') }}">Plano</a></li>
    <li><a style="color: red" href="{{ url('/user') }}">Usuário</a></li>
    <li><a style="color: red" href="{{ url('/feriado') }}">Feriado</a></li>
    <li><a style="color: red" href="{{ url('/instrumento') }}">Instrumento</a></li>
@elseif(Auth::user()->status == 'iniciante' || Auth::user()->status == 'ensaio' || Auth::user()->status == 'rjm' || Auth::user()->status == 'oficial' || Auth::user()->status == 'oficializado')
	<li><a href="{{ url('plano/' . Auth::user()->plano_id . '/aluno/' . Auth::user()->id) }}">Perfil</a></li>
	<li><a href="{{ url('plano/' . Auth::user()->plano_id . '/aula') }}">Ementa</a></li>
	<li><a href="{{ url('plano/' . Auth::user()->plano_id . '/aluno') }}">Colegas</a></li>
@else
	<li><a href="{{ url('/plano') }}">Planos</a></li>
@endif