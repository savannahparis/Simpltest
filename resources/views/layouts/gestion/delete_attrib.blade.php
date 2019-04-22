@extends('layouts.gestion.admin')
@section('title')
    	Supprimer une attribution
@endsection

@section('content')
<h2 class="h3 mb-4 text-gray-800">Supprimer une attribution</h2>

			<div class="row">
          	<div class="col-lg-12">
				@if (session()->has('message'))
                   <div class="alert alert-success" role="alert">
                           {{ session()->get('message') }}    
                   </div>
                  @endif
			</div>
          </div>

@endsection