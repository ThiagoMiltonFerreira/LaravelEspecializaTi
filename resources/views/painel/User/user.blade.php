@extends('site.templates.users')

<h1 align="center">Lista de usuarios</h1><br>

<div align="center">

	<a href={{route('getUser.create')}} class="btn btn-outline-primary" role="button">Novo Usuario</a>
	<br>
	{{$statusErrorOrSusses or ''}}
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
</div>
