<!DOCTYPE html>
<html>
<head>
</head>
<style type="text/css">
</style>
<body class="hold-transition skin-blue sidebar-mini" background="github.png">
{!! csrf_field() !!}
  <!-- Content Wrapper. Contains page content -->
<div class="row">
  <div class="content-wrapper">
      <div class="row"><br>
        <div class="content">
          <div class="input-field col s8">
              <div class="box box-info">
               <div class="box-header with-border">
                 <div class="content">
                   <div class="input-field col s12">
                   <label>Unit Kerja: </label>
                   <input type="text" name="unitkerja" value=" {{$UnitKerja->aa or ''}} " class="form-control col s6" placeholder="Unit Kerja"></label><br>
            
                   <select name="kantor" class="form-control">
                   <option value="">
                  Pilih Kantor
                    </option>
                     <option value="Kantor Pusat">Kantor Pusat</option>
                    <option value="Kantor Cabang">Kantor Cabang</option>
                   </select>
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
    </div><footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.3
    </div>
    <strong>Copyright &copy; 2018 <a href="#">PklTeam-</a>.</strong> All rights
    reserved.
  </footer> 
</body>
</html>