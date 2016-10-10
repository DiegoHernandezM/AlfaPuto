<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Tienda Online | Store')</title>
	<link href="{{ asset('css/Flatly/bootstrap.css')}}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">

</head>
<body>

@include('store.partials.nav')

@yield('content')

@include('store.partials.footer')




<script type="text/javascript" src="{{ asset('js/JQuery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/JQuery/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/pinterest_grid.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/show-products.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
</body>
</html>