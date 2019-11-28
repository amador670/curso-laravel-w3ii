@extends("plantilla") 

{{-- Estilos CSS --}}
@section("estilos-css")

{{-- Estilos mensajes y usuarios --}}
<link rel="stylesheet" href="/css/mensajes-usuarios-estilos/mensajes-usuarios-estilos.css">
@stop

{{-- Contenido --}}
@section("contenido")
<h4 class="mb-4">Usuarios registrados</h4>

<div class="row p-0 m-0 text-center">
    @foreach($users as $contador => $user)
 
    <div class="col-12 col-sm-6 col-md-4 col-xl-3 p-2">
        <div class="usuarios-registrados">
         <li>
            ID N° {{$contador+1}}. Nombre: <a href="#">{{ $user->name }}</a>
        </li>

        <li>
            Correo: {{ $user->email }}
        </li>

        <li>
            Role: {{ $user->role }}
        </li>

        <li>
            {{-- Si es admin permitir editar todo los perfiles--}}
            @if(auth()->user()->hasRoles(["admin"]))
            <a href="{{ route('usuarios.edit', $user->id) }}" class="boton-editar btn btn-primary text-white">Editar</a>  
            @endif

            {{-- Si el moderador solo editar su perfil--}}
            @if(auth()->user()->hasRoles(["moderador"]))
             @if(auth()->id() == $user->id)
              <a href="/usuarios/{{auth()->id()}}/edit" class="boton-editar btn btn-primary text-white">Editar mi perfil</a> 
             @endif
            @endif

            {{-- Si es admin mostrar el boton eliminar para todos los perfiles --}}
            @if(auth()->user()->hasRoles(["admin"]))
            <form method="post" action="{{ route('usuarios.destroy', $user->id )}}" style="display:inline;">
                {!! csrf_field() !!} {!! method_field('DELETE') !!}
            
                <button type="submit" class="boton-delete btn btn-danger ml-1">Eliminar</button>
            </form>

            @else

            {{-- Si el usuario tiene un role diferente a "admin y moderador" mostrar el boton "eliminar" usuario"--}}
             @if($user->role != "admin" && $user->role != "moderador")
            <form method="post" action="{{ route('usuarios.destroy', $user->id )}}" style="display:inline;">
                {!! csrf_field() !!} 
                {!! method_field('DELETE') !!}
            
                <button type="submit" class="boton-delete ml-1">Eliminar usuario</button>
             </form>
             @else
             
             @if(auth()->id() != $user->id)             
                <a class="boton-warning text-light">No autorizado</a>
             @endif
             
            @endif
            @endif
       
        </li>
    </div>
    </div>
    @endforeach
</div>


@stop