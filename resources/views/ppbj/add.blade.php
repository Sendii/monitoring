@extends('layouts.adminlte')
@include('sidebar')

<form class="form-horizontal" method="POST" action=" {{route('savePpbj')}} " >
  @include('ppbj.forms')
</form>

	<script type="text/javascript">
		$(document).ready(function () {
			$('select').material_select();
		});
	</script>
