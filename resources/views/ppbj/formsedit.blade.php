<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
  <div class="content-wrapper">
    <div class="container-fluid spark-screen"><br>
      <div class="col-md-10 col-md-offset-1">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <center><h2>Ubah Data Ppbj</h2> </center>
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          {!! csrf_field() !!}
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kode PJ</label>
              <div class="col-sm-3">
                <input type="text" name="kodePj" value=" {{$ppbjedit->kodePj or ''}} " class="form-control" placeholder="Kode PJ">
              </div>
              <label class="col-sm-2 control-label">No. Registrasi Umum</label>
              <div class="col-sm-3">
                <input type="text" name="noregisumum" value=" {{$ppbjedit->no_regis_umum or ''}} " class="form-control" id="inputPassword3" placeholder="No. Regis Umum">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl. Registrasi Umum</label>
              <div class="col-sm-3">                
                <input type="date" name="tglregisumum" value="{{ date($ppbjedit->tgl_regis_umum) }}" class="form-control" id="tglregisumum" placeholder="Tgl. Regis Umum">
              </div>
              <label class="col-sm-2 control-label">No. Ppbj</label>
              <div class="col-sm-3">
                <input type="text" name="noppbj" value=" {{$ppbjedit->no_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="No. Ppbj">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl. Permintaan Ppbj</label>
              <div class="col-sm-3">
                <input type="date" name="tglpermintaanppbj" value="{{ date($ppbjedit->tgl_permintaan_ppbj) }}" class="form-control" id="tglpermintaanppbj" placeholder="Tgl Permintaan Ppbj">
              </div>
              <label class="col-sm-2 control-label">Tgl. Dibutuhkan Ppbj</label>
              <div class="col-sm-3">                
                <input type="date" name="tgldibutuhkanppbj" value="{{ date($ppbjedit->tgl_dibutuhkan_ppbj) }}" class="form-control" id="tgldibutuhkanppbj" placeholder="Tgl Dibutuhkan center">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Pengadaan</label>
              <div class="col-sm-3">
                <select name="jenispengadaan" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true">
                  @foreach($pengadaan as $key)
                  <option {{ $ppbjedit->id_pengadaan == $key->id_pengadaan ? 'selected' : '' }} value="{{$key->id_pengadaan}}">
                    {{$key->namapengadaan}}
                  </option>
                  @endforeach
                </select>                      
              </div>
              <label class="col-sm-2 control-label">Unit Kerja</label>
              <div class="col-sm-3">
               <select name="id_unit" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true">
                @foreach($unitkerja as $key)                      
                <option {{ $ppbjedit->id_unit == $key->id_unit ? 'selected' : '' }} value="{{$key->id_unit}}">
                  {{$key->aa}}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Jumlah Barang/Jasa</label>
            <div class="col-sm-3">
              <input type="number" name="row" value="{{$jumlah}}" class="form-control" placeholder="Masukan angka...">
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
                      <input type="text" name="nama[{{ $barang->id_barang }}]" class="form-control" placeholder="Nama Barang/Jasa" value="{{ $barang->nama_barang }}">
                    </td>
                    <td>
                      <input type="number" min="1" id="qty{{$barang->id_barang}}" name="qty[{{ $barang->id_barang }}]" placeholder="Jumlah Barang/Jasa" class="form-control qty qty'+i+'" oninput="calculate();" value="{{ $barang->jumlah_brg }}">
                    </td>
                    <td>
                      <input type="number" min="1" id="harga{{$barang->id_barang}}" name="harga[{{ $barang->id_barang }}]" placeholder="Harga Satuan" id="amount" oninput="calculate();" class="form-control input-sm text-right amount harga harga'+i+'" value="{{ $barang->harga_brg }}">
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
                    <input type="text" id="subtotal" name="subtotal" class="form-control subtotal" placeholder="Total Semua" readonly value="{{ $barang->hargatotal_brg }}">
                  </td>
                </tr>
              </tfoot>
            </table>
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
      </div> 
      <div class="box-footer">
        <button type="submit" name="simpan" class="btn btn-primary pull-right">&nbsp;Tambahkan</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>