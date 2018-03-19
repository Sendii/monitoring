<!DOCTYPE html>
<html>

<head>
</head>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">

<body class="hold-transition skin-blue sidebar-mini" background="github.png">
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <div class="col-md-12 col-md-offset-1">
                <br>
                <div class="col-md-10">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <center>
                            <h2>Tambah Data Ppbj</h2> </center>
                        <div class="box-header with-border">
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Kode PJ</label>
                                <div class="col-sm-3">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-code"></i>
                                        </div>
                                        <input type="text" name="kodePj" value="{{$ppbjadd->kodePj or ''}}" class="form-control" placeholder="Kode PJ" required autofocus minlength=="2" maxlength="7">
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label">No. Registrasi Umum</label>
                                <div class="col-sm-3">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-deviantart"></i>
                                        </div>
                                        <input type="text" name="noregisumum" pattern="[0-9]{3}" value="{{$ppbjadd->no_regis_umum or ''}}" class="form-control" id="noregisumum" placeholder="No. Regis Umum" required >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tgl. Registrasi Umum</label>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker1" name="tglregisumum" value="{{$ppbjadd->tgl_regis_umum or ''}}" placeholder="Tgl. Registrasi" min="3" max="4">
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label">No. Ppbj</label>
                                <div class="col-sm-3">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-deviantart"></i>
                                        </div>
                                        <input type="text" name="noppbj" value="{{$ppbjadd->no_ppbj or ''}}" class="form-control" id="inputPassword3" placeholder="No. Ppbj" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tgl. Permintaan Ppbj</label>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker2" name="tglpermintaanPpbj" value="{{$ppbjadd->tgl_permintaan_ppbj or ''}}" placeholder="Tgl. Permintaan">
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label">Tgl. Dibutuhkan Ppbj</label>
                                <div class="col-sm-3">
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker3" name="tgldibutuhkanPpbj" value="{{$ppbjadd->tgl_dibutuhkan_ppbj or ''}}" placeholder="Tgl. Dibutuhkan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-3">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <select name="id_unit" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                            @foreach($unitkerja as $key)
                                            <option value="{{$key->id_unit}}">
                                                {{$key->aa}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Pengadaan</label>
                                <div class="col-sm-8">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-shirtsinbulk"></i>
                                        </div>
                                        <input type="text" name="jenispengadaan" class="form-control" placeholder="Jenis Pengadaan" value="" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jumlah Barang/Jasa</label>
                                <div class="col-sm-3">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-apple"></i>
                                        </div>
                                        <input type="number" name="row" class="form-control" placeholder="Masukan angka..." value="" required autofocus min="2" max="10">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama Barang/Jasa</th>
                                                    <th>Jumlah Barang/Jasa</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td>
                                                        <input type="text" name="subtotal" class="form-control subtotal" placeholder="Total Semua" readonly>
                                                    </td>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('input[name="row"]').on('input', function() {
                                            var row = $('input[name="row"]').val();
                                            var tag = '';
                                            for (i = 1; i <= row; i++) {
                                                tag += '<tr><td><input type="text" name="nama[]" class="form-control" placeholder="Nama Barang/Jasa" required></td><td><input type="number" name="qty[]" placeholder="Jumlah Barang/Jasa" class="form-control qty qty' + i + '" required></td><td><input type="number" name="harga[]" placeholder="Harga Satuan" id="amount"  class="form-control input-sm text-right amount harga harga' + i + '" required></td><td><input type="text" name="total[]" placeholder="Total Harga"  class="form-control input-sm text-right amount total total' + i + '" readonly></td></tr>';
                                            }
                                            $('tbody').html(tag);
                                            subtotal();
                                        });

                                        function subtotal() {
                                            $('.qty, .harga').on('input', function() {
                                                var row = $('tbody tr').length,
                                                    qty = '',
                                                    harga = '',
                                                    total = '',
                                                    jumlah = '',
                                                    subtotal = '';
                                                for (i = 1; i <= row; i++) {
                                                    var qty = $('.qty' + i).val(),
                                                        harga = $('.harga' + i).val(),
                                                        total = qty * harga;
                                                    $('.total' + i).val(total);
                                                    var jumlah = $('.total' + i).val();
                                                    subtotal = +subtotal + +jumlah;
                                                }
                                                $('.subtotal').val(subtotal);
                                            });
                                        }
                                    });

                                    $('#amount').mask('#,###.##', {
                                        reverse: true
                                    });
                                </script>
                            </div>
                            <!--  <div class="form-group">
                  <label class="col-sm-2 control-label">Banyak Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="banyakbarang" value=" {{$ppbjadd->banyak_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Banyak Barang">
                  </div>
                  <label class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="namabarang" value=" {{$ppbjadd->nama_barang or ''}} " class="form-control" id="inputPassword3" placeholder="Nama Barang">
                  </div>
                </div> -->
                            <!--  <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="jumlahbarang" value=" {{$ppbjadd->jumlah_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Jumlah Barang">
                  </div>
                  <label class="col-sm-2 control-label">Harga Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="hargabarang" value=" {{$ppbjadd->harga_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Harga Barang">
                  </div>
                </div> -->
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary pull-right"><i class="fa fa-plus-square">&nbsp;</i>Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Control Sidebar -->
            </div>
            <script type="text/javascript" src="{{asset('js/forms.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
            <script type="text/javascript">
                var nowDate = new Date();
                var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

                $('.select2').select2();
                $('#datepicker1').datepicker({
                    autoclose: true
                });
                $('#datepicker2').datepicker({
                    autoclose: true
                });
                $('#datepicker3').datepicker({
                    startDate: today,
                    useCurrent: false,
                    autoclose: true
                });
            </script>
</body>
</html>