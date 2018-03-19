<!DOCTYPE html>
<html lang="id">

<head>
</head>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

<body class="hold-transition skin-blue sidebar-mini">
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <div class="row">
                <br>
                <div class="col-md-9">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <center>
                            <h2>Edit Data Pegawai</h2> </center>
                        <div class="box-header with-border">
                        </div>
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pegawai</label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="40" name="namapegawai" value="{{$editpegawai->namapegawai}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">No. Telp</label>
                                <div class="col-sm-4">
                                    <input type="number" name="notelp" value="{{$editpegawai->notelp}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jabatan</label>
                                <div class="col-sm-4">
                                    <select name="jabatan" class="form-control select2" required>
                                        @foreach($jabatan as $jabatans)
                                        <option value="{{$jabatans->id_jabatan}}" {{$editpegawai->id_jabatan == $jabatans->id_jabatan ? 'selected' : ''}}> {{$jabatans->jabatan}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i>&nbsp;Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $('.select2').select2();
    </script>
</body>