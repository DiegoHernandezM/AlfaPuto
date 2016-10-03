<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Template | Store')</title>
</head>
<body>

@include('store.partials.nav')

@yield('content')

@include('store.partials.footer')

</body>
</html>