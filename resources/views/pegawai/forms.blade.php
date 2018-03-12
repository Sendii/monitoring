<!DOCTYPE html>
<html>
<head>
</head>
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
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
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          <center><h2>Tambah Data Pegawai</h2> </center>
          <div class="box-header with-border">
          </div>
          <div class="box-body">
              <label>Nama Pegawai: </label>
              <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
              <input type="hidden" name="id_pegawai" value="{{$newPegawai->id_pegawai or ''}}">
              <input type="text" name="namapegawai" value="{{$newPegawai->namapegawai or ''}}" class="form-control col s6" placeholder="Nama Pegawai" required></label><br>
            </div>
            
            <label>Nomor Telepon: </label>
            <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
            <input type="text" name="nomortelepon" placeholder="Nomor Telepon" value="{{$newPegawai->notelp or ''}}" class="form-control col s6" required></label><br>
          </div>

            <label>Jabatan: </label>
            <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
            <select name="id_jabatan" class="form-control select2" style="width:100%;" required>
              <option value="">Pilih Jabatan</option>
              @foreach($jabatan as $key)
              <option value="{{$key->id_jabatan}}">
                {{$key->jabatan}}
              </option>
              @endforeach
            </select>
          </div>
            <div class="main-footer">
              <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Tambahkan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div><footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.3
  </div>
  <strong>Copyright &copy; 2018 <a href="#">PklTeam-</a>.</strong> All rights
  reserved.
</footer> 
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
</body>
</html>