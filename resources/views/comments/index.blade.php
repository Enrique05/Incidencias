@extends('layouts.app')
@section('content')

<div class="card">
	
	<div class="card-header">
		<h2 class="card-title"> Comentarios</h2>
		<h6 class="card-subtitle">
			Usuario: <strong><i>{{ $incident->user->name}}</i></strong><br>
			Codigo: <strong>{{ $incident->id}}</strong><br>
			Incidente: <strong><i>{{ $incident->nameIncident}}</i></strong><br>	
			Descripción: <strong><i>{{$incident->body}}</i></strong><br>
			Status: <strong><i>{{$incident->status_id}}</i>
		</h6> 
		<a href="{{route('incidents.index')}}" class="btn btn-primary"> Regresar</a>
	</div>
	<div class="card-body">
		<ul class="list-group">
			@foreach($incident->comments as $comment)
			<li class="list-group-item">
				<b><i>{{$comment->user->name}}<br></i></b>
				{{$comment->body}} <br><i>{{$comment->created_at}}</i>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="row justify-content-center">
		<div class="col-10">
			
		   <form action="{{route('comments.store')}}" method="POST">
			@csrf
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Nuevo comentario</label>
			  	<input type="hidden" name="incident_id" value="{{$incident->id}}">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"></textarea>
			  </div>
			  <div class="form-group">
			  	<input type="submit" value="Enviar" class="btn btn-primary mx-auto">
			  </div>
		    </form>
		</div>
	</div>
</div>

@endsection
