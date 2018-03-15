
<!DOCTYPE html>
<html>
<head>
@extends('layouts.adminlte')
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
 {!! csrf_field() !!}
@include('sidebar')
  <div class="content-wrapper">
  <div class="container-fluid spark-screen">
        <div class="row"><br>
            <div class="col-md-8 col-md-offset-2">

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Dashboard</b></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Perkecil">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Hilangkan">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    Selamat datang Admin. Kuy mulai gunakan Website Monitoring ini. :) <br>
                    Terima Kasih. :)
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </div>
  </div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.3
  </div>
  <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights
  reserved.
</footer>
</div>
</body>
</html>
