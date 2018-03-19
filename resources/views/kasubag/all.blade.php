<!DOCTYPE html>
<html>

<head>
    @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style type="text/css">
    .center {
        text-align: center;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">

    @include('sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <div class="table-responsive">
                <div class="box-header">
                    <center>
                        <h3>Data Ppbj</h3></center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="content">
                                    <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                                        <thead>
                                            <tr role="row">
                                                <th class="center">No. </th>
                                                <th class="center">Kode PJ</th>
                                                <th class="center">Nama Pemekerja</th>
                                                <th class="center">No. RegisUmum</th>
                                                <th class="center">Tgl. RegisUmum</th>
                                                <th class="center">No. Bppj</th>
                                                <th class="center">Tgl Permintaan</th>
                                                <th class="center">Tgl Dibutuhkan</th>
                                                <th class="center">Jenis Pengadaan</th>
                                                <th class="center">Unit Kerja</th>
                                                <th class="center">Nama Barang</th>
                                                <th class="center">Harga Barang</th>
                                                <th class="center">Jumlah Barang</th>
                                                <th class="center">Harga Total</th>
                                                <th class="center">Penugasan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($receiveallPpbj as $key)
                                            <tr role="row" class="odd">
                                                <?php
                    $unitkerja = \App\unitkerja::where('id_unit', '=', $key->id_unit)->value('aa');
                    $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
                    $cekproses = \App\prosespengadaan::where('id_ppbj', '=', $key->id)->value('selesaikon');
                    ?>
                                                    <td class="sorting_1">{{$key->id}}</td>
                                                    <!-- {{ $loop->iteration }} -->
                                                    <td class="center">{{$key->kodePj}}</td>
                                                    <td class="center">
                                                        @if($pegawai == "")
                                                        <i><b>
                        Belum ada Pelaksana
                      </b></i> @else
                                                        <div class="row">
                                                            <div class="center"> <i>
                        {{$pegawai}}</i>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td class="center">{{$key->no_regis_umum}}</td>
                                                    <td class="center">{{$key->tgl_regis_umum}}</td>
                                                    <td class="center">{{$key->no_ppbj}}</td>
                                                    <td class="center">{{$key->tgl_permintaan_ppbj}}</td>
                                                    <td class="center">{{$key->tgl_dibutuhkan_ppbj}}</td>
                                                    <td class="center">{{$key->id_pengadaan}}</td>
                                                    <td class="center">{{ $unitkerja }}</td>
                                                    <td class="center">
                                                        <ul>
                                                            @foreach($key->Barang as $value)
                                                            <li>
                                                                {{$value->nama_barang}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="center">
                                                        <ul>
                                                            @foreach($key->Barang as $value)
                                                            <li>
                                                                {{$value->harga_brg}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="center">
                                                        <ul>
                                                            @foreach($key->Barang as $value)
                                                            <li>
                                                                {{$value->jumlah_brg}}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td class="center">
                                                        <ul>
                                                            <?php 
                $total = 0; 
              ?>
                                                                @foreach($key->Barang as $value)
                                                                <li>
                                                                    {{$value->total_brg }}
                                                                    <?php 
                $total += $value->total_brg 
               ?>
                                                                </li>
                                                                @endforeach Total = <i>{{ $total }}</i>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <a class="btn waves-effect waves-light yellow darken-2" href="{{ url('editassignmentPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i>Penugasan</a> @if($pegawai != "" && $cekproses != "")
                                                        <center><span class="label label-success">Proses Selesai&nbsp;<i class="fa fa-check"></i></span></center>
                                                        @elseif($pegawai == "")
                                                        <center><span class="label label-danger">Belum ada Pemroses&nbsp;<i class="fa fa-close"></i></span></center>
                                                        @elseif ($pegawai != "")
                                                        <center><span class="label label-info">Dalam Proses&nbsp;<i class="fa fa-refresh"></i></span></center>
                                                        @endif
                                                    </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!!$receiveallPpbj->render()!!}
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.3
        </div>
        <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights reserved.
    </footer>
    </div>
    </div>
    <script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>