@extends('layouts.main')
@section('title')
    	Connexion
    @endsection

@section('content')
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
       	 @if (session()->has('message'))
           <div class="alert alert-success" role="alert">
                   {{ session()->get('message') }}    
           </div>
          @endif
    
    	@include('includes.formulaires.auth._connexion')
    </div>

  </div>
  @endsection