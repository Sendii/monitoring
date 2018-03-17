<!DOCTYPE html>
<html>
<head>
 @extends('layouts.adminlte')
</head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<body class="hold-transition skin-blue sidebar-mini">
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
          <div class="container">
            @include('errors.message')
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover" role="grid" aria-describedby="example1_info" data>
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
               <th style="width: 2px;">Ubah</th>
               <th style="width: 2px">Hapus</th>
             </tr>
           </thead>
           <tbody>
             @foreach($ppbjall as $key)
             <?php
             $unitkerja = \App\unitkerja::where('id_unit', '=', $key->id_unit)->value('aa');
             ?>
             <tr>
              <td class="center">{{$key->id}}</td>
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
            <td class="center">{{ $key->id_pengadaan }}</td>
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
   <td><button class="btn btn-danger delete-btn" data-noppbj='{{$key->no_ppbj}}'  data-id='{{$key->id}}' href="{{route('delete_ppbj', [$key->id])}}">Delete</td>
   </tr>
   @endforeach
 </tbody>
</table>
</div>
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
  <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights
  reserved.
</footer>
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
</div>
<script type="text/javascript">
  $('.delete-btn').on('click', function(e) {
    e.preventDefault();
    var self = $(this);
    var no = $(this).attr("data-noppbj");
    var formid = $(this).attr("data-id");
    swal({
      title : "Hapus",
      text : "Hapus data Ppbj dengan no Ppbj "+no+" ?",
      type : "warning",
      showCancelButton: true,
      confirmButtonColor: "#D9534f",
      confirmButtonText: "Yes, delete!",
      closeOnConfirm: true
    },
    function(){
      $("#"+formid).submit();
    });
  });
</script>
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
@include('sweet::alert')

</body>
</html>