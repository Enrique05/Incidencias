{{--Para filtrar acciones --}}
@if($incident->status->name == 'Abierto')
	
	<td class='bg-danger'>{{$incident->status->name}}</td>
	<td>
		{{-- Atender --}}
		<a class="btn btn-secondary" href="{{route('atender', $incident->id)}}">Atender</a>

	</td>

@elseif ($incident->status->name == 'En revision')

	<td class='bg-warning'>{{$incident->status->name}}</td>
	<td>
		<div class="btn-group">	
		    <a type="button"class="btn btn-dark" href="{{route('cerrar', $incident->id)}}">Cerrar</a>
	   
		    <a type="button"class="btn btn-dark" href="{{route('incidents.edit', $incident->id)}}" data-toggle="modal" data-target="#edit">Editar</a>
	    
		@include('incidents.destroy')		
		@include('incidents.edit')	
	</td>

@else
	<td class='bg-success'>{{$incident->status->name}}</td>
	<td></td>
@endif