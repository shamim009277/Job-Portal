
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="{{asset('admin/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link href="{{asset('admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('admin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('admin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('admin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      @if(Auth::user())
        @include('admin.partial.top')
      @endif
      <!-- Left side column. contains the logo and sidebar -->
      @if(Auth::user())
        @include('admin.partial.sidebar')
      @endif  

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        @yield('content')
        

      </div><!-- /.content-wrapper -->
      @if(Auth::user())
         @include('admin.partial.footer')
      @endif
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- Morris.js charts -->
    
    <script src="{{asset('admin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('admin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->

    <script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('admin/plugins/fastclick/fastclick.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/app.min.js')}}" type="text/javascript"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('admin/dist/js/demo.js')}}" type="text/javascript"></script>
    @stack('scripts')
  </body>
</html>
