@extends('layouts.adminlte')
@include('sidebar')

<form class="form-horizontal" method="POST" action="{{url('editpegawai')}}">
	<input type="hidden" name="idpegawai" value="{{$editpegawai->id_pegawai}}">
	@include('pegawai.formsedit')
</form>