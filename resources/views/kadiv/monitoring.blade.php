<!DOCTYPE html>
<html>
<head>
  @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style type="text/css">
  .rapih {
    width: 1200px;
  }
</style>
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
           <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
             <thead>
                <tr role="row">
                  <th class="rapih" style="width: 2px;">No. </th>
                  <th class="rapih" style="width: 2px;">Tgl Mulai</th>
                  <th class="rapih" style="width: 2px;">Pemekerja&nbsp;</th>
                  <th class="rapih" style="width: 5px;">No. Spph</th>
                  <th class="rapih" style="width: 2px;">  Tgl. Spph</th>
                  <th class="rapih" style="width: 2px;">  Tgl. ETP</th>
                  <th class="rapih" style="width: 2px;">No. Pengumuman</th>
                  <th class="rapih" style="width: 2px;">Tgl. Pengumuman</th>
                  <th class="rapih" style="width: 2px;">No. Kontrak</th>
                  <th class="rapih" style="width: 2px;">Tgl. Kontrak</th>
                  <th class="rapih" style="width: 2px;">Proses</th>
                </tr>
              </thead>
              <tbody>        
              @foreach($allMonitor as $key)
              <?php
              $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
              ?>
              @if($pegawai != "")
                <tr role="row" class="odd">
                  <td class="rapih">{{$key->id}}</td>
                  <td class="rapih"><center><i class="fa fa-chevron-down"></i></center> <br>
                      {{$key->created_at}}
                  </td>
                  <td class="rapih">{{ $pegawai }}</td>
                  <td class="rapih">
                    @if ($key->no_spph == "")
                      <center>
                        <i class="fa fa-close"></i>
                      </center>
                    @else
                       <center>{{$key->no_spph}}</center>
                    @endif

                    @if($key->no_spph == "")
                    <i>Belum Selesai</i>
                    @else
                    <center>
                       <i class="fa fa-check"></i>
                      </center>
                    @endif
                  </td>
                  <td class="rapih">
                    @if($key->tgl_spph == "")
                    <center>
                        <i class="fa fa-close"></i>
                      </center>
                    @else
                      <center>{{$key->tgl_spph}}</center>
                    @endif

                    @if($key->tgl_spph == "")
                    <i>Belum Selesai</i>
                    @else
                      <div class="center">
                        <i class="fa fa-arrow-right"></i>
                       &nbsp;{{$key->selesaispph}}
                      </div>
                    @endif
                  </td>
                  <td class="rapih">
                    @if($key->tgl_etp == "") 
                    <center>
                        <i class="fa fa-close"></i>
                      </center>
                      @else
                      <center>{{$key->tgl_etp}}</center>
                      @endif

                     @if($key->tgl_etp == "")
                    <i>Belum Selesai</i>
                    @else
                    <div class="center">
                      <i class="fa fa-arrow-right"></i>
                       &nbsp;{{$key->selesaietp}}
                     </div>
                    @endif
                  </td>
                  <td class="rapih">
                    @if($key->no_pmn == "")
                    <center>
                        <i class="fa fa-close"></i>
                      </center>
                      @else
                      <center>{{$key->no_pmn}}</center>
                      @endif

                    @if($key->no_pmn == "")
                    <i>Belum Selesai</i>
                    @else
                    <center>
                       <i class="fa fa-check"></i>
                       </center>
                    @endif
                  </td>
                  <td class="rapih">
                    @if ($key->tgl_pmn == "") 
                    <center>
                    <i class="fa fa-close"></i>
                    </center>
                     @else 
                     <center>{{$key->tgl_pmn}}</center>
                     @endif

                    @if($key->tgl_pmn == "")
                    <i>Belum Selesai</i>
                    @else
                    <div class="center">
                        <i class="fa fa-arrow-right"></i>
                       &nbsp;{{$key->selesaipmn}}
                    </div>
                    @endif
                  </td>
                  <td class="rapih">
                    @if($key->no_kon == "") 
                    <center>
                    <i class="fa fa-close"></i>
                    </center>
                    @else
                    <center>{{$key->no_kon}}</center>
                    @endif

                    @if($key->no_kon == "")
                    <i>Belum Selesai</i>
                    @else
                       <center>
                         <i class="fa fa-check"></i>
                       </center>
                    @endif
                  </td>
                  <td class="rapih">
                    @if($key->tgl_kon == "")
                    <center>
                    <i class="fa fa-close"></i>
                    </center>
                    @else
                    <center>{{$key->tgl_kon}}</center>
                    @endif

                    @if($key->selesaikon == "")
                    <i>Belum Selesai</i>
                    @else
                      <div class="center">
                       <i class="fa fa-arrow-right"></i>
                       &nbsp;{{$key->selesaikon}}
                      </div>
                    @endif
                  </td>
                  <td><a href="{{route('viewAlldata', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Lihat</a>
                    @if($key->selesaikon == "")
                    <span class="label label-info">Dalam Proses</span>
                    @else
                    <span class="label label-success">Proses Selesai</span>
                    @endif
                  </td>
                </tr>
                @else
                <input type="hidden" name="">
                @endif
              @endforeach
              </tbody>
            </table></div></div></div>
          </div>
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
