@extends('site.templates.template1')
@push('atualizaPag')

	<meta http-equiv="refresh" content="30">

@endpush
@push('scripts') <!-- script dinamico css do stack do template   -->
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@endpush
@section('content')
<div class="container">
<h1 class="text-top">Listagem dos produtos</h1>

<a href="{{route('produtos.create')}}" class="btn btn-outline-secondary btn-add">

	<svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  	<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
  	<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
</svg>Cadastrar

</a>

<table class="table table-striped">
	<tr class="thead-dark">
		 <th scope="col">Nome</th>
		 <th scope="col">Descriçao</th>
		 <th scope="col"> Ações</th>
		


	</tr>

	@foreach($products as $product)

	<tr>

		<td>{{$product->name}}</td>
		<td>{{$product->description}}</td>
		<td>
			<a href="{{	route('produtos.edit',$product->id)	}}" class="btn btn-success" role="button">Editar</a>
			<a href="{{	route('produtos.show',$product->id)	}}" class="btn btn-primary" role="button">Visualizar</a>
			<!-- <a href="{{	route('produtos.destroy',$product->id)	}}" class="btn btn-danger" role="button">Excluir</a> -->
		</td>
		<!--<td><a href="product/delete/{{$product->id}}" class="btn btn-danger" role="button">Excluir</a></td>-->
	</tr>	

	@endforeach

</table>
</div>
@endsection

