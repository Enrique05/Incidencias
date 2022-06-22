<div>
	<form action="{{route('incidents.store')}}" method="POST">
		{{csrf_field()}}
		
	    @include('incidents.fragment.form-create')
		
	</form>
	
</div>

