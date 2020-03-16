@extends('site.templates.template1') <!-- Extende do template -->

<!-- tudo que for feito na secion content sera enviado para o template1 usado pelo codigo da linha 1  -->
@section('content') <!-- inicia a sessao -->

	<h1> Home Page do Site! </h1>   <!-- conteudo da sessao -->
	{{$teste or 'Nao exite variavel teste'}} <br>
	{{$var1 or 'Nao exite variavel var1'}} <!-- se exite a variavel var1 imprime se nao impromi branco -->
	<br>
	{!!$xss!! } <!-- esta tag interpreta o codigo javaScript por exemplo que vem nesta variavel, colocando o sistema em risco , ja a tag de impressao {{$variavel}} nao interpreta nenhum codigo de programacao-->
@endsection

