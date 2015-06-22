@extends('layouts.admin')

@section('content')
{{ HTML::style('https://rawgit.com/enyo/dropzone/master/dist/dropzone.css') }}
<div class="row">
	<div class="container">
		<div class="col-xs-12">
			<div class="col-xs-6 contdeColor contCentrado">
				<legend>Nuevo slide</legend>
				<p class="bg-info textoPromedio" style="padding:0.5em;">Recuerde que las imagenes para el slider debe ser de almenos 1290*800 pixels</p>
				<div class="bg-primary textoPromedio contOptionA" style="padding:0.5em;">
					<div class="col-xs-12">
						<a href="#" class="optionA" data-toggle="collapse" data-target=".single" style="color:white;">Unico slide </a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="single imagesSlidesOption textoPromedio collapse">
					<form method="POST" action="{{ URL::to('administrador/nuevo-slide/procesar') }}" enctype="multipart/form-data">
						<label>Slide:</label>
						<input type="file" name="img">
						<div class="radio radio-info">
							<label>
								<input type="radio" name="tipo" value="1" checked>
								<span class="circle"></span><span class="check"></span>
								Superior
							</label>
						</div>
						<div class="radio radio-info">
							<label>
								<input type="radio" name="tipo" value="2">
								<span class="circle"></span><span class="check"></span>
								Inferior
							</label>
						</div>
						<button class="btn btn-success btn-xs" style="margin-top:1em;margin-bottom:1em;">Enviar</button>
					</form>
				</div>
				<div class="bg-primary textoPromedio contOptionA" style="padding:0.5em;">
					<div class="col-xs-12">
						<a href="#" class="optionA" data-toggle="collapse" data-target=".multiple" style="color:white;">Multiples slide </a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="multiple imagesSlidesOption textoPromedio collapse">
					{{ HTML::style('https://rawgit.com/enyo/dropzone/master/dist/dropzone.css') }}
                    <p class="" style="margin-top:2em;">Arrastre imágenes en el cuadro o presione en él para así cargar las imágenes restantes.</p>
                    <p class="">Recuerde que posee un límite para 7 imágenes adicionales.</p>
                    <div id="dropzone">
                        <form action="{{ URL::to('administrador/nuevos-slides/procesar') }}" method="POST" class="dropzone textoPromedio" id="my-awesome-dropzone">
                            <input type="hidden" name="tipo" value="1" class="tipo">
                            <div class="dz-message">
                                Arrastre o presione aquí para subir su imagen.
                            </div>
                        </form>

                    </div>
                    <div class="radio radio-info">
						<label>
							<input type="radio" name="tipe" value="1" class="checkbox" checked>
							<span class="circle"></span><span class="check"></span>
							Superior
						</label>
					</div>
					<div class="radio radio-info">
						<label>
							<input type="radio" name="tipe" class="checkbox" value="2">
							<span class="circle"></span><span class="check"></span>
							Inferior
						</label>
					</div>
						<a href="{{ URL::to('administrador/editar-slides') }}" class="btn btn-xs btn-success" style="margin-top:1em;margin-bottom:1em;">Continuar</a>

				</div>
				
			                
				<div class="bg-primary textoPromedio volver" style="padding:0.5em;margin-top:1em;">
					
					<div class="col-xs-12">
						<a href="#"style="color:white;">Volver</a>
					</div>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
	</div>
</div>
@stop

@section('postscript')
{{ HTML::script('js/dropzone.js') }}
<script type="text/javascript">
    Dropzone.autoDiscover = false;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;
    var myDropzone = new Dropzone("#my-awesome-dropzone");
    
    myDropzone.on("success", function(resp){
    	var respuesta = JSON.parse(resp.xhr.response);
    	console.log(respuesta.image)
    	$(resp._removeLink).attr('data-dz-remove',respuesta.image);
    });
    myDropzone.on("removedfile", function(file) {
        var id = $(file._removeLink).attr('data-dz-remove');
        if(file.xhr){

            $(function() {
              // Now that the DOM is fully loaded, create the dropzone, and setup the
              // event listeners
                var url = JSON.parse(file.xhr.response);
                var imagepath = url.url;
                $.ajax({
                    url: '../administrador/editar-slides/eliminar',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'id' :  id

                    },
                    success:function(response)
                    {
                        console.log(response)
                    }
                })

                
                })
            }
    })
</script>
@stop