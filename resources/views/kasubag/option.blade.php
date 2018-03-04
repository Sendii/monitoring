
<!DOCTYPE html>
<html>
<head>
  @extends('layouts.adminlte')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  @include('sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-fluid spark-screen">
      <div class="box-header">
        <center><h3>Data Ppbj</h3></center>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <!DOCTYPE html>
       <html>
       <head>
        <title>Show Multiple Form Using Drop down Option - Demo Preview</title>
        <meta content="noindex, nofollow" name="robots">
        <!-- Importing Font Family From Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
        <style type="text/css">
        div#form1{
          width:380px;
          display:none;
          height:auto;
          border:1px solid gray;
          padding:20px;
          background-color:#FDE2E2;
          border-radius:5px;
          margin-left:40px;
          box-shadow:0 0 8px gray
        }
        #select_btn{
          width:425px;
          height:30px;
          margin-left:40px;
          font-family:'Droid Serif',serif
        }
        h3{
          text-align:center;
          font-family:'Droid Serif',serif
        }
        h2{
          margin-top:80px;
          width:500px;
          text-align:center;
          text-shadow:0 0 1px gray;
          font-family:'Droid Serif',serif
        }
        input[type=text]{
          padding:5px;
          width:100%;
          height:40px;
          border:1px solid #49b637;
          margin:10px 0;
          box-shadow:0 0 5px #5a5a6f;
          border-radius:3px;
          font-family:'Droid Serif',serif
        }
        input[type=submit]{
          background-color:#781149;
          color:#fff;
          border-radius:5px;
          padding:10px;
          width:100%;
          height:40px;
          border:2px solid #fff;
          font-size:16px;
          font-family:'Droid Serif',serif
        }
        input[type=submit]:hover{
          background-color:orange;
          cursor:pointer
        }
        textarea{
          padding:5px;
          width:100%;
          height:80px;
          border:1px solid #49b637;
          margin:10px 0;
          box-shadow:0 0 5px #5a5a6f;
          border-radius:3px;
          font-family:'Droid Serif',serif
        }
        .container{
          margin:20px auto;
          width:960px;
          position:relative
        }
      </style>
    </head>
    <div class="container">
      <h2>Dynamically Created Form Fields Based On Selection</h2>
      <div id="selected_form_code">
        <select id="select_btn">
          <option value="0">--Select No Of Form to Display for Registration--</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
          <option value="4">Four</option>
          <option value="5">Five</option>
        </select>
      </div>
      <div id="form1">
        <form action="#" id="form_submit" method="post" name="form_submit">
          <!-- Dynamic Registration Form Fields Creates Here -->
        </form>
      </div>
      </html>
      <!-- /.box-body -->
    </div>
  </div>
</div>
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
  $('select#select_btn').change(function() {
    var sel_value = $('option:selected').val();
    if (sel_value == 0) {
$("#form_submit").empty(); // Resetting Form
$("#form1").css({
  'display': 'none'
});
} else {
$("#form_submit").empty(); //Resetting Form
// Below Function Creates Input Fields Dynamically
create(sel_value);
// Appending Submit Button To Form
}
});
  function create(sel_value) {
    for (var i = 1; i <= sel_value; i++) {
      $("div#form1").slideDown('slow');
      $("div#form1").append($("#form_submit").append($("<div/>", {
        id: 'head'
      }), $("<input/>", {
        type: 'text',
        placeholder: 'Email' + i,
        name: 'email_' + i
      }), $("<br/>"), $("<hr/>"), $("<br/>")))
    }
  }
});
</script>
</body>
</html>
