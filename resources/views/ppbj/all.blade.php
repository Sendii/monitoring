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
            <div class="box">
               <center>
                  <div class="container" style="height: 0 auto;">
                     @include('errors.message')
                  </div>
               </center>
               <div class="box-header">
                  <center>
                     <h3>Data Ppbj</h3>
                  </center>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="dataTables_length" id="example1_length"></div>
                        </div>
                        <div class="col-sm-6">
                           <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="Search..." aria-controls="example1"></label></div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 2px;">No. </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 2px;">Kode PJ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">No. RegisUmum</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 5px;">Tgl. RegisUmum</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">No. Bppj</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl Permintaan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Tgl Dibutuhkan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Jenis Pengadaan</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 2px;">Unit Kerja</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Nama Barang</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Harga Barang</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Jumlah Barang</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Harga Total</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 2px;">Edit</th>
                                 </tr>
                              </thead>
                              @foreach($ppbjall as $key)
                              <?php
                                 $unitkerja = \App\unitkerja::where('id_unit', '=', $key->id_unit)->value('aa');
                                 $Pengadaan = \App\pengadaan::where('id_pengadaan', '=', $key->id_pengadaan)->value('namapengadaan');
                                 ?>
                              <tbody>
                                 <tr role="row" class="odd">
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
                                          Total = <i>{{ $total }}</i>
                                       </ul>
                                    </td>
                                    <td><a href="{{route('editPpbj', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah</a></td>
                                 </tr>
                              </tbody>
                              @endforeach
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               {!!$ppbjall->render()!!}
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
      <!-- /.content-wrapper -->
      <!-- Control Sidebar -->
      </div>
   </body>
</html>