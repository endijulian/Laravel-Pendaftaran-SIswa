<!doctype html>
<html lang="en">

<head>
	<title>Data siswa</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('dashboard/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('dashboard/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('dashboard/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('dashboard/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('dashboard/assets/img/favicon.png')}}">

    //datatable
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }
    </style>


    @yield('link')
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">

        <!-- NAVBAR -->
            @include('layouts.includes._navbar')
        <!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
            @include('layouts.includes._sidebar')
        <!-- END LEFT SIDEBAR -->

        <!-- MAIN -->
            @yield('content')
        <!-- END MAIN -->

        <div class="clearfix"></div>
        <footer>
			<div class="container-fluid">
				<p class="copyright">&copy; Endi <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a> </p>
			</div>
        </footer>

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('dashboard/assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('dashboard/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/scripts/klorofil-common.js')}}"></script>
    <SCript src="{{asset('frontend/js/ckeditor.js')}}"></SCript>

    //datatable
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>



    @yield('footer')

</body>

</html>
