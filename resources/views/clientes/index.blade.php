@extends('layouts.app')
@section('content')
{{-- <h1> Monitor Incidentes - Cliente:</h1> --}}

@if($incidents->count()==0)


	<div class="jumbotron text-center bg-default">
	  <h1 class="display-4">Bienvenido(a) {{$user->name}} </h1>
	  <p class="lead">Presiona el siguiente boton para crear su incidencia</p>
	  <hr class="my-4">
	  <div class="table-responsive">
        <a href="#" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva Incidencia</a>
      <div>
    </div>


@else
<div class="table-responsive">
<a href="#" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nueva Incidencia</a>
<div>

<table class="table table table-bordered table-hover">

<thead class="table-dark">
	<tr>
		<th>Código</th>
		<th>Fecha de creación</th>
		<th>Incidencia</th>
		<th>Descripcion</th>
		<th>Status</th>
		<th>Comentario</th>
		<th>Operador</th>
		<th colspan="2">Acciones</th>
	</tr>
</thead>

<tbody>
	@foreach($incidents as $incident)
		<tr>
			<td>
			{{$incident->id}}
			</td>
			<td>
			{{$incident->created_at}}
			</td>
			<td>
			{{$incident->nameIncident}}
			</td>
			<td>
			{{$incident->body}}
			</td>
			<!--<td>
			{{$incident->status->name}}
			</td>
			-->
			@include('clientes.fragment.status')
			
			@include('clientes.fragment.comment')
			
			<td>
				{{$incident->operator_id}}
			</td>
			<td>
			   <a href="{{route('clientes.show', $incident->id)}}" class="btn btn-success">Ver</a>
			</td>
			<td>
			<form action="{{route('clientes.destroy', $incident->id)}}" method="POST">
								@csrf
								@method('DELETE')
				<button class="btn btn-danger">Delete</button>
			</form>
			</td>
		</tr>
	@endforeach
</tbody>
</table>
</div>
{!!$incidents->render()!!}
</div>
@endif
@include('clientes.create')
@endsection