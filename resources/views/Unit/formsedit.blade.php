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
                            <h2>Edit Data Unit Kerja</h2> </center>
                        <div class="box-header with-border">
                        </div>
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Cabang Kerja</label>
                                <div class="col-sm-4">
                                    <input type="text" name="namacabang" class="form-control" value="{{$editunit->aa}}" placeholder="Cabang Kerja" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-4">
                                    <select name="unitkerja" class="form-control select2">
                                        @if($editunit != "Kantor Cabang")
                                        <option value="Kantor Cabang">Kantor Cabang</option>
                                        <option value="Kantor Pusat">Kantor Pusat</option>
                                        @else
                                        <option value="Kantor Pusat">Kantor Pusat</option>
                                        option @endif
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>