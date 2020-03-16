@extends('site.templates.template1') <!-- Extende do template -->

<!-- tudo que for feito na secion content sera enviado para o template1 usado pelo codigo da linha 1  -->
@section('content') <!-- inicia a sessao -->

	<h1> Home Page do Site! </h1>   <!-- conteudo da sessao -->
	<p>variavel teste: {{$teste or 'Nao exite variavel teste'}}</p>
	<p>variavel var1: {{$var1 or 'Nao exite variavel var1'}}</p> <!-- se exite a variavel var1 imprime se nao impromi branco -->
	
	<p>variavel xss</p> <!-- esta tag interpreta o codigo javaScript por exemplo que vem nesta variavel, colocando o sistema em risco , ja a tag de impressao  nao interpreta nenhum codigo de programacao-->
	

	<h1> Condição if - view blade </h1>
	@if($var1 == '1234')

		<p> É igual. </p>

	@else

		<p> É diferente </p>	
	
	@endif

	<h1> Condição unless - view blade contrario do if entra se a codiçao for falsa </h1>
	@unless($var1 == 1234) <!--  Verifica se o resultado da condiçao for falso  / so entra se for falso  -->

		<p> Nao é igual ..... unless

	@endunless

	<h1> For na view </h1>
	@for( $i = 0; $i < 10; $i++ )

		<p>Valor:{{$i}} </p>


	@endfor


	<h1> Foreach na view </h1>

	@foreach($arrayData as $valor)

		<p>Valor: {{$valor}}</p>


	@endforeach


	<h1> Forelse na view </h1>

	@forelse($arrayData as $valor) <!-- se existir o valor para rodar o for percorre -->

		<p>Valor: {{$valor}}</p>

	@empty <!-- se estiver vazio o para percorrer o for exibe a mensagem abaixo -->

		<p>Nao existe intem para ser impresso</p>

	@endforelse

	 <!--  Tag php -->
	@php   


	@endphp

	<h1> Incluir na pagina um html externo  </h1>

	@include('site.includes.sidebar', compact('var1'))   <!-- tag de inclusao de arquivo no template inclui o rodape html do site que um arquivo externo -->


@endsection

