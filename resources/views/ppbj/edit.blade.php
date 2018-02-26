@include('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action=" {{route('updatePpbj')}} " >
	<input type="hidden" name="id" value="{{$editbarang->id}}">
	<input type="hidden" name="id_barang" value="{{$editbarang->id}}">
	@include('ppbj.formsedit')
</form>

	<script type="text/javascript">
		$(document).ready(function () {
			$('select').material_select();
		});
	</script>