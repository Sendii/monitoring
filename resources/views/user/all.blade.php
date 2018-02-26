@include('sidebar')
<div class="content-wrapper">
	<div class="container-fluid spark-screen">
		<div class="col-xs-12"><br>
			<div class="box">
				<div class="box-header">
					<div class="box-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Email</th>
									<th>Akses</th>
									<th>Ubah Akses</th>
								</tr>
							</thead>

							@foreach($user as $key)
							<tbody>
								<tr>
									<td>{{$key->id}}</td>
									<td>{{$key->name}}</td>
									<td>{{$key->email}}</td>
									<td class="center">
										@if($key->akses == "Kasubag")
										<i>Kasubag</i>
										@elseif($key->akses == "Admin")
										<i>Admin</i>
										@elseif($key->akses=="Kadiv")
										<i>Kepala Divisi</i>
										@else
										<div class="row">
											<div class="center">
												<i>&nbsp; &nbsp; User Biasa</i>
											</div>
										</div>
										@endif
									</td>
									<td>
										<a href="{{url('edituser', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah Aksess</a>
									</td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>
		{!!$user->render()!!}
				</div>
			</div>
		</div>	
	</div>
</div>