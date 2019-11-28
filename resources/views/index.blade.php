@extends("plantilla")
@section("contenido")

<h3>Curso Laravel w3ii + Curso Laravel Aprendible</h3>

<h4>Nivel Basico e Intermedio.</h4>

<h4>Contenido:</h4>
<div class="temas">
  <ol>
    <li><a href="{{ route('instalacion_laravel') }}">Instalacion de Laravel</a></li>
    <li><a href="{{ route('estructura_de_la_aplicacion') }}">Estructura de la aplicación</a></li>
    <li><a href="{{ route('configurar_laravel') }}">Configurar Laravel (Archivo .env)</a></li>
    <li><a href="{{ route('añadir_bootstrap_laravel') }}">Añadir Bootstrap a Laravel</a></li>
    <li><a href="{{ route('enrutamiento') }}">Definicion de Rutas - Enrutamiento</a></li>
    <li><a href="{{ route('middleware') }}">Middleware</a></li>
    <li><a href="{{ route('controladores') }}">Controladores - Controllers</a></li>
    <li><a href="{{ route('solicitud_metodo_path') }}">Solicitud - Metodo Path</a></li>
    <li><a href="{{ route('cookie') }}">Cookie en Laravel</a></li>
    <li><a href="{{ route('rutas_view') }}">Rutas - View en Laravel</a></li>
    <li><a href="{{ route('redirecciones') }}">Redirecciones - Rutas con Nombre</a></li>
    <li><a href="{{ route('base_de_datos') }}">Base de datos en Laravel</a></li>
    <li><a href="{{ route('control_base_de_datos') }}">Control de base de datos - Migrations (Migraciones)</a></li>
    <li><a href="{{ route('constructor_de_consultas_query') }}">Constructor de consultas Query Builder - Metodo REST</a>
    </li>
    <li><a href="{{ route('propiedades_sql') }}">Propiedades SQL</a></li>
    <li><a href="{{ route('orm_enloquent' )}}">ORM manejador de base de datos Enloquent</a></li>
    <li><a href="{{ route('autenticacion_de_usuario') }}">Autenticacion de Usuario - Aunt() </a></li>
    <li><a href="{{ route('roles_en_laravel') }}">Roles de usuario en Laravel</a></li>
    <li><a href="{{ route('encriptar_clave') }}">Encriptar contraseña de usuario</a></li>
    <li><a href="{{ route('autorizaciones_policies') }}">Autorizaciones de Roles - Policies</a></li>
    <li><a href="{{ route('errores_en_laravel') }}">Errores de registro y rutas</a></li>
    <li><a href="{{ route('paginacion_laravel')}}">Paginacion en Laravel</a></li>
    <li><a href="{{ route('cache_laravel') }}">Cache en laravel - Cache file y redis</a></li>
    <li><a href="{{ route('repositorios_y_docoradores') }}">Repositorios y decoradores para cache en laravel</a></li>
    <li><a href="{{ route('formularios_html_en_laravel') }}">Formularios html en Laravel</a></li>
    <li><a href="{{ route('recibir_datos_request') }}">Recibir datos de validacion de un formulario - Request()</a></li>
    <li><a href="{{ route('localizacion_language') }}">Localizacion - Lenguaje en Laravel</a></li>
    <li><a href="{{ route('sesiones_en_laravel') }}">Sesiones en Laravel</a></li>
    <li><a href="{{ route('propiedades_de_validacion') }}">Propiedades de Validacion</a></li>
    <li><a href="{{ route('subir_archivos_file') }}">Subir archivos - Propiedad File en Laravel</a></li>
    <li><a href="{{ route('subir_imagen_intervention') }}">Subir imagen  (caja de comentarios) - Propiedad File - Image Intervention</a></li>
    <li><a href="{{ route('envio_de_correo_laravel') }}">Envio de correo en Laravel - Email</a></li>
    <li><a href="{{ route('eventos_listeners_laravel')}}">Eventos y listeners en Laravel</a></li>
    <li><a href="{{ route('excepciones_http')}}">Excepciones HTTP - Errores 404, 503, etc.</a></li>
    <li><a href="{{ route('laravel_collections') }}">Laravel Collections</a></li>
    <li><a href="{{ route('subir_laravel_a_hosting') }}">Subir Proyecto Laravel a Hosting</a></li>
  </ol>









  @stop