@extends('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action="{{ url('updateassignmentPpbj/'.$ppbjassignmentEdit->id)}}">
	<input type="hidden" name="id" value="{{$ppbjassignmentEdit->id}}">	
@foreach($barangnya as $barang)
<input type="hidden" name="id_barang[]" value="{{ $barang->id_barang }}">
@endforeach
	@include('kasubag.formsedit')
</form>