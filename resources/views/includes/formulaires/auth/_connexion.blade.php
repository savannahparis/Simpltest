  <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue...</h1>
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
                  <form class="user" method="post" action="{{ route('connexion')}}" novalidate>
                    <div class="form-group">
                    	{{ csrf_field() }}
                      <input type="email" class="form-control form-control-user" id="" aria-describedby="emailHelp" name="email" placeholder="Indiquer votre email...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="" name="password" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="connecter" value="Connexion">
                    
                    <hr>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                    
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>