@extends('layouts.main')
    @section('title')
    	Inscription admin
    @endsection
    @section('content')

	<div class="container">
	
		@include('includes.formulaires.auth._inscription')
	</div>
	@endsection