<!DOCTYPE html>
<html lang="id">
<head>
</head>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-datepicker.min.css')}}">
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
  <div class="content-wrapper">
    <div class="container-fluid spark-screen">
      <div class="row"><br>
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <center><h2>Penugasan Data Ppbj</h2> </center>            
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! csrf_field() !!}
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Kode PJ</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
                  <input type="text" name="kodePj" value=" {{$ppbjassignmentEdit->kodePj or ''}} " class="form-control" placeholder="Kode PJ" disabled="disabled">
                  <input type="hidden" name="id" value="{{$ppbjassignmentEdit->id}}">
                </div>
                </div>
                <label class="col-sm-2 control-label">No. Registrasi Umum</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
                  <input type="text" name="noregisumum" value=" {{$ppbjassignmentEdit->no_regis_umum or ''}} " class="form-control" id="inputPassword3" placeholder="No. Regis Umum" disabled="disabled">
                </div>
                </div>
                <label class="col-sm-1 control-label">No. Ppbj</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
                  <input type="text" name="noppbj" value=" {{$ppbjassignmentEdit->no_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="No. Ppbj" disabled="disabled">
                </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tgl. Registrasi Umum</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="text" name="tglregisumum" value="{{date($ppbjassignmentEdit->tgl_regis_umum)}}" class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum" disabled="disabled">
                </div>
                </div>
                <label class="col-sm-2 control-label">Tgl. Permintaan Ppbj</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="tglpermintaanppbj" value="{{ date($ppbjassignmentEdit->tgl_permintaan_ppbj) }}" class="form-control" id="inputPassword3" placeholder="Tgl Permintaan Ppbj" disabled="disabled">
                </div>
                </div>
                <label class="col-sm-1 control-label">Tgl. Dibutuhkan</label>
                <div class="col-sm-2">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input type="date" name="tgldibutuhkanppbj" value="{{ date($ppbjassignmentEdit->tgl_dibutuhkan_ppbj) }}" class="form-control" id="inputPassword3" placeholder="Tgl Dibutuhkan center" disabled="disabled">
                </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Pengadaan</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-bank"></i>
                    </div>
                  <select name="jenispengadaan" class="form-control select2" disabled="disabled" style="width:100%;" tabindex="-1" aria-hidden="true">
                    @foreach($pengadaan as $key)
                    <option selected value="{{$key->id_pengadaan}}">
                      {{$key->namapengadaan}}
                    </option>
                    @endforeach
                  </select>
                  </div>                   
                </div>
                <label class="col-sm-2 control-label">Unit Kerja</label>
                <div class="col-sm-3">
                  <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-plane"></i>
                    </div>
                 <select name="id_unit" class="form-control select2" disabled="disabled" style="width:100%;" tabindex="-1" aria-hidden="true">
                  @foreach($unitkerja as $key)                      
                  <option value="{{$key->id_unit}}" {{ $ppbjassignmentEdit->id_unit == $key->id_unit ? 'selected' : '' }} >
                    {{$key->aa}}
                  </option>
                  @endforeach
                </select>
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
                <input type="number" name="row" value="{{$jumlah}}" class="form-control" placeholder="Masukan angka..." readonly>
              </div>
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
                    @foreach($barangnya as $barang)
                    <tr>
                      <td>
                        <input type="text" name="nama[{{ $barang->id_barang }}]" class="form-control" placeholder="Nama Barang/Jasa" value="{{ $barang->nama_barang }}" readonly>
                      </td>
                      <td>
                        <input type="number" min="1" id="qty{{$barang->id_barang}}" name="qty[{{ $barang->id_barang }}]" placeholder="Jumlah Barang/Jasa" class="form-control qty qty'+i+'" oninput="calculate();" value="{{ $barang->jumlah_brg }}" readonly>
                      </td>
                      <td>
                        <input type="number" min="1" id="harga{{$barang->id_barang}}" name="harga[{{ $barang->id_barang }}]" placeholder="Harga Satuan" id="amount" oninput="calculate();" class="form-control input-sm text-right amount harga harga'+i+'" value="{{ $barang->harga_brg }}" readonly>
                      </td>
                      <td>
                        <input type="text" id="total{{$barang->id_barang}}" name="total[{{ $barang->id_barang }}]" placeholder="Total Harga"  class="form-control input-sm text-right amount total total'+i+'" value="{{ $barang->total_brg }}" readonly>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                     <td colspan="3"></td>
                     <td>
                      <input type="text" id="subtotal" name="subtotal" class="form-control subtotal" placeholder="Total Semua" value="{{ $barang->hargatotal_brg }}" readonly>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <!-- Penugasan dari Kasubag Ke Pegawai Utk Memonitoring ke Kepala Divisi -->
          <div class="form-group">
            <label class="col-sm-2 control-label">Pemekerja</label>
            <div class="col-sm-3">
              <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-user"></i>
                    </div>
             <select name="id_pegawai" class="form-control select2">
              @foreach($pegawai as $key)
                    <option value="{{$key->id_pegawai}}" {{$prosespengadaan->id_pegawai == $key->id_pegawai ? 'selected' : null}}>
                      {{$key->namapegawai}}
                    </option>
              @endforeach
            </select>
          </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Tgl. Spph</label>
          <div class="col-sm-3">
            <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
            <input type="text" name="p_tglspph" class="form-control" placeholder="Tgl. Spph" id="tglspph" value="{{$prosespengadaan->tgl_spph}}">
          </div>
          </div>
          <label class="col-sm-2 control-label">No. Spph</label>
          <div class="col-sm-3">
            <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
            <input type="text" name="p_nospph" value="{{$prosespengadaan->no_spph or ''}}" class="form-control" id="inputPassword3" placeholder="No. Ppbj">
          </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tgl. Etp</label>
        <div class="col-sm-3">
          <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
          <input type="text" name="p_tgletp" class="form-control" placeholder="Tgl. Etp"  id="tgletp" value="{{$prosespengadaan->tgl_etp}}">
        </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tgl. Pengumuman</label>
        <div class="col-sm-3">
          <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
          <input type="text" name="p_tglpmn" class="form-control" placeholder="Tgl. Pengumuman" id="tglpmn" value="{{$prosespengadaan->tgl_pmn}}">
        </div>
        </div>
        <label class="col-sm-2 control-label">No. Pengumuman</label>
        <div class="col-sm-3">
          <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
          <input type="text" name="p_nopmn" class="form-control" id="inputPassword3" placeholder="No. Ppbj" value="{{$prosespengadaan->no_pmn}}">
        </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Tgl. Kontrak</label>
        <div class="col-sm-3">
          <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
          <input type="text" name="p_tglkon" class="form-control" placeholder="Tgl. Kontrak" id="tglkon" value="{{$prosespengadaan->tgl_kon}}">
        </div>
        </div>
        <label class="col-sm-2 control-label">No. Kontrak</label>
        <div class="col-sm-3">
          <div class="input-group text">
                    <div class="input-group-addon">
                      <i class="fa fa-apple"></i>
                    </div>
          <input type="text" name="p_nokon" class="form-control" id="inputPassword3" placeholder="No. Ppbj" value="{{$prosespengadaan->no_kon}}">
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" name="simpan" class="btn btn-primary pull-right">&nbsp;Tambahkan</button>
  </div>
