@include('layouts.adminlte')
@include('sidebar')
<form class="form-horizontal" method="POST" action=" {{route('updateassignmentPpbj')}} " >
	@include('kasubag.formsedit')
</form>

<script type="text/javascript">
	$(document).ready(function () {
		$('select').material_select();
	});
</script>