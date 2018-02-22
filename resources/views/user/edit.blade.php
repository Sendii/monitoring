@include('sidebar')
<div class="content-wrapper">
	<div class="container-fluid spark-screen">
		<div class="col-xs-8"><br>
			<div class="box">
				<form method="POST" action=" {{url('edituser')}} ">
					<div class="box-header">
						<div class="box-body">
							<input type="hidden" name="id" value="{{$edituser->id}}">
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="nama" value="{{$edituser->name}}" placeholder="Nama">
								</div><br>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">E-Mail</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="email" value="{{$edituser->email}}" placeholder="E-Mail">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Hak Akses</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" name="hakakes" value="{{$edituser->roleid}}" placeholder="Hak Akses">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>