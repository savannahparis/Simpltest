 <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Attribution</h1>
                <p>Merci de remplir tout les champs obligatoire (*)</p>
              </div>
              
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="message">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              
              <form class="user" method="post" action="{{ route('post_attrib')}}" novalidate>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    {{ csrf_field() }}
                    <select name="user" class="form-control" tabindex="1">
                    	<option value="" selected="selected">Choisir un utilisateur</option>
                    	@foreach ($users as $u)
                            <option value="{{ $u->id }}">{{ $u->login}}</option>
                        @endforeach
                    
                    </select>
 
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="ordi" class="form-control" tabindex="2">
                    	<option value="" selected="selected">Choisir un ordinateur</option>
                    	@foreach ($ordi as $o)
                            <option value="{{ $o->id }}">{{ $o->nom}}</option>
                        @endforeach
                    
                    </select>
                  </div>
                  <div class="col-sm-6">
                    
                  </div>
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control form-control-user" id="" name="date" value="<?php echo date('Y-m-d')?>" >
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <select name="h_debut" class="form-control" tabindex="3">
                        	<option selected="selected">Horaire début</option>
                        	@foreach ($horaire as $k => $h)
                            	<option value="{{$h}}">{{$h}}</option>
                        	@endforeach
                    
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select name="h_fin" class="form-control" tabindex="4">
                        	<option selected="selected">Horaire fin</option>
                        	@foreach ($horaire as $k => $h)
                            	<option value="{{$h}}">{{ $h}}</option>
                        	@endforeach
                    
                    </select>
                  </div>
                  </div>
                  
                <input type="submit" class="btn btn-primary btn-user btn-block" name="ajouter" value="Ajouter attribution">
  
                <hr>
                
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>