<!DOCTYPE html>
<html>
<head>
</head>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
  <section class="content" style="background-color: #ecf0f5;">
    <div class="row">
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
                      <input type="text" name="kodePj" value=" {{$ppbjassignmentEdit->kodePj or ''}} " class="form-control" placeholder="Kode PJ" readonly>
                      <input type="hidden" name="id">
                    </div>
                    <label class="col-sm-2 control-label">No. Registrasi Umum</label>
                    <div class="col-sm-2">
                      <input type="text" name="noregisumum" value=" {{$ppbjassignmentEdit->no_regis_umum or ''}} " class="form-control" id="inputPassword3" placeholder="No. Regis Umum" readonly>
                    </div>
                    <label class="col-sm-1 control-label">No. Ppbj</label>
                    <div class="col-sm-2">
                      <input type="text" name="noppbj" value=" {{$ppbjassignmentEdit->no_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="No. Ppbj" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tgl. Registrasi Umum</label>
                    <div class="col-sm-2">
                      <input type="date" name="tglregisumum" value=" {{$ppbjassignmentEdit->tgl_regis_umum }} " class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
                    </div>
                    <label class="col-sm-2 control-label">Tgl. Permintaan Ppbj</label>
                    <div class="col-sm-2">
                      <input type="date" name="tglpermintaanppbj" value=" {{$ppbjassignmentEdit->tgl_permintaan_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="Tgl Permintaan Ppbj">
                    </div>
                    <label class="col-sm-1 control-label">Tgl. Dibutuhkan</label>
                    <div class="col-sm-2">
                      <input type="date" name="tgldibutuhkanppbj" value=" {{$ppbjassignmentEdit->tgl_dibutuhkan_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="Tgl Dibutuhkan center">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jenis Pengadaan</label>
                    <div class="col-sm-3">
                      <select name="jenispengadaan" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true">
                        @foreach($pengadaan as $key)
                        <option selected value="{{$key->id_pengadaan}}">
                          {{$key->namapengadaan}}
                        </option>
                        @endforeach
                      </select>                      
                    </div>
                    <label class="col-sm-2 control-label">Unit Kerja</label>
                    <div class="col-sm-3">
                     <select name="id_unit" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true" readonly>
                      @foreach($unitkerja as $key)                      
                      <option value="{{$key->id_unit}}" {{ $ppbjassignmentEdit->id_unit == $key->id_unit ? 'selected' : '' }} >
                        {{$key->aa}}
                      </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Banyak Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="banyakbarang" value=" {{$ppbjassignmentEdit->banyak_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Banyak Barang" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="namabarang" value=" {{$ppbjassignmentEdit->nama_barang or ''}} " class="form-control" id="inputPassword3" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="jumlahbarang" value=" {{$ppbjassignmentEdit->jumlah_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Jumlah Barang" readonly>
                  </div>
                  <label class="col-sm-2 control-label">Harga Barang</label>
                  <div class="col-sm-3">
                    <input type="text" name="hargabarang" value=" {{$ppbjassignmentEdit->harga_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Harga Barang" readonly>
                  </div>
                </div><hr>

                <!-- Penugasan dari Kasubag Ke Pegawai Utk Memonitoring ke Kepala Divisi -->
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pemekerja</label>
                  <div class="col-sm-3">
                   <select name="id_pegawai" class="form-control select2 select2-hidden-accessibles" style="width:100%;" tabindex="-1" aria-hidden="true" value="{{$ppbjassignmentEdit->id_pegawai}}" >
                    @foreach($pegawai as $key)                      
                    <option {{ $ppbjassignmentEdit->id_pegawai == $key->id_pegawai ? 'selected' : '' }} value="{{$key->id_pegawai}}">
                      {{$key->namapegawai}}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tgl. Spph</label>
                <div class="col-sm-3">
                  <input type="date" name="p_tglspph" class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
                </div>
                <label class="col-sm-2 control-label">No. Spph</label>
                <div class="col-sm-2">
                  <input type="text" name="p_nospph" value=" {{$prosespengadaan->no_spph or ''}} " class="form-control" id="inputPassword3" placeholder="No. Ppbj">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl. Etp</label>
              <div class="col-sm-3">
                <input type="date" name="p_tgletp" class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tgl. Pengumuman</label>
              <div class="col-sm-3">
                <input type="date" name="p_tglpmn" class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
              </div>
              <label class="col-sm-2 control-label">No. Pengumuman</label>
              <div class="col-sm-3">
                <input type="text" name="p_nopmn" class="form-control" id="inputPassword3" placeholder="No. Ppbj">
              </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Tgl. Kontrak</label>
                <div class="col-sm-3">
                  <input type="date" name="p_tglkon" class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
                </div>
                <label class="col-sm-2 control-label">No. Kontrak</label>
                    <div class="col-sm-3">
                      <input type="text" name="p_nokon" class="form-control" id="inputPassword3" placeholder="No. Ppbj">
                    </div>
                  </div>
              </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="simpan" class="btn btn-primary pull-right">>&nbsp;Tambahkan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>