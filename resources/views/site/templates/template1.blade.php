<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>{{$title or 'Curso de Laravel '}}</title>
    <!-- Chama o CSS que esta dentro da pasta assets/painel/css/style.css -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/painel/css/style.css')}}">
    <!-- termina o link CSS  -->
    @stack('atualizaPag')

</head>
<body>

	@yield('content') <!-- Parte dinamica do template -->

	@stack('scripts') <!-- template de Script dinamico de css  -->

</body>
</html>