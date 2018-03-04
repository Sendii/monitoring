
<!DOCTYPE html>
<html>
<head>
  @extends('layouts.adminlte')
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
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2px;">Tgl Mulai</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">Pemekerja&nbsp;</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">Tgl. Spph</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 5px;">No. Spph</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">  Tgl. Etp</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl. Pengumuman</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">No. Pengumuman</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl. Kontrak</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">No. Kontrak</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Edit</th>
                </tr>
              </thead>
              @foreach($allMonitor as $key)

              <?php
              $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
              ?>
              <tbody>                
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$key->id_prosespengadaan}}</td>
                  <td class="center">{{$key->kodePj}}</td>
                  <td class="center">{{ $pegawai }}</td>
                  <td class="center">{{$key->tgl_spph}}</td>
                  <td class="center">{{$key->no_spph}}</td>
                  <td class="center">{{$key->tgl_etp}}</td>
                  <td class="center">{{$key->tgl_pmn}}</td>
                  <td class="center">{{$key->no_pmn}}</td>
                  <td class="center">{{$key->tgl_kon}}</td>
                  <td class="center">{{$key->no_kon}}</td>
                  <td><a href="{{route('editPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah</a></td>
                </tr>
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$key->id_prosespengadaan}}</td>
                  <td class="center">{{$key->kodePj}}</td>
                  <td class="center">{{ $pegawai }}</td>
                  <td class="center">{{$key->tgl_spph}}</td>
                  <td class="center">{{$key->no_spph}}</td>
                  <td class="center">{{$key->tgl_etp}}</td>
                  <td class="center">{{$key->tgl_pmn}}</td>
                  <td class="center">{{$key->no_pmn}}</td>
                  <td class="center">{{$key->tgl_kon}}</td>
                  <td class="center">{{$key->no_kon}}</td>
                  <td><a href="{{route('editPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah</a></td>
                </tr>
              </tbody>
              @endforeach
            </table></div></div></div>
          </div>
          {!!$allMonitor->render()!!}
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
