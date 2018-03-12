<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@include('sidebar')
<div class="content-wrapper">
	<div class="container-fluid spark-screen"><br>
		<div class="col-md-10 col-md-offset-1">
			<!-- Horizontal Form -->
			<div class="box box-info">
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<div class="btn-group">
					</div>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				</div><br>
				<center><h4>Perubahan Hak Akses Untuk Login Website.</h4></center><br>
				<div class="box-body">
					
					<form method="POST" action=" {{url('edituser')}} ">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$edituser->id}}">
						<input type="hidden" name="password" value=" {{$edituser->password}} ">
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-9">
								<div class="input-group text">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" class="form-control" name="nama" value="{{$edituser->name}}" placeholder="Nama" readonly>
								</div>
							</div><br><br>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">E-Mail</label>
							<div class="col-sm-9">
								<div class="input-group text">
									<div class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</div>
									<input type="text" class="form-control" name="email" value="{{$edituser->email}}" placeholder="E-Mail" readonly>
								</div><br>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Hak Akses: </label>
								<div class="col-sm-9">
									<div class="input-group text">
										<div class="input-group-addon">
											<i class="fa fa-linux"></i>
										</div>
										<select name="hakakses" class="form-control select2">
											<option value="">{{$edituser->akses}}</option>
											<option value="Admin">Administrator</option>
											<option value="Kadiv">Kepala Divisi</option>
											<option value="Kasubag">Kepala Sub Bagian</option>
											<option value="User">User Biasa</option>
										</select><br>
									</div>
								</div>
							</div><br><br>
							<div>
								<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-users">&nbsp;	Submit</i></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}" ></script>
<script type="text/javascript">
	$('.select2').select2();
</script>