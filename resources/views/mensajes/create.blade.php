@extends("plantilla")

{{-- Estilos CSS --}}
@section("estilos-css")

{{-- Estilos mensajes y usuarios --}}
<link rel="stylesheet" href="/css/mensajes-usuarios-estilos/mensajes-usuarios-estilos.css">

{{-- Input File Imagen Area Select --}}
<link rel="stylesheet" href="/css/jcrop/imgareaselect.css" />
@stop

{{-- Contenido --}}
@section("contenido")

<h4 class="mb-5">Mensajes</h4>

@if (count($errors) > 0)
<div class="erroresFormulario">
  @foreach ($errors->all() as $error)
  <div>{{ $error }}</div>
  @endforeach
</div>
@endif

<div class="mensajes-container">
  {{ Form::open(array("route" => "mensajes.store", "method" => "post", "files" => "true", "id" => "formulario-avatar")) }}

  <div class="form-group">
    {{ Form::textarea('comentario', null, array('placeholder' => 'Ingrese un comentario', "class" => "form-control")) }}
  </div>

  <div class="select-property mb-3">
    <select class="form-control" name="selectOption">
      @foreach($items as $key => $item)
      <option value="{{ $key }}"> {{ $item }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group file-property">
    <label for="avatar" class="text-secondary">Seleccione un avatar (Opcional)</label>

    <div class="input-file-container input-file-reverse">
      <label for="" class="input-file-name-bar"></label>
      <input type="file" class="input-file-input image form-control-file" id="file" name="avatar">
      <label for="file" class="input-file-btn "><i class="fas fa-image"></i> Examinar...</label>
    </div>

    <div class="mt-4">
      <img id="previewimage" style="display:none; max-width:300px; max-height:300px;" />
    </div>

    <input type="hidden" name="width" value="" />
    <input type="hidden" name="height" value="" />
    <input type="hidden" name="x1" value="" />
    <input type="hidden" name="y1" value="" />
    <input type="hidden" name="x2" value="" />
    <input type="hidden" name="y2" value="" />

    @if(session('success'))
    <div class="alert alert-success mt-3 mb-3">{{session('success')}}</div>
    @endif

  </div>

  {{ Form::submit('Enviar Datos', array('class' => 'btn btn-primary boton-enviar ml-1')) }}
  {{ Form::close() }}

  <br><br>
  <div class="mt-5 mb-5">
    @foreach($mensajes as $mensaje)

    <!-- Contenedor Principal Comentarios -->
    <div class="comments-container">
      <ul class="comments-list">
        <li>

          <div class="comment-main-level">
            <!-- Contenedor del Comentario -->
            <div class="comment-box">

              <div class="comment-head">
                <div class="text-left">

                  <div class="text-right pb-0 mb-0">
                    @if(auth()->user()->hasRoles(["admin"]))
                    <a href="{{ route('mensajes.edit', $mensaje->id) }}">
                      <a href="{{ route('mensajes.edit', $mensaje->id) }}">
                        <span class="boton-editar btn btn-info">
                          <i class="fas fa-pencil-alt"></i> Editar
                        </span>
                      </a>

                      <form method="post" action="{{ route('mensajes.destroy', $mensaje->id )}}"
                        style="display: inline;">
                        {{csrf_field()}}
                        {{method_field("delete")}}
                        <button type="submit" class="boton-delete btn btn-danger">
                          <i class="fas fa-times"></i> Eliminar
                        </button>
                      </form>

                      @elseif(auth()->id() == $mensaje->id_user_message)
                      <a href="{{ route('mensajes.edit', $mensaje->id) }}">
                        <span class="boton-editar btn btn-info">
                          <i class="fas fa-pencil-alt"></i> Editar
                        </span>
                      </a>

                      <form method="post" action="{{ route('mensajes.destroy', $mensaje->id )}}"
                        style="display: inline;">
                        {{csrf_field()}}
                        {{method_field("delete")}}
                        <button type="submit" class="boton-delete btn btn-danger">
                          <i class="fas fa-times"></i> Eliminar
                        </button>
                      </form>
                      @endif

                  </div>

                  <img style="width:60px; max-width:60px; height:60px; border-radius:50px;"
                    src="{{ $mensaje->avatar ? Storage::url($mensaje->avatar) : url('/storage/default.png')}}"
                    alt="imagen avatar mensaje">

                  <span class="comment-name pl-3 pr-3">{{ $mensaje->name }}

                  </span>

                  <span>Creado: {{$mensaje->created_at}} / &NegativeThickSpace;</span>
                  <span>Editado: {{$mensaje->updated_at}}</span>

                </div>

                <div class="comment-content">{{ $mensaje->comment }}
                </div>
              </div>
            </div>

        </li>
      </ul>
    </div>
    @endforeach
  </div>
</div>

{{-- Pagination --}}
<div class="row justify-content-center">
  <div class="mt-3">
    {{ $mensajes->render() }}
  </div>
</div>

</div>
@stop

{{-- Script - propiedades javascript y jquery --}}
@section("script")
<script src="/js/jcrop/jquery.imgareaselect.js"></script>

<script>
  jQuery(function ($) {
			//Personalizar boton input file
			$(function () {
				$('.input-file-input').on('change', function () {
					if ($(this)[0].files[0]) {
						$(this).prev().text($(this)[0].files[0].name);
					}
				});
			});

			//Imagen previa - input file
			var p = $("#previewimage");
			$("body").on("change", ".image", function () {
				var imageReader = new FileReader();
				imageReader.readAsDataURL(document.querySelector(".image").files[0]);

				imageReader.onload = function (oFREvent) {
					p.attr('src', oFREvent.target.result).fadeIn();
				};
			});

				//Calcular area, ancho y alto de la imagen previa con input file
			$('#previewimage').imgAreaSelect({
				handles: true,
				minWidth: 100, 
				minHeight: 100,
				maxWidth: 200, 
				maxHeight: 200,
				parent: "html",
				onSelectEnd: function (img, selection) {
					$('input[name="width"]').val(selection.width);
					$('input[name="height"]').val(selection.height);
					$('input[name="x1"]').val(selection.x1);
					$('input[name="y1"]').val(selection.y1);
					$('input[name="x2"]').val(selection.x2);
					$('input[name="y2"]').val(selection.y2);
				}
			});
		});
</script>
@stop