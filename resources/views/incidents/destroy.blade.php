<form action="{{route('incidents.destroy', $incident->id)}}" method="POST">
		@csrf
		@method('DELETE')
		<button class="btn btn-dark">Delete</button>
</form>
</div>

