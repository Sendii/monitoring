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
            <div class="col-md-10">
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
                      <input type="date" name="tglregisumum" value=" {{$ppbjedit->tgl_regis_umum }} " class="form-control" id="inputPassword3" placeholder="Tgl. Regis Umum">
                    </div>
                    <label class="col-sm-2 control-label">No. Ppbj</label>
                    <div class="col-sm-3">
                      <input type="text" name="noppbj" value=" {{$ppbjedit->no_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="No. Ppbj">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tgl. Permintaan Ppbj</label>
                    <div class="col-sm-3">
                      <input type="date" name="tglpermintaanppbj" value=" {{$ppbjedit->tgl_permintaan_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="Tgl Permintaan Ppbj">
                    </div>
                    <label class="col-sm-2 control-label">Tgl. Dibutuhkan Ppbj</label>
                    <div class="col-sm-3">
                      <input type="date" name="tgldibutuhkanppbj" value=" {{$ppbjedit->tgl_dibutuhkan_ppbj or ''}} " class="form-control" id="inputPassword3" placeholder="Tgl Dibutuhkan center">
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
                    <label class="col-sm-2 control-label">Banyak Barang</label>
                    <div class="col-sm-3">
                      <input type="text" name="banyakbarang" value=" {{$ppbjedit->banyak_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Banyak Barang">
                    </div>
                    <label class="col-sm-2 control-label">Nama Barang</label>
                    <div class="col-sm-3">
                      <input type="text" name="namabarang" value=" {{$ppbjedit->nama_barang or ''}} " class="form-control" id="inputPassword3" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Barang</label>
                    <div class="col-sm-3">
                      <input type="text" name="jumlahbarang" value=" {{$ppbjedit->jumlah_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Jumlah Barang">
                    </div>
                    <label class="col-sm-2 control-label">Harga Barang</label>
                    <div class="col-sm-3">
                      <input type="text" name="hargabarang" value=" {{$ppbjedit->harga_brg or ''}} " class="form-control" id="inputPassword3" placeholder="Harga Barang">
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