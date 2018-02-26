<!DOCTYPE html>
<html>
<head>
   @include('layouts.adminlte')
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
   @include('sidebar')
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
      <div class="container-fluid spark-screen">
         <div class="row"><br>
           <div class="col-xs-12">
             <div class="box">
               <div class="box-header">
                  <center>
                    <h3 style="font-size: 25px" class="box-title">Data Ppbj</h3>
                 </center>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                 <table id="example1" class="table table-bordered table-striped">
                   <thead>
                      <tr>
                       <th style="width: 2px;">No. </th>
                       <th style="width: 2px;">Kode PJ</th>
                       <th style="width: 1px;">No. RegisUmum</th>
                       <th style="width: 5px;">Tgl. RegisUmum</th>
                       <th style="width: 2px;">No. Bppj</th>
                       <th style="width: 2px;">Tgl Permintaan</th>
                       <th style="width: 2px;">Tgl Dibutuhkan</th>
                       <th style="width: 2px;">Jenis Pengadaan</th>
                       <th style="width: 2px;">Unit Kerja</th>
                       <th style="width: 2px;">Nama Barang</th>
                       <th style="width: 2px;">Harga Barang</th>
                       <th style="width: 2px;">Jumlah Barang</th>
                       <th style="width: 2px;">Harga Total</th>
                       <th style="width: 2px;">Edit</th>
                    </tr>
                 </thead>
                 @foreach($ppbjall as $key)
                 <?php
                 $unitkerja = \App\unitkerja::where('id_unit', '=', $key->id_unit)->value('aa');
                 $Pengadaan = \App\pengadaan::where('id_pengadaan', '=', $key->id_pengadaan)->value('namapengadaan');
                 ?>
                 <tbody>
                   <tr>
<td class="sorting_1">{{$key->id}}</td>
                                 <td class="center">{{$key->kodePj}}</td>
                                 <td class="center">{{$key->no_regis_umum}}</td>
                                 <td class="center">
                                    @if($key->tgl_regis_umum == "")
                                    <i>Tanggal belum diInput</i>
                                    @else
                                    <div class="row">
                                       <div class="center">
                                          &nbsp; &nbsp; &nbsp; {{$key->tgl_regis_umum}}
                                       </div>
                                    </div>
                                    @endif
                                 </td>
                                 <td class="center">{{$key->no_ppbj}}</td>
                                 <td class="center">{{$key->tgl_permintaan_ppbj}}</td>
                                 <td class="center">{{$key->tgl_dibutuhkan_ppbj}}</td>
                                 <td class="center">{{ $Pengadaan }}</td>
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
                               <?php $total = 0; ?>
                               @foreach($key->Barang as $value)
                               <li>
                                 {{$value->total_brg }}
                                 <?php $total += $value->total_brg ?>
                              </li>
                              @endforeach
                           </ul><br>
                           Total: <i>{{ $total }}</i>
                        </td>
                        <td><a href="{{route('editPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah</a></td>
                        </tr>
   </tbody>
   @endforeach
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
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
<script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
   $('#example1').DataTable()
   $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
 })
})
</script>
</body>
</html>