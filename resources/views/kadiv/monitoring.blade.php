<!DOCTYPE html>
<html>

<head>
    @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style type="text/css">
    .center {
        text-align: center;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini" background="github.png">
    @include('sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h3>Data Ppbj</h3></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                            <thead>
                                <tr role="row">
                                    <th class="center" style="width: 2px;">No. </th>
                                    <th class="center" style="width: 2px;">Tanggal Mulai</th>
                                    <th class="center" style="width: 2px;">Pemekerja&nbsp;</th>
                                    <th class="center" style="width: 5px;">Nomor Spph</th>
                                    <th class="center" style="width: 2px;">Tanggal Spph</th>
                                    <th class="center" style="width: 2px;">Tanggal ETP</th>
                                    <th class="center" style="width: 2px;">Nomor Pengumuman</th>
                                    <th class="center" style="width: 2px;">Tanggal Pengumuman</th>
                                    <th class="center" style="width: 2px;">Nomor Kontrak</th>
                                    <th class="center" style="width: 2px;">Tanggal Kontrak</th>
                                    <th class="center" style="width: 2px;">Proses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allMonitor as $key)
                                <?php
              $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
              ?>
                                    @if($pegawai != "")
                                    <tr role="row" class="odd">
                                        <td class="center">{{$key->id}}</td>
                                        <td class="center">
                                            <center><i class="fa fa-chevron-down"></i></center>
                                            {{$key->created_at}}
                                        </td>
                                        <td class="center">{{ $pegawai }}
                                            <i>Selesai</i>&nbsp; <i class="fa fa-chevron-right"></i>
                                        </td>
                                        <td class="center">
                                            @if ($key->no_spph == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->no_spph}}</center>
                                            @endif @if($key->no_spph == "")
                                            <i>Belum Selesai</i> @else
                                            <center>
                                                <i class="fa fa-check"></i>
                                            </center>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($key->tgl_spph == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->tgl_spph}}</center>
                                            @endif @if($key->tgl_spph == "")
                                            <i>Belum Selesai</i> @else
                                            <div class="center">
                                                <i class="fa fa-arrow-right"></i> &nbsp;{{$key->selesaispph}}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($key->tgl_etp == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->tgl_etp}}</center>
                                            @endif @if($key->tgl_etp == "")
                                            <i>Belum Selesai</i> @else
                                            <div class="center">
                                                <i class="fa fa-arrow-right"></i> &nbsp;{{$key->selesaietp}}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($key->no_pmn == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->no_pmn}}</center>
                                            @endif @if($key->no_pmn == "")
                                            <i>Belum Selesai</i> @else
                                            <center>
                                                <i class="fa fa-check"></i>
                                            </center>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if ($key->tgl_pmn == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->tgl_pmn}}</center>
                                            @endif @if($key->tgl_pmn == "")
                                            <i>Belum Selesai</i> @else
                                            <div class="center">
                                                <i class="fa fa-arrow-right"></i> &nbsp;{{$key->selesaipmn}}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($key->no_kon == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->no_kon}}</center>
                                            @endif @if($key->no_kon == "")
                                            <i>Belum Selesai</i> @else
                                            <center>
                                                <i class="fa fa-check"></i>
                                            </center>
                                            @endif
                                        </td>
                                        <td class="center">
                                            @if($key->tgl_kon == "")
                                            <center>
                                                <i class="fa fa-close"></i>
                                            </center>
                                            @else
                                            <center>{{$key->tgl_kon}}</center>
                                            @endif @if($key->selesaikon == "")
                                            <i>Belum Selesai</i> @else
                                            <div class="center">
                                                <i class="fa fa-arrow-right"></i> &nbsp;{{$key->selesaikon}}
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('viewAlldata', [$key->id])}}">
                                                <center><i class="fa fa-edit" aria-hidden="true"> </i>Lihat</center>
                                            </a>
                                            @if($key->selesaikon == "")
                                            <center><span class="label label-info">Dalam Proses&nbsp;<i class="fa fa-refresh"></i></span></center>
                                            @else
                                            <center><span class="label label-success">Proses Selesai&nbsp;<i class="fa fa-check"></i></span></center>
                                            @endif
                                        </td>
                                    </tr>
                                    @else @endif @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    </div>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.3
        </div>
        <strong>Copyright &copy; 2018 <a href="#">PklTeam-</a>.</strong> All rights reserved.
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
        });
    </script>
</body>

</html>