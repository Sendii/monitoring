@extends('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action="{{url('editUnit')}}">
	<input type="hidden" name="id_unit" value="{{$editunit->id_unit}}">
	@include('Unit.formsedit')
</form>