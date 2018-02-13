
<!DOCTYPE html>
<html>
<head>
@include('layouts.adminlte')
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
@include('sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container-fluid spark-screen">
        <div class="box">
            <div class="box-header">
              <center><h3>Data Ppbj</h3></center>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="Search..." aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 2px;">No. </th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2px;">Nama Pegawai</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2px;">Jabatan</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">No. Telepon</th>
                    
                  </tr>
                </thead>
			@foreach($allPegawai as $key)
      <?php
      $jabatan = \App\jabatan::where('id_jabatan', '=', $key->id_jabatan)->value('jabatan');
      ?>
                <tbody>                
                <tr role="row" class="odd">
                    <td class="sorting_1">{{$key->id_pegawai}}</td>
                    <td class="center">{{$key->namapegawai}}</td>
                    <td class="center">{{ $jabatan }}</td>
      			        <td class="center">{{$key->notelp}}</td>                     
                </tr>
                </tbody>
                @endforeach
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
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
</div>
</body>
</html>
