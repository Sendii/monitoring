
<!DOCTYPE html>
<html>
<head>
  @extends('layouts.adminlte')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  @include('sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid spark-screen">
      <div class="table-responsive">
        <div class="box-header">
          <center><h3>Data Ppbj</h3></center>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length"></div></div><div class="col-sm-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="Search..." aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12">
            <div class="">
              <table id="example1" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
                <thead>
                  <tr role="row">
                    <th>No. </th>
                    <th>Kode PJ</th>
                    <th>Nama Pemekerja</th>
                    <th>No. RegisUmum</th>
                    <th>Tgl. RegisUmum</th>
                    <th>No. Bppj</th>
                    <th>Tgl Permintaan</th>
                    <th>Tgl Dibutuhkan</th>
                    <th>Jenis Pengadaan</th>
                    <th>Unit Kerja</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Total</th>
                    <th>Penugasan</th>
                  </tr>
                </thead>
                @foreach($receiveallPpbj as $key)
                <tbody>                
                  <tr role="row" class="odd">
                    <?php
                    $unitkerja = \App\unitkerja::where('id_unit', '=', $key->id_unit)->value('aa');
                    $pegawai = \App\pegawai::where('id_pegawai', '=', $key->id_pegawai)->value('namapegawai');
                    $jenis_pengadaan = \App\pengadaan::where('id_pengadaan', '=', $key->id_pengadaan)->value('namapengadaan');
                    ?>                  
                    <td class="sorting_1">{{$key->id}}</td>
                    <!-- {{ $loop->iteration }} -->
                    <td class="center">{{$key->kodePj}}</td>
                    
                    <td class="center">
                      @if($pegawai == "")
                      <i><b>
                        Belum ada Pelaksana
                      </b></i>
                      @else
                      <div class="row">
                        <div class="center"> <i>
                        &nbsp; &nbsp; &nbsp; {{$pegawai}}</i>
                      </div>
                    </div>
                    @endif  
                  </td>
                  <td class="center">{{$key->no_regis_umum}}</td>
                  <td class="center">{{$key->tgl_regis_umum}}</td>
                  <td class="center">{{$key->no_ppbj}}</td>
                  <td class="center">{{$key->tgl_permintaan_ppbj}}</td>
                  <td class="center">{{$key->tgl_dibutuhkan_ppbj}}</td>
                  <td class="center">{{$jenis_pengadaan}}</td>
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
             <td class="center"><ul>
              <?php $total = 0; ?>
              @foreach($key->Barang as $value)
              <li>
               {{$value->total_brg }}
               <?php $total += $value->total_brg ?>
             </li>
             @endforeach
             Total = <i>{{ $total }}</i>
           </ul></td>
           <td><a class="btn waves-effect waves-light yellow darken-2" href="{{route('editassignmentPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Penugasan</a></td>
         </tr>
       </tbody>
       @endforeach
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
  <strong>Copyright &copy; 2018 <a href="#">-</a>.</strong> All rights
  reserved.
</footer>
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
</div>
</body>
</html>
