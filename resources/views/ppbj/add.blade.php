@extends('layouts.adminlte')
@include('sidebar')

<form class="form-horizontal" method="POST" action=" {{url('savePpbj')}} " >
  @include('ppbj.forms')
</form>