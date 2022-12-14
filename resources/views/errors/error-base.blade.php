<!DOCTYPE html>
<html lang="es">
<head>
	<title>@section('title') Error X! @show</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/errors.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
	<div id="main">
		<div class="fof">
			@section('logo') @show <br>
			<h1>@section('h1') Error X! @show</h1><br>
			<h2>@section('h2')Mensaje de error @show</h2>
			<p><b>@section('texto') Texto adicional @show</b></p>
			@section('boton')
			<h2 class="text-center"><a class="btn btn-secondary my-2 my-sm-0" href="{{route('home')}}">Ir al inicio</a></h2>
			@show
		</div>
	</div>
</body>
</html>
