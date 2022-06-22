<div>
	<form action="{{route('clientes.store')}}" method="POST">
		{{csrf_field()}}

	    @include('clientes.fragment.form-create')
		
	</form>
	
</div>
