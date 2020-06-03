<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/png" href="{{asset('/img/logo1.png')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam|Exo|Lato|Open+Sans+Condensed:300|Patrick+Hand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('tail-datetime/css/tail.datetime-default-red.css')}}">

</head>
<body>
@include('partials.navbar')
@yield('content')
@include('partials.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{asset('js/locales.js')}}"></script>
<script src="{{asset('js/rating.js')}}"></script>
<script src="{{asset('tail-datetime/js/tail.datetime.js')}}"></script>
<script src="{{asset('tail-datetime/langs/tail.datetime-es.js')}}"></script>
<script src="{{asset('js/filtroCarta.js')}}"></script>

<script src="{{asset('js/orderUsers.js')}}"></script>
<script src="{{asset('js/buscaUsers.js')}}"></script>
<script src="{{asset('js/orderUsersEditar.js')}}"></script>
<script src="{{asset('js/buscaUsersEditar.js')}}"></script>
<script src="{{asset('js/orderUsersEliminar.js')}}"></script>
<script src="{{asset('js/buscaUsersEliminar.js')}}"></script>

<script src="{{asset('js/selectLocales.js')}}"></script>
<script src="{{asset('js/selectLocalesUpdate.js')}}"></script>
<script src="{{asset('js/selectLocalesDelete.js')}}"></script>

<script src="{{asset('js/changeMap.js')}}"></script>
<script src="{{asset('js/newMap.js')}}"></script>

<script src="{{asset('js/orderPlatos.js')}}"></script>
<script src="{{asset('js/buscaPlatos.js')}}"></script>
<script src="{{asset('js/orderPlatosEditar.js')}}"></script>
<script src="{{asset('js/buscaPlatosEditar.js')}}"></script>
<script src="{{asset('js/orderPlatosEliminar.js')}}"></script>
<script src="{{asset('js/buscaPlatosEliminar.js')}}"></script>

<script src="{{asset('js/orderReservas.js')}}"></script>
<script src="{{asset('js/buscaReservas.js')}}"></script>
<script src="{{asset('js/orderReservasEditar.js')}}"></script>
<script src="{{asset('js/buscaReservasEditar.js')}}"></script>
<script src="{{asset('js/orderReservasEliminar.js')}}"></script>
<script src="{{asset('js/buscaReservasEliminar.js')}}"></script>

<script src="{{asset('js/orderValoraciones.js')}}"></script>
<script src="{{asset('js/buscaValoraciones.js')}}"></script>
<script src="{{asset('js/orderValoracionesEditar.js')}}"></script>
<script src="{{asset('js/buscaValoracionesEditar.js')}}"></script>
<script src="{{asset('js/orderValoracionesEliminar.js')}}"></script>
<script src="{{asset('js/buscaValoracionesEliminar.js')}}"></script>











</body>
</html>
