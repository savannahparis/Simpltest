@extends('layouts.gestion.admin')
@section('title')
    	Espace de gestion
@endsection

@section('content')
    <!-- Content Row -->
          <div class="row">
          	<div class="col-lg-12">
				@if (session()->has('message'))
                   <div class="alert alert-success" role="alert">
                           {{ session()->get('message') }}    
                   </div>
                  @endif
			</div>
          </div>
          
          <div class="row">
          <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                     <h2><a href="{{route('liste')}}" title="" class="text-gray-200">Liste des attributions</a></h2> 
                      
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-6 mb-4">
                  <div class="card bg-info text-white shadow">
                    <div class="card-body">
                     <h2><a href="{{route('ajouter_user')}}" title="" class="text-gray-200">Ajouter un utilisateur</a></h2> 
                      
                    </div>
                  </div>
                </div>
		</div>
		
		
@endsection
