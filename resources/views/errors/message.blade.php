@if (Session::has('successaddPpbj'))

<div class="alert alert-info" role="alert">
	<strong>Berhasil. </strong> {{ Session::get('successaddPpbj') }}
</div>
@endif

@if (count($errors) > 0)
<div class="callout callout-danger">
	<h4>Errors:</h4>
	@foreach ($errors as $error)
		<li> {{$error}} </li>
	@endforeach
</div>
@endif
