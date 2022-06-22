@extends('layout')
@section('content')
{{-- <div class="row justify-content-center"> --}}
	<div class="col-sm-10 ">
		<div class="card">
			<div class="card-header">
				Código:  {{$incident->id}} <br>
				Incidencia: {{$incident->nameIncident}}

			</div>
			
			<div class="card-body">
				<b>User: </b>{{$incident->user->name}} <br>
				<b>Fecha de creación: </b>{{$incident->created_at}} <br>
				<b>Operador asignado: </b>{{$incident->name}} <br>
				<b>Descripcion: </b>{{$incident->body}} <br>
				<b>Comentarios realizados: </b> <br>
				<ul>
					@foreach($incident->comments as $comment)
					<li>
						<b><i>{{$comment->user->name}}<br></i></b>
					{{$comment->body}} <br><i>{{$comment->created_at}}</i>
					</li>
					@endforeach
				</ul>
			</div>

		</div>
		<h2>
			
			<a href="{{route('clientes.edit', $incident->id)}}" class="btn btn-primary pull-right"  >Edit</a>
			<a href="{{route('clientes.index')}}" class="btn btn-primary pull-right" > Listado</a>			
		</h2>
	</div>
{{-- </div> --}}

@endsection