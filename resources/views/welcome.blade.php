@extends('layouts.adminlte')
@include('sidebar')
<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
</head>
<link rel="stylesheet" href="{{asset('css/morris.css')}}">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<body>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard <i class="ion ion-ios-arrow-right"></i>
        @if(Auth::user() && Auth::user()->akses == 'Admin')
        <a href="{{url('admin')}}">Admin</a>
        @elseif(Auth::user() && Auth::user()->akses == 'Kasubag')
        <a href="{{url('receivePpbj')}}">Kasubag</a>
        @elseif(Auth::user() && Auth::user()->akses == 'Kadiv')
        <a href="{{url('monitoring')}}">Kadiv</a>
        @else
        <a href="{{url('userspeople')}}">User</a>
        @endif
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard <b><i>{{Auth::user()->akses}}</i></b> </li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{count(\App\pbbj::all())}}</h3>

              <p>Semua Ppbj </p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-book"></i>
            </div>
            @if(Auth::user() && Auth::user()->akses == 'Admin')
            <a href="{{url('allPpbj')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            @else
             <a href="#ppbj" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
             @endif
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ number_format($presentase, 2) }}<sup style="font-size: 25px;">%</sup> </h3>
              <p>Persentase Penyelesaian</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#pers" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count(\App\User::all())}}</h3>

              <p>Users Website</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            @if(Auth::user() && Auth::user()->akses == 'Admin')
            <a href="{{url('alluser')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            @else
             <a href="#users" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
             @endif
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>10</h3>

              <p>Ppbj Terselesaikan</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
            @if(Auth::user() && Auth::user()->akses == 'Kadiv')
            <a href="{{url('receivePpbj')}}" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            @else
            <a href="#finished" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
            @endif
          </div>
        </div>
      </div>
      <!-- data ppbj baru dan user baru -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ppbj Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="line-chart" style="height: 300px;"></div>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Ppbj Baru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                  <thead>
                    <tr>
                      <th>No. Ppbj</th>
                      <th>Jenis Pengadaan</th>
                      <th>Tgl RegistrasiUmum</th>
                      <th>Tgl Permintaan</th>
                      <th>Tgl Dibutuhkan</th>
                      <th>Proses</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getppbj as $ppbj)
                    <?php
                    $pegawai = \App\pegawai::where('id_pegawai', '=', $ppbj->id_pegawai)->value('namapegawai');
                    $penyelesaian = \App\prosespengadaan::where('id', '=', $ppbj->id)->value('selesaikon');

                    ?>
                    <tr>
                      <td>{{$ppbj->no_ppbj}}</td>
                      <td>{{$ppbj->id_pengadaan}}</td>
                      <td>{{$ppbj->tgl_regis_umum}}</td>
                      <td>{{$ppbj->tgl_permintaan_ppbj}}</td>
                      <td>{{$ppbj->tgl_dibutuhkan_ppbj}}</td>
                      <td>
                        @if($pegawai != "" && $penyelesaian != "")
                    <span class="label label-success">Proses Selesai</span>
                    @elseif($pegawai == "")
                    <span class="label label-danger">Belum ada Pemroses</span>
                    @elseif ($pegawai != "")
                    <span class="label label-info">Dalam Proses</span>
                    @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  {!!$getppbj->render()!!}
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Members</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img class="img-circle" src="/uploads/avatar/defaults.jpg" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">User
                      <span class="label label-warning pull-right">17-03-2018</span></a>
                      <span class="product-description">
                        User gan
                      </span>
                    </div>
                  </li>
                  <!-- /.item -->
                  <li class="item">
                    <div class="product-img">
                      <img class="img-circle" src="/uploads/avatar/defaults.jpg" alt="Product Image">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Kasubag
                        <span class="label label-success pull-right">18-03-2018</span></a>
                        <span class="product-description">
                          Kasubagg
                        </span>
                      </div>
                    </li>
                    <!-- /.item -->
                  </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
              </div>
            </div>
          </div>
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Bagian diDivisi Umum</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-4 col-sm-8">
                      <div class="pad">
                        <div class="small-box bg-light-blue">
                          <div class="inner">
                            <h3>Administrator</h3>

                            <p>Admin memiliki full akses terhadap website ini. Admin menambah data, lalu selanjutnya akan diteruskan</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-user-secret"></i>
                          </div>
                          @if(Auth::user() && Auth::user()->akses == 'Admin')
                          <a href="{{url('#admin')}}" class="small-box-footer">Anda adalah seorang 'Admin' <i class="fa fa-arrow-circle-right"></i></a>
                          @else
                          <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-8">
                      <div class="pad">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>Kadiv</h3>

                            <p>Kadiv memonitoring data yg diberikan kasubag kepada pegawai yang lainnya. Sehingga dapat terkontrol</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-user"></i>
                          </div>
                          @if(Auth::user() && Auth::user()->akses == 'Kadiv')
                          <a href="{{url('#kadiv')}}" class="small-box-footer">Anda adalah seorang 'Kepala Divisi' <i class="fa fa-arrow-circle-right"></i></a>
                          @else
                          <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-8">
                      <div class="pad">
                        <div class="small-box bg-orange">
                          <div class="inner">
                            <h3>Kasubag</h3>

                            <p>Kasubag memberi tugas kepada pegawai yang lainnya. Pegawai melapor ke Kasubag dan mengentry data, dan data tersebut</p>
                          </div>
                          <div class="icon">
                            <i class="fa fa-female"></i>
                          </div>
                          @if(Auth::user() && Auth::user()->akses == 'Kasubag')
                          <a href="{{url('#kasubag')}}" class="small-box-footer">Anda adalah seorang 'Kepala Sub Bagian' <i class="fa fa-arrow-circle-right"></i></a>
                          @else
                          <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                          @endif
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>

                <!-- /.box-body -->
              </div>
              <div class="col-md-12 col-sm-8">
                <div class="pad"><hr>
                  <div class="pull-right">
                    <b>Version</b> 1.0.3
                  </div>
                  <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights
                  reserved.
                </div>
              </div>
              <div class="row">

                <div class="col-md-12">
                </div>

              </div>

            </section>
          </div>
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
          <script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
          <script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
        </script>
        <script type="text/javascript" src="{{asset('js/charts/dashboard.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/charts/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/charts/raphael.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/charts/jquery.min.js')}}"></script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();
          } );
        </script>
        @foreach($getkontrak as $chartkontrak)
        <script>
          $(function () {
            "use strict";
    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
      {y: '2011 Q1', item1: {{$chartkontrak->id}}},
      {y: '2011 Q2', item1: 2778},
      {y: '2011 Q3', item1: 4912},
      {y: '2011 Q4', item1: 3767},
      {y: '2012 Q1', item1: 6810},
      {y: '2012 Q2', item1: 5670},
      {y: '2012 Q3', item1: 4820},
      {y: '2012 Q4', item1: 15073},
      {y: '2013 Q1', item1: 10687},
      {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 3'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    }); 
  });
</script>
@endforeach
</body>
</html>
