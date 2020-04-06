@extends('painel.templates.template')

@section('content')

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
	
	@if( isset($product) )
		<form class="form" method="post" action="{{ route('produtos.update', $product->id) }}">
			{!! method_field('PUT') !!} <!-- para rotas de ediçao ultiliza-se o method puth, colocar o reuper para funcionar o put  -->
	@else
		<form class="form" method="post" action="{{ route('produtos.store') }}">
	@endif
		<!--<input type="hidden" name="_token" value="{{csrf_token()}}"> proteçao contra ataques CSRF ou -->
		{!! csrf_field() !!} <!-- Gera o campo input com csf Token altomaticamente  -->

		<div class="form-group">
			<input type="text" name="name" placeholder="Nome:" class="form-control" value="{{$product->name or old('name')}}"> <!-- old('name') existe valor para o name ? se sim mostra se nao nao mostra , quando de erro de validaçao permanece os dados preenchidos no formulario  -->
		</div>

		<div class="form-group">
			<label>
				<input type="checkbox" name="active" value="1" @if ( isset($product) && $product->active == '1') checked @endif>
				Ativo?
			</label>
		</div>

		<div class="form-group">
			<input type="text" name="number" placeholder="Numero:" class="form-control" value="{{$product->number or old('number')}}">
		</div>

		<div class="form-group">
			<select name="category" class="form-control">
				<option value="">Escolha a categoria</option>
				@foreach($categorys as $category)
					<option value="{{$category}}"
						@if( isset($product) && $product->category == $category)
							
							selected

						@endif
					>{{$category}}</option>
				
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<textarea name="description" placeholder="Descriçao" class="form-control">{{$product->description or old('description')}}</textarea>
		</div>

		<button class="btn btn-primary">Enviar</button>
	</form>

@endsection