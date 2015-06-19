@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="container">

		<div class="col-xs-12">
			<div class="alert responseDanger" style="text-align:center;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Vista previa</th>
						<th>Posicion</th>
						<th>Activar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					@foreach($slides as $s)
					<tr class="tr-slide-desc">
						<td>{{ $s->id }}</td>
						<td><img src="{{ asset('images/slides-top/'.$s->image) }}" style="max-width:300px;"></td>
						<td>
							@if($s->tipo == 1)
								<h4>Slide Superior</h4>
							@else
								<h4>Slide Inferior</h4>
							@endif
						</td>
						<td>
							@if($s->active == 1)
								<button class="btn btn-warning btn-xs refresh active" data-status="{{ $s->active }}" value="{{ $s->id }}">
									Desactivar
								</button>
							@else
								<button class="btn btn-warning btn-xs refresh" data-status="{{ $s->active }}" value="{{ $s->id }}">
									Activar
								</button>
							@endif
						</td>
						<td><button class="btn btn-danger btn-xs deleteSlide" value="{{ $s->id }}" data-toggle="modal" data-target="#elimModal">Eliminar</button></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		

	</div>
</div>
<div class="modal fade" id="elimModal" tabindex="-1" role="dialog" aria-labelledby="modalForggo" aria-hidden="true">
	<div class="forgotPass modal-dialog imgLiderUp">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<legend>¿Seguro desea eliminar al usuario?</legend>
			</div>
				<div class="modal-body">
					<p class="textoPromedio">Esta acción es irreversible, si desea continuar precione eliminar</p>
											
				</div>
				<div class="modal-footer " style="text-align:center;">
					<div class="alert responseDanger textoPromedio">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					</div>
					
					<button class="btn btn-danger envElim" name="eliminar" value="" style="margin-top:2em;">Eliminar</button>	
					
				</div>
		</div>
	</div>
</div>
@stop