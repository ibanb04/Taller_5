@extends('template.base')

@section('title', 'Admin')
@section('title-nav', 'ADMINISTRADOR')

@section('body')
	<div class="row">
	    <h1 align="center">USUARIOS</h1>
			<div class="container"> 

				<!-- <a href="index.php?action=formUsuario" class="btn waves-effect blue btn waves-light">NUEVO</a> -->
			</div>
	    <div class="col m1"></div>
	    <div class=" card col m9">
	        <table class="  striped responsive-table highlight">
			<br>
	            <thead>
	                <tr>
	                    <th>Codigo</th>
	                    <th>Nombre</th>
	                    <th>2do Nombre</th>
	                    <th>Apellido</th>
	                    <th>2do Apellido</th>
	                    <th>Rol</th>
	                    <th>Programa</th>
	                    <th>Mesa</th>
	                </tr>
	            </thead>
	            <tbody>
	                @foreach($usuarios as $usuario)
	                	<tr>
	                		<td>{{ $usuario->codigo }}</td>
	                		<td>{{ $usuario->nombre1 }}</td>
	                		<td>{{ $usuario->nombre2 }}</td>
	                		<td>{{ $usuario->apellido1 }}</td>
	                		<td>{{ $usuario->apellido2 }}</td>
	                		<td>{{ $usuario->rol->nombre }}</td>
	                		<td>{{ $usuario->programa->nombre }}</td>
	                		<td>{{ $usuario->mesa->nombre }}</td>
	                		<td>
 									@if($usuario->estado == 1)
 										<a href="{{ route('autorizar', $usuario->codigo) }}" class="blue waves-effect waves-light btn btnAutorizacion">&nbsp;&nbsp;&nbsp;Autorizar&nbsp;&nbsp;&nbsp;&nbsp;</a>
 									@elseif($usuario->estado == 2)
 										<a href="{{ route('desautorizar', $usuario->codigo) }}" class="red waves-effect waves-light btn btnAutorizacion">desautorizar</a>
 									@elseif($usuario->estado == 4)
 										Ya votó
 									@endif
 
 								</td>
	                	</tr>
	                @endforeach
	            </tbody>
	        </table>
	    </div>
	     <div class="col m2"></div>
	</div>
@endsection