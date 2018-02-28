@include('sidebar')
<div class="content-wrapper">
	<div class="container-fluid spark-screen">
		<div class="col-xs-8"><br>
			<div class="box">
				<form method="POST" action=" {{url('edituser')}} ">
					<div class="box-header">
						<div class="box-body">
							{{ csrf_field() }}
							<input type="hidden" name="id" value="{{$edituser->id}}">
							<input type="hidden" name="password" value=" {{$edituser->password}} ">
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama" value="{{$edituser->name}}" placeholder="Nama" readonly>
								</div><br><br>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">E-Mail</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="email" value="{{$edituser->email}}" placeholder="E-Mail" readonly>
								</div><br><br>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Hak Akses</label>
								<div class="col-sm-6">
									<select class="form-control" name="hakakses">
										@foreach($user as $users)
										<option value="{{$users->akses}}">{{$users->akses}}</option>
										@endforeach
									</select>
									<!-- <input type="text" class="form-control" name="hakakses" value="{{$edituser->akses}}" placeholder="Hak Akses"> -->
								</div>
							</div><br>
							<div>
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;	Submit</i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>