</div>
</div>
</div>
</div>
<script>            
  $(document).ready(function(){                
    $('input[name="row"]').on('input',function(){
      var row = $('input[name="row"]').val();
      var tag = '';
      for(i=1;i<=row;i++){
        tag +='<tr><td><input type="text" name="nama[]" class="form-control" placeholder="Nama Barang/Jasa" value="{{ $barang->nama_barang }}"></td><td><input type="text" name="qty[]" placeholder="Jumlah Barang/Jasa" class="form-control qty qty'+i+'"></td><td><input type="text" name="harga[]" placeholder="Harga Satuan" id="amount"  class="form-control input-sm text-right amount harga harga'+i+'"></td><td><input type="text" name="total[]" placeholder="Total Harga"  class="form-control input-sm text-right amount total total'+i+'" readonly></td></tr>';                    
      }
      $('tbody').html( tag );
      subtotal();
    });
    function subtotal(){
      $('.qty, .harga').on('input',function(){
        var row = $('tbody tr').length,
        qty = '',
        harga = '',
        total = '',
        jumlah = '',
        subtotal = '';
        for(i=1;i<=row;i++){
          var qty = $('.qty'+i).val(),
          harga = $('.harga'+i).val(),
          total = qty * harga;
          $( '.total'+i ).val( total );
          var jumlah = $( '.total'+i ).val();
          subtotal = +subtotal + +jumlah;
        }
        $('.subtotal').val( subtotal );
      });
    }
  });              
  calculate = function()
  {
    <?php foreach ($barangnya as $barang => $value): ?>
    var qty = document.getElementById('qty{{$value->id_barang}}').value;
    var harga = document.getElementById('harga{{$value->id_barang}}').value;
    document.getElementById('total{{$value->id_barang}}').value = parseInt(qty)*parseInt(harga);
    <?php endforeach ?>
    var sum = 0;
    $(".total").each(function(){
      sum += +$(this).val();
    });            
    $(".subtotal").val(sum);        
  }
</script>
  <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
  $('.select2').select2();
</script>
<script type="text/javascript" src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
       $('#tglspph').datepicker({
            autoclose: true
          });
        $('#tgletp').datepicker({
            autoclose: true
          });
         $('#tglpmn').datepicker({
            autoclose: true
          });
         $('#tglkon').datepicker({
            autoclose: true
          });
    </script>
</body>
</html>