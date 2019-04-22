@extends('layouts.gestion.admin')
@section('title')
    	Attributions list
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
          	<div class="col-lg-12">
          		<div class="row">
          			<div class="col-lg-6"><h2 class="h2 mb-2 text-gray-800">Liste des attributions</h2></div>
          			<div class="col-lg-6"><h2 class="h2 mb-2 text-gray-800"><a href="{{route('ajouter_attrib')}}" title="">Ajouter une attributions</a></h2></div>
          		</div>
          	
          		
          		
          		<div class="card shadow mb-4">
          			<div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Attributions en cours</h6>
                    </div>
                    
                    <div class="card-body">
                    	<div class="table-responsive">
                    		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    			<thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Utilisateur</th>
                                  <th>Ordinateur</th>
                                  <th>Date</th>
                                  <th>Heure début</th>
                                  <th>Heure fin</th>
                                  <th>actions</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Utilisateur</th>
                                  <th>Ordinateur</th>
                                  <th>Date</th>
                                  <th>Heure début</th>
                                  <th>Heure fin</th>
                                  <th>actions</th>
                                </tr>
                              </tfoot>
                              <tbody>
                              	<tr>
                              		<td>0</td>
                              		<td>nom user</td>
                              		<td>nom ordinateur</td>
                              		<td>date</td>
                              		<td>début</td>
                              		<td>fin</td>
                              		<td><a href="" title="SUPPRIMER" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a></td>
                              	</tr>
                              	@foreach($attributions as $attribution)
                              	<tr>
                              		<td></td>
                              		<td>{{$attribution->login}}</td>
                              		<td> {{$attribution->nom}}</td>
                              		<td>{{$attribution->date}}</td>
                              		<td>{{$attribution->h_debut}}</td>
                              		<td>{{$attribution->h_fin}}</td>
                              		<td><a href="" title="SUPPRIMER" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#attrib_{{$attribution->nom}}"><i class="fas fa-trash"></i></a>
                              		<!-- Modal -->
                                    <div class="modal fade" id="attrib_{{$attribution->nom}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header bg-gradient-info">
                                            <h5 class="modal-title" id="delete" style="color: white;">Supprimer attribution</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                           <p>Etes-vous sûre de vouloir supprimer l'attribution <strong>n° {{$attribution->id}}</strong>, pour l'ordinateur 
                                           <strong>{{$attribution->nom}}</strong> de l'utilisateur <strong>{{$attribution->login}}</strong>  ?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <a class="btn btn-danger" href="{{route('attribution_delete', $attribution->id)}}">Supprimer</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                              		
                              		
                              		
                              		</td>
                              	</tr>
                              	
                              	@endforeach
                              	
                              	
                              </tbody>
                    		</table>
                    	</div>
                    
                    </div>
          		
          		
          		</div>
          	
          	</div>
          
          </div>

@endsection
