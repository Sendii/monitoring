
<table>
	<thead>
		<tr>
			<td>No.</td>
			<td>Cabang</td>
			<td>Unit Kerja</td>
		</tr>
	</thead>
@foreach($UnitAll as $key)	
	<tbody>
		<tr>
			<td>{{$key->id_unit}}</td>
			<td>{{$key->aa}}</td>
			<td>{{$key->unit_kerja}}</td>
		</tr>
	</tbody>
@endforeach
</table>