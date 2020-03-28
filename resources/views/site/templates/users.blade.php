<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>{{$title or 'Curso de Laravel '}}</title>
    @stack('atualizaPag')

</head>
<body>

	@yield('content') <!-- Parte dinamica do template -->

	@stack('scripts') <!-- template de Script dinamico de css  -->

</body>
</html>