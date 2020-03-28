@extends('site.templates.users')

@section('content')
	<div align="center">
		<h1>{{$title}}</h1>

	</div>

	<div class="container">

		@if($title == 'Novo Usuario.')
		<form action="{{ route('postUser.create') }}" method="post">
		@elseif($title == 'Editar usuario.')
		<form action="{{ route('postUser.update')}}" method="post">
		@endif
		  <div class="form-group">
		  	<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
		  	<input name="id" type="hidden" value="{{ $data->id or '' }}"/>
		    <label for="lblname">Nome</label>
		    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Digite aqui seu nome completo" value="{{$data->name or ''}}">

		    <label for="lblemail">E-mail</label>
		    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Digite aqui seu email" value="{{$data->email or ''}}">
		    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
		  </div>
		  <div class="form-group">
		    <label for="lblSenha">Senha</label>
		    <input type="password" class="form-control" name="password" placeholder="Senha"> 
		    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar sua senha, com ninguém.</small>
		  </div>
		  <div class="form-group form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Clique em mim</label>
		  </div>
		  <button type="submit" class="btn btn-primary">Enviar</button>
		</form>

	</div>
@endsection
