@extends('layouts.gestion.admin')
@section('title')
    	attribution
@endsection

@section('content')
<h2 class="h3 mb-4 text-gray-800">Ajouter une attribution</h2>

 <div class="row justify-content-center">
       	 @if (session()->has('message'))
           <div class="alert alert-danger" role="alert">
                   {{ session()->get('message') }}    
           </div>
          @endif
    
    </div>

@include('includes.formulaires.gestion._attribution')

@endsection