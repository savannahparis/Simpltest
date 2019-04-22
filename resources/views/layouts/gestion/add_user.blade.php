@extends('layouts.gestion.admin')
@section('title')
    	Ajouter user
@endsection

@section('content')
<h2 class="h3 mb-4 text-gray-800">Ajouter utilisateur</h2>

@include('includes.formulaires.auth._inscription')

@endsection