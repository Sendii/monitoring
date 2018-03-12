<!DOCTYPE html>
<html>
<head>
  @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
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
          <div class="table-responsive">
           <table id="example" class="table table-condensed table-hover">
             <thead>
                <tr role="row">
                  <th style="width: 2px;">No. </th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2px;">Tgl Mulai</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">Pemekerja&nbsp;</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">Tgl. Spph</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 5px;">No. Spph</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">  Tgl. Etp</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl. Pengumuman</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">No. Pengumuman</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl. Kontrak</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">No. Kontrak</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Lihat Selengkapnya</th>
                </tr>
              </thead>
              <tbody>        
              @foreach($allMonitor as $key)
              <?php
              $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
              ?>
                <tr role="row" class="odd">
                  <td class="sorting_1">{{$key->id_prosespengadaan}}</td>
                  <td class="center"> <br>
                      {{$key->created_at}}
                  </td>
                  <td class="center">{{ $pegawai }}</td>
                  <td class="center">{{$key->tgl_spph}}
                    @if($key->tgl_spph == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                    <div class="row">
                      <div class="center">
                       &nbsp;&nbsp;  Terselesaikan
                      </div>
                    </div>
                    @endif
                  </td>
                  <td class="center">{{$key->no_spph}}
                    @if($key->no_spph == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                      <br><li>
                       &nbsp;&nbsp;  {{$key->selesaispph}}
                      </li>
                    @endif
                  </td>
                  <td class="center">{{$key->tgl_etp}}
                     @if($key->tgl_etp == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                      <br><li>
                       &nbsp;&nbsp;  {{$key->selesaietp}}
                      </li>
                    @endif
                  </td>
                  <td class="center">{{$key->tgl_pmn}}
                    @if($key->tgl_pmn == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                    <div class="row">
                      <div class="center">
                       &nbsp;&nbsp;  Terselesaikan
                      </div>
                    </div>
                    @endif
                  </td>
                  <td class="center">{{$key->no_pmn}}
                    @if($key->no_pmn == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                      <br><li>
                       &nbsp;&nbsp;  {{$key->selesaipmn}}
                      </li>
                    @endif
                  </td>
                  <td class="center">{{$key->tgl_kon}}
                    @if($key->tgl_kon == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                    <div class="row">
                      <div class="center">
                       &nbsp;&nbsp;  Terselesaikan
                      </div>
                    </div>
                    @endif
                  </td>
                  <td class="center">{{$key->no_kon}}
                    @if($key->no_kon == "Belum Terselesaikan")
                    <i>Belum Selesai</i>
                    @else
                      <br><li>
                       &nbsp;&nbsp;  {{$key->selesaikon}}
                      </li>
                    @endif
                  </td>
                  <td><a href="{{route('viewAlldata', [$key->id_prosespengadaan])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Lihat</a></td>
                </tr>
              @endforeach
              </tbody>
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
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</body>
</html>
