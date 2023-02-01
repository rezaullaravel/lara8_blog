<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/')}}admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('/')}}admin/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/')}}admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('/')}}admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  {{--myself css which I added--}}
  <link rel="stylesheet" href="{{asset('admin/dist/css/mystyle.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  {{--toastr notification start--}}
  <link href="{{asset('/')}}admin/toastr/bootstrap.css" rel="stylesheet">

 <script src="{{asset('/')}}admin/toastr/jquery.min.js"></script>

 <link rel="stylesheet" type="text/css"
  href="{{asset('/')}}admin/toastr/toastr.min.css">

 <script src="{{asset('/')}}admin/toastr/toastr.min.js"></script>
  {{--toastr notification end--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('admin.body.header')
  <!-- Left side column. contains the logo and sidebar -->
 @include('admin.body.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('admin.body.footer')

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('/')}}admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/')}}admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="{{asset('/')}}admin/bower_components/raphael/raphael.min.js"></script>
<script src="{{asset('/')}}admin/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{asset('/')}}admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}admin/bower_components/moment/min/moment.min.js"></script>
<script src="{{asset('/')}}admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('/')}}admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/')}}admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('/')}}admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('/')}}admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/')}}admin/dist/js/demo.js"></script>


{{--js for toastr notification start--}}
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.warning("{{ session('warning') }}");
    @endif
  </script>
{{--js for toastr notification end--}}


{{--js for sweet alert start--}}
<script src="{{asset('/')}}admin/sweet_alert/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).on('click', '#delete', function(e) {
        var link = $(this).attr("href");
        e.preventDefault();
        swal({
                title: "Careful!",
                text: "Are you sure you want to delete ?",
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: "Exit",
                    confirm: "Confirm",
                },
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                }
            });
    });
</script>
{{--js for sweet alert end--}}
</body>
</html>
