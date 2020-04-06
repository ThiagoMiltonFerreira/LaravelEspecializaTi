@extends('site.templates.users')

<h1 align="center">Lista de usuarios</h1><br>

<div class="container">

	<a href={{route('getUser.create')}} class="btn btn-outline-primary" role="button">
		<svg class="bi bi-plus" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
	  	<path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
	  	<path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
		</svg>Novo Usuario

	</a>

	@if( isset($statusErrorOrSusses) )
	
		<div class="alert-danger">
			{{$statusErrorOrSusses or ''}}
		</div>
	
	@endif	
</div>
<br>
	<div class="container">
	<table class="table table-sm">
		 <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nome</th>
		      <th scope="col">E-mail</th>
		      <th scope="col">Data de Criação</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
	  	</thead>
		@foreach($users as $user)
		<tr>

			<td>{{$user->id}}</td>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>{{$user->created_at}}</td>
			
			<td><a href="{{ route('getUser.update',$user->id) }}" class="btn btn-primary" role="button">Editar</a></td> <!--  Redireciona para rota nomeada getUser.update e passa o valor da variavel $user->id    --> 
			<td><a href="{{ route('getUser.delete',$user->id) }}" class="btn btn-danger" role="button">Excluir</a></td>
			
		</tr>
		@endforeach
	</table>	
	{!! $users->links() !!}
</div>
