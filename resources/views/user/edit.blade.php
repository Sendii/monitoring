@include('sidebar')
<div class="content-wrapper">
	<div class="container-fluid spark-screen">
		<div class="col-xs-8"><br>
			<div class="box">
				<form method="POST" action=" {{url('edituser')}} ">
					<div class="box-header">
						<div class="box-body">
							<center><h4>Perubahan Hak Akses Untuk Login Website.</h4></center><br>
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
								<label class="col-sm-2 control-label">Hak Akses: </label>
								<div class="col-sm-6">
									<select name="hakakses" class="form-control">
										<option value="">{{$edituser->akses}}</option>
										<option value="Admin">Administrator</option>
										<option value="Kadiv">Kepala Divisi</option>
										<option value="Kasubag">Kepala Sub Bagian</option>
										<option value="User">User Biasa</option>
									</select>
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