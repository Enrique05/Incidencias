@extends('layouts.app')
@section('content')

<div class="table-responsive">
     <a href="#" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva Incidencia</a>

{!!$incidents->render()!!}
<div>
<table class="table table table-bordered table-hover">
	<thead class="table-dark">
		<tr>
			<th>Código</th>
			<th>Incidencia</th>
			<th>Usuario</th>
			<th>Comentario</th>
			<th>Status</th>
			<th>Operador</th>
		</tr>
	</thead>
	<tbody>
	@foreach($incidents as $incident)

		<tr>
			<td>{{$incident->id}}</td>
			<td>{{$incident->name}}</td>
			<td>{{$incident->user->name}}</td>

			<td><a href="#" onclick= "mostrar({{$incident->id}})"> {{$incident->comments->count()}}</a></td>			
			<!--Frontend-->
			@include('incidents.fragment.paint')
		</tr>

	    @include('comments.index') <!--Tabla de comentarios-->
	@endforeach
	</tbody>
</table>
{!!$incidents->render()!!}
</div>
</div>
@include('incidents.create')
@endsection

