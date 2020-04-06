@extends('site.templates.template1')
@push('atualizaPag')

	<meta http-equiv="refresh" content="30">

@endpush
@push('scripts') <!-- script dinamico css do stack do template   -->
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endpush
@section('content')
<div class="container">
	<div align="center">
		<h1>{{$title}}</h1>
		@if( isset($errors) && count($errors) > 0 )

			<div class="alert-danger">
				@foreach( $errors->all() as $error)

					<p>{{$error}}</p>

				@endforeach
			</div>

		@endif

</div>

<p><b>Ativo:</b> {{$product->active}} </p>
<p><b>Número:</b> {{$product->number}} </p>
<p><b>Categoria:</b> {{$product->category}} </p>
<p><b>Descrição:</b> {{$product->description}} </p>

<hr>
	<form  action="{{ route('produtos.destroy', $product->id) }}" method="POST">
		{{method_field('DELETE')}} <!--  Por padrao o envio de formulario e GET ou POST para enviar via delete tenho que especificar o envio com method_field    -->
   		{!! csrf_field() !!} <!-- token de seguranca de envio de formulario -->

		<input type="submit" class="btn btn-danger" value="Deletar produto: {{$product->name}}">
	</form>



</div>
@endsection

