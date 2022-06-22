@extends('layouts.app')
@section('content')
<!-- <meta http-equiv="refresh" content="10">
 -->
 <div class="table-responsive flex">

    <a href="#" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
    	Crear incidencia
    </a>
 
{{-- {!!$incidents->render()!!} --}}

<div>
@include('incidents.fragment.error')

<table class="table table table-bordered table-hover">
	<thead class="table-dark">
		<tr>
			<th>Código</th>
			<th>Fecha</th>
			<th>Incidencia</th>
			<th>Usuario</th>
			<th>Comentario</th>
			<th>Status</th>
			<th>Acciones</th>
			<th>Operador</th>
		</tr>
	</thead>
	<tbody>
		<!-- <tr>
			<a href="#" onclick="mostrar()">Mostrar</a>
		</tr> -->
	@foreach($incidents as $incident)
		<tr>
			<td>{{$incident->id}}</td>
			<td>{{$incident->created_at}}</td>
			<td>{{$incident->nameIncident}}</td>
			<td>{{$incident->user->name}}</td>
			@include('incidents.fragment.comment') 
		    @include('incidents.fragment.status')
            <td>{{$incident->name}}</td>
		</tr>
	        {{-- @yield('comment') Tabla de comentarios --}}
	@endforeach
	</tbody>
</table>
{!!$incidents->render()!!}
</div>
</div>
@include('incidents.create')

@endsection

