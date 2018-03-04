@extends('layouts.adminlte')
@include('sidebar')

<form class="form-horizontal" method="POST" action=" {{route('savePegawai')}} " >
  @include('pegawai.forms')
</form>

	<script type="text/javascript">
		$(document).ready(function () {
			$('select').material_select();
		});
	</script>
