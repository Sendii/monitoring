@extends('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action=" {{route('updatePpbj')}} " >
<input type="hidden" name="id" value="{{$id}}">
@foreach($barangnya as $barang)
<input type="hidden" name="id_barang[]" value="{{ $barang->id_barang }}">
@endforeach
	@include('kadiv.formsSeeall')
</form>

	<script type="text/javascript">
		$(document).ready(function () {
			$('select').material_select();
		});
	</script>