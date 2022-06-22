@extends('vue.app')
@section('content')
        <div class="row">
			  <div class="col-6">
			    <h4>QQG | Monitor de Incidencias</h4>
			  </div> 
			  <div class="col-sm-4">
					<a href="#" type="button" class="btn btn-secondary pull-right" data-toggle="modal" data-target="#create">Crear incidencia
					</a> 
					<input type="text" placeholder="Buscar" name="buscar" v-model="buscar"  class="form-group">
			  </div>
	    </div>
	@include('vue.create-incident')
	@include('vue.edit-incident')
	{{-- @include('vue.comments')
 --}}	@include('vue.incidents-list')
	@include('vue.render')
@endsection