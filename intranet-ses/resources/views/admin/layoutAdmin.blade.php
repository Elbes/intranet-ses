<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
     <title> {{ Config::get( 'constants.SYS_TITLE_Admin' )  }} </title>
	
	 @yield( 'dependencyCss' )

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('/layout/layout-admin') }}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ url('/layout/') }}/img/favicon/favicon.ico" type="image/x-icon">
	
		<!-- DataTables CSS -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('/layout/layout-admin') }}/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

	<div id="wrapper">
		@include( 'admin.headerAdmin' )
		
		@if (Auth::guest())
			@extends('admin.acessoNegado')
		@else
		
			@include( 'admin.menuAdmin' )
			
			@yield( 'content' )
		@endif
	</div>
   
    <!-- jQuery -->
    
    <script src="{{ url('/layout/layout-admin') }}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/layout/layout-admin') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('/layout/layout-admin') }}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ url('/layout/layout-admin') }}/vendor/raphael/raphael.min.js"></script>
    <script src="{{ url('/layout/layout-admin') }}/vendor/morrisjs/morris.min.js"></script>
    <script src="{{ url('/layout/layout-admin') }}/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
   
    <script src="{{ url('/layout/layout-admin') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="{{ url('/layout/layout-admin') }}/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
	<script src="{{ url('/layout/layout-admin') }}/vendor/datatables-responsive/dataTables.responsive.js"></script>
	 <script src="{{ url('/layout/layout-admin') }}/dist/js/sb-admin-2.js"></script>
	 <script src="{{ url('/layout/layout-admin') }}/vendor/scripts.js"></script>
	 
	@yield( 'dependencyJs' )
</body>

</html>