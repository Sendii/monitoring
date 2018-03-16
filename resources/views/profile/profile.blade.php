@extends('layouts.adminlte')
@include('sidebar')
<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
	{!! csrf_field() !!}
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="container-fluid spark-screen"><br>
			<div class="col-md-10 col-md-offset-1">
				<!-- Horizontal Form -->
				<div class="box box-info">
					<div class="box box-info">
						<div class="box-tools pull-right">
							<div class="btn-group">
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
						 <h2>&nbsp;Profile </h2> 
						<div class="content" id="timeline">
							<!-- The timeline -->
							<div class="row">
								<div class="tab-pane" id="settings">
								<div class="col-md-4" id="settings">
									<div class="box box-primary">
										<div class="box-body box-profile">
											<img class="profile-user-img img-responsive img-circle" src="{{asset('/uploads/avatar/defaults.jpg')}}" alt="User profile picture">

											<h3 class="profile-username text-center">Nama: {{Auth::user()->name}}</h3>
											<p class="text-muted text-center">Akses: {{Auth::user()->akses}}</p>

											<ul class="list-group list-group-unbordered">
												<li class="list-group-item">
													<b>Followers</b> <a class="pull-right">1,322</a>
												</li>
												<li class="list-group-item">
													<b>Following</b> <a class="pull-right">543</a>
												</li>
												<li class="list-group-item">
													<b>Friends</b> <a class="pull-right">13,287</a>
												</li>
											</ul>

											<a href="#settings" data-toggle="tab" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
										</div>
										<!-- /.box-body -->
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Nama: </label>
									<div class="col-sm-8">
										<div class="input-group text">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input type="text" name="name" value="{{Auth::user()->name}}" class="form-control col s4" placeholder="Unit Kerja" required>
										</div>
									</div>
								</div><br>
								<div class="form-group">
									<label class="col-sm-2 control-label">E-Mail</label>
									<div class="col-sm-8">
										<div class="input-group text">
											<div class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</div>
											<input type="text" class="form-control" name="email" placeholder="Password" value="{{Auth::user()->email}}">
										</div>
									</div>
								</div><br>
								<div class="form-group">
									<label class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8">
										<div class="input-group text">
											<div class="input-group-addon">
												<i class="fa fa-envelope"></i>
											</div>
											<input type="text" class="form-control" name="password" placeholder="Password" value="{{bcrypt(Auth::user()->password)}}">
										</div><br>
									</div>
								</div>
								<div class="content">
									<div class="main-footer">
										<button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i>&nbsp;Tambahkan</button>
									</div>
								</div>
							</div>
							<!-- END TIMELINE -->
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}" ></script>
<script type="text/javascript">
	$('.select2').select2();
</script>
</body>
</html>