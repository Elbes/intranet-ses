<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> {{ Config::get( 'constants.SYS_TITLE' )  }} </title>
	
	 @yield( 'dependencyCss' )
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/layout/') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('/layout/') }}/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('/layout/') }}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ url('/layout/') }}/img/favicon/favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
		
	<body>
	
	    @include( 'layouts.header' )
	
	   <!-- Banner -->
	     @include( 'layouts.banners' )
	   <!-- Fim Banner -->
	   
	   <div class="container">
	   		@yield( 'content' )
	   		
	   		@include( 'layouts.footer' )
	   </div>
	   
	   <!-- jQuery -->
	    <script src="{{ url('/layout/') }}/js/jquery.js"></script>
	
	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{ url('/layout/') }}/js/bootstrap.min.js"></script>
	
	    <!-- Script to Activate the Carousel -->
	    <script>
	    $('.carousel').carousel({
	        interval: 6000 //tempo do slide
	    })
	    </script>
	    @yield( 'dependencyJs' )
	</body>

</html>