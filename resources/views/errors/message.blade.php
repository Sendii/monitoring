@if (Session::has('successaddPpbj'))

	<div class="alert alert-info" role="alert">
		<strong>Berhasil. </strong> {{ Session::get('successaddPpbj') }}
	</div>
@endif

@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
			@foreach ($errors as $error)
				<li> {{$error}} </li>
			@endforeach
		</ul>		
	</div>
@endif
