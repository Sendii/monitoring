<!DOCTYPE html>
<html>
<head>
 @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<body class="hold-transition skin-blue sidebar-mini">
  @include('sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid spark-screen">
     <div class="row"><br>
       <div class="col-xs-12">
         <div class="box">
           <div class="box-header">
            <center>
              <center><h2 style="font-size: 25px" class="box-title">Data Pegawai</h2></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
               <table id="example" class="table table-condensed table-hover">
                 <thead>
                  <tr>
                    <th>No. </th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>No. Telepon</th>
                    <th>Ubah Data</th>
                  </tr>
                </thead>
                <tbody>                
                  @foreach($allPegawai as $key)
                  <?php
                  $jabatan = \App\jabatan::where('id_jabatan', '=', $key->id_jabatan)->value('jabatan');
                  ?>
                  <tr>
                    <td class="center">{{$key->id_pegawai}}</td>
                    <td class="center">{{$key->namapegawai}}</td>
                    <td class="center">{{ $jabatan }}</td>
                    <td class="center">{{$key->notelp}}</td>  
                     <td><a href="{{route('editPegawai', [$key->id_pegawai])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah Data</a></td>                   
                  </tr>
                  @endforeach
                </tbody>
              </table></div></div></div>
            </div>
            {!!$allPegawai->render()!!}
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.3
        </div>
        <strong>Copyright &copy; 2018 <a href="#">PklTeam-</a>.</strong> All rights
        reserved.
      </footer>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
</div>
<script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</body>
</html>
