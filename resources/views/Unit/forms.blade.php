<!DOCTYPE html>
<html>

<head>
</head>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

<body class="hold-transition skin-blue sidebar-mini" background="github.png">
    {!! csrf_field() !!}
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid spark-screen">
            <br>
            <div class="col-md-10 col-md-offset-1">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box box-info">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <center>
                            <h2>Tambah Data Unit Kerja</h2> </center>
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Kerja: </label>
                                <div class="col-sm-8">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-plane"></i>
                                        </div>
                                        <input type="text" name="unitkerja" value="{{$UnitKerja->aa or ''}}" class="form-control col s4" placeholder="Unit Kerja" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-8">
                                    <div class="input-group text">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bank"></i>
                                        </div>
                                        <select name="kantor" class="form-control select2 sm-4" required>
                                            <option value="" class="form-control">
                                                Pilih Kantor
                                            </option>
                                            <option value="Kantor Pusat">Kantor Pusat</option>
                                            <option value="Kantor Cabang">Kantor Cabang</option>
                                    </div>
                                </div>
                                </select>
                            </div>
                            <div class="main-footer">
                                <button type="submit" name="submit" class="btn btn-primary pull-right"><i class="fa fa-plus-square"></i>&nbsp;Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </div>
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
</html>