@extends('layouts.adminlte')
@include('sidebar')
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <div class="content-wrapper">
        <section class="content-header">
          <h1>
            Dashboard > 
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
                  <h3>9</h3>

                  <p>Ppbj Baru </p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              <a href="#ppbj" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
      </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>57<sup style="font-size: 25px;">%</sup> </h3>

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
          <h3>15</h3>

          <p>Users Website</p>
      </div>
      <div class="icon">
          <i class="ion ion-person-add"></i>
      </div>
      <a href="#users" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-red">
    <div class="inner">
      <h3>10</h3>

      <p>Pengunjung Website</p>
  </div>
  <div class="icon">
      <i class="ion ion-bag"></i>
  </div>
  <a href="#visitor" class="small-box-footer">Informasi Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
</div>
<!-- data ppbj baru dan user baru -->
<div class="row">
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
            <table class="table no-margin">
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
                ?>
                <tr>
                    <td>{{$ppbj->no_ppbj}}</td>
                    <td>{{$ppbj->id_pengadaan}}</td>
                    <td>{{$ppbj->tgl_regis_umum}}</td>
                    <td>{{$ppbj->tgl_permintaan_ppbj}}</td>
                    <td>{{$ppbj->tgl_dibutuhkan_ppbj}}</td>
                    <td>
                        @if($pegawai != "")
                        <span class="label label-info">Proses</span>
                        @else
                        <span class="label label-danger">Belum Terproses</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
  <a href="javascript:void(0)" class="btn btn-sm btn-success btn-flat pull-right">View All Ppbj</a>
</div>
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
        <img src="dist/img/default-50x50.gif" alt="Product Image">
    </div>
    <div class="product-info">
        <a href="javascript:void(0)" class="product-title">{{Auth::user()->name}}
          <span class="label label-warning pull-right">{{Auth::user()->created_at}}</span></a>
          <span class="product-description">
              Samsung 32" 1080p 60Hz LED Smart HDTV.
          </span>
      </div>
  </li>
  <!-- /.item -->
  <li class="item">
      <div class="product-img">
        <img src="dist/img/default-50x50.gif" alt="Product Image">
    </div>
    <div class="product-info">
        <a href="javascript:void(0)" class="product-title">PlayStation 4
          <span class="label label-success pull-right">$399</span></a>
          <span class="product-description">
              PlayStation 4 500GB Console (PS4)
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
            <div class="small-box bg-aqua">
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
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Kasubag</h3>

                  <p>Kasubag memberi tugas kepada pegawai yang lainnya. Pegawai melapor ke Kasubag dan mengentry data, dan data tersebut dapat diterima oleh Kadiv.</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              @if(Auth::user() && Auth::user()->akses == 'Kasubag')
              <a href="{{url('#kasubag')}}" class="small-box-footer">Anda adalah seorang 'Kepala Sub Bagian' <i class="fa fa-arrow-circle-right"></i></a>
              @else
              <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
              @endif
          </div>
      </div>
  </div>
   <div class="col-md-4 col-sm-8">
          <div class="pad">
            <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Kadiv</h3>

                  <p>Kadiv memonitoring data yg diberikan kasubag kepada pegawai yang lainnya. Sehingga dapat terkontrol</p>
              </div>
              <div class="icon">
                  <i class="ion ion-bag"></i>
              </div>
              @if(Auth::user() && Auth::user()->akses == 'Kadiv')
              <a href="{{url('#kadiv')}}" class="small-box-footer">Anda adalah seorang 'Kepala Divisi' <i class="fa fa-arrow-circle-right"></i></a>
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
<div class="row">
    <div class="col-md-12">
        
    </div>
</div>
</section>
</div>
</body>
</html>
