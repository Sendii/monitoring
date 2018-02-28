
<!DOCTYPE html>
<html>
<head>
  @include('layouts.adminlte')
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5a93574dd7591465c70800fb/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
  @include('sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <div class="container-fluid spark-screen">
      <div class="box">
        <div class="box-header">
          <center><h2>Data Ppbj</h2></center>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div></div><div class="row"><div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" data-role="datatable">
              <thead>
                <tr role="row">
                  <th>No. </th>
                  <th>Nama Pegawai</th>
                  <th>Jabatan</th>
                  <th>No. Telepon</th>
                  
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
<script src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
