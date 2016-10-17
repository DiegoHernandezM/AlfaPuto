<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tienda Online | Admin</title>
	<link href="{{ asset('css/Flatly/bootstrap.css')}}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">

</head>
<body>
        @if(\Session::has('message'))
            @include('admin.partials.message')
        @endif
        @include('admin.partials.nav')

        @yield('content')

        @include('admin.partials.footer')




<script type="text/javascript" src="{{ asset('js/JQuery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/JQuery/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/show-products.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/main.js')}}"></script>
</body>
</html>