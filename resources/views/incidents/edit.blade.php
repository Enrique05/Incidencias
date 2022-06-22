{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}
<div class="col-sm-10">
	
    @include('incidents.fragment.error')

	<form action="{{route('incidents.update', $incident->id)}}" method="POST">
	@csrf
	@method('PUT') <!-- PORQUE ACEPTA SOLO GET Y POST -->

	@include('incidents.fragment.form-edit')
	
		
	</form>
</div>
{{-- @endsection --}}

