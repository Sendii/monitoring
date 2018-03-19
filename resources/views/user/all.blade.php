@include('sidebar')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<div class="content-wrapper">
    <div class="container-fluid spark-screen">
        <div class="col-xs-12">
            <br>
            <div class="box">
                <div class="box-header">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <center>
                        <h3>User Website Monitoring</h3></center>
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Akses</th>
                                    @if(Auth::user() && Auth::user()->akses == 'Admin')
                                    <th>Ubah Akses</th>
                                    @else
                                    <!-- <h3>Bukan Admin</h3> -->
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($user as $key)
                                <tr>
                                    <td>{{$key->id}}</td>
                                    <td>{{$key->name}}</td>
                                    <td>{{$key->email}}</td>
                                    <td class="center">
                                        @if($key->akses == "Kasubag")
                                        <i>Kasubag</i> @elseif($key->akses == "Admin")
                                        <i>Admin</i> @elseif($key->akses=="Kadiv")
                                        <i>Kepala Divisi</i> @else
                                        <div class="row">
                                            <div class="center">
                                                <i>&nbsp; &nbsp; User Biasa</i>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    @if(Auth::user() && Auth::user()->akses == 'Admin')
                                    <td>
                                        <a href="{{url('edituser', [$key->id])}}"><i class="fa fa-edit" aria-hidden="true"> </i> Ubah Aksess</a>
                                    </td>
                                    @else
                                    <!-- <h3>bukan admin</h3> -->
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.3
    </div>
    <strong>Powered &copy; 2018 <a href="#">PklTeam</a>.</strong> All rights reserved.
</footer>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/datatable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datatable/dataTables.bootstrap.min.js')}}"></script>
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>