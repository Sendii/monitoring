@extends('layouts.adminlte')
@include('sidebar')

<form class="form-horizontal" method="POST" action=" {{route('saveAsignment')}} " >
	<input type="hidden" name="id" value="{{$ppbjassignmentEdit->id}}">
  @include('kasubag.formsadd')
</form>