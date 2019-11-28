<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<title>Curso Laravel w3ii</title>
	
	<link rel="stylesheet" href="/css/bootstrap.css">
	
	<link rel="stylesheet" href="/css/estilos.css">	

	@yield("estilos-css")

	{{-- Icons kit font-awesome --}}
	<script src="/js/icons-font-awesome-5.9.0.js"></script>
</head>

<body>
	<?php  
       		 //Creamos una funcion para seleccionar las secciones del menu activas
			function activeMenu($url){
				return request()->is($url) ? "active" : "";
			}
		?>

	<div class="mb-5">
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom: 1px solid #0056b3 ">

			{{-- Boton menu responsive --}}
			<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#menuNav"
				aria-controls="menuNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			{{-- Logo --}}
			<a class="navbar-brand" href="{{ route('index') }}" style="color: #0056b3">
				<h5>Curso Laravel w3ii</h5>
			</a>

			{{-- Enlaces --}}
			<div class="collapse navbar-collapse pl-3 justify-content-end" id="menuNav">
				<ul class="navbar-nav mt-2 mt-lg-0">

					<li class="nav-item">
						<a class="nav-link {{ activeMenu('/') }}" href="{{ route('index') }}"><i class="fa fa-home"
								aria-hidden="true"></i> Inicio</a>
					</li>

					<li class="nav-item">
						<a class="nav-link {{ activeMenu('contactos*') }}" href="{{ route('contactos.create') }}"><i
								class="fas fa-user-friends"></i>
							Contactos</a>
					</li>

					{{-- Devuelve verdadero si hay un usuario autenticado para crear un mensaje --}}
					@if(auth()->check())
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('mensajes*') }}" href="{{ route('mensajes.create') }}"><i
								class="far fa-comment"></i> Mensajes</a>
					</li>

					{{-- Si el usuario autenticado es "admin y moderador" puede ver los usuarios del sistema --}}
					@if(auth()->user()->hasRoles(["admin", "moderador"]))
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('usuarios*') }}" href="{{ route('usuarios.index') }}"><i
								class="fas fa-coffee"></i> Usuarios</a>
					</li>
					@endif

					{{-- Si el usuario tiene un role diferente a "admin y moderador" solo deja editar el usuario logeado --}}
					@if(!auth()->user()->hasRoles(["admin","moderador"]))
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('usuarios/*/edit') }}"
							href="/usuarios/{{auth()->id()}}/edit"><i class="fas fa-clipboard-list"></i> Modificar
							Cuenta</a>
					</li>
					@endif

					<li class="nav-item">
						<a class="nav-link" href="{{route('logout')}}"><i class="fas fa-sign-in-alt"></i> Cerrar
							Sesion</a>
					</li>
					@endif

					{{-- Devuelve un valor booleano de verdadero o falso --}}
					@if(auth()->guest())
					<li class="nav-item">
						<a class="nav-link {{ activeMenu('auth*') }}" href="{{ route('login') }}"><i
								class='far fa-address-card'></i>
							{{request()->segment(2) == 'register' ? "Registrarse" : "Iniciar Sesión"}}
						</a>
					</li>
					@endif

				</ul>
			</div>
		</nav>
	</div>

	<!-- Es para incluir la seccion que se va a mostrar -->
	<div class="container-fluid">
		<div class="row ml-4 mr-4">
			<div class="col-12 mt-5">
				@yield("contenido")
			</div>
		</div>
	</div>

	<script src="/js/jquery-2.2.4.min.js"></script>

	<script src="/js/bootstrap-js/popper.min.js"></script>

	<script src="/js/bootstrap-js/bootstrap.min.js"></script>

	<script src="/js/evitar_doble_submit/evitar_doble_submit.js"></script>	

	@yield("script")
</body>

</html>