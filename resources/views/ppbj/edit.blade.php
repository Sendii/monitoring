@extends('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action=" {{route('updatePpbj')}} " >
<input type="hidden" name="id" value="{{$id}}">
@foreach($barangnya as $barang)
<input type="hidden" name="id_barang[]" value="{{ $barang->id_barang }}">
@endforeach
	@include('ppbj.formsedit')
</form>