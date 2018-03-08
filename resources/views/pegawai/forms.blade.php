<!DOCTYPE html>
<html>
<head>
</head>
<style type="text/css">
</style>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
  {!! csrf_field() !!}
  <!-- Content Wrapper. Contains page content -->
  <div class="row">
    <div class="content-wrapper">
      <div class="row"><br>
        <div class="content">
          <div class="input-field col s8">
            <div class="box box-info">
             <div class="box-header with-border">
               <div class="content">
                 <div class="input-field col s12">
                   <label>Nama Pegawai: </label>
                   <input type="text" name="namapegawai" value=" {{$newPegawai->namapegawai or ''}} " class="form-control col s6" placeholder="Unit Kerja"></label><br>
                   <label>Nomor Telepon: </label>
                   <input type="text" name="nomortelepon" placeholder="Unit Kerja" value=" {{$newPegawai->notelp or ''}} " class="form-control col s6" ></label><br>


                    <label>Jabatan: </label>
                   <select name="id_jabatan" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true">
                    <option value="">Pilih Jabatan</option>
                    @foreach($jabatan as $key)
                    <option value="{{$key->id_jabatan}}">
                      {{$key->jabatan}}
                    </option>
                    @endforeach
                  </select>
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
</body>
</html>