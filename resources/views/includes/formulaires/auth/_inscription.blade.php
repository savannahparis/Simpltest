 <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Création compte</h1>
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
              
              <form class="user" method="post" action="{{ route('post')}}" novalidate>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    {{ csrf_field() }}
                    <input type="text" class="form-control form-control-user" id="" placeholder="Login (*)" name="login" value="{{ old('login') }}" tabindex="1">
                  </div>
                  <div class="col-sm-6">
                    
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="" placeholder="Email (*)" name="email" value="{{ old('email') }}" tabindex="2">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="" placeholder="Mot de passe (*)" name="password" tabindex="3">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="" placeholder="Confirmer saisie mot de passe (*)" name="passwordb" tabindex="4">
                  </div>
                  </div>
                  
                  <div class="form-group row">
                  <div class="col-sm-6">
                   <input type="radio" name="profil" checked="checked" value="user"><i> </i>Utilisateur
                  </div>
                  
                </div>
                <input type="submit" class="btn btn-primary btn-user btn-block" name="ajouter" value="Inscription nouveau compte">
  
                <hr>
                
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>