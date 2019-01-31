@if ($message = Session::get('success'))
  <div class="alert alert-success">
    {{ $message }}
  </div>
@elseif ($message = Session::get('erro'))
	<div class="alert alert-danger">
    	{{ $message }}
 	</div>
@endif