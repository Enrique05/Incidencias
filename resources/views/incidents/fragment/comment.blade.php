<td>
	<a href="{{route('comments.show', $incident->id)}}" data-toggle="tooltip" data-placement="top" title="Ver comentarios">
		<span class="badge badge-dark badge-pill">{{$incident->comments->count()}}</span>
	</a>
</td>	