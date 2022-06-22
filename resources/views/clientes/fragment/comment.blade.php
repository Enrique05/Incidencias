@if($incident->status->name == "Cerrado")
<td>
	{{$incident->comments->count()}}
</td>
@else
@if($incident->comments->count() > 0)
<td>
<a href="{{route('comments.show', $incident->id)}}" data-toggle="tooltip" data-placement="top" title="Ver comentarios"><span class="badge badge-dark badge-pill">{{$incident->comments->count()}}</span></a>
</td>
@else
<td>
<a href="{{route('comments.show', $incident->id)}}" data-toggle="tooltip" data-placement="top" title="Crear comentario"><span class="badge badge-dark badge-pill">{{$incident->comments->count()}}</span></a>
</td>
@endif
@endif
