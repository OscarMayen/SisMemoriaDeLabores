@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <br>
                        <br>
                        <center><h1>MEMORIA DE LABORES</h1>
                        <br><br>
                        <div class="content">
                             <h2><img src="vendor/adminlte/dist/img/UESlogo.png"  alt="Cinque Terre" width="167" height="211"></h2>
                        </div>
                        </center>
                        <br>
                        <br>
                        <center> 
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                                <input id="email" type="email"  placeholder="Correo electrónico"   class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br> 
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                            
                                <input id="password" type="password"  placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" class="fa-sharp fa-solid fa-eye"> 

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </center>

                        <div class="form-group row">
                            <div class="col-md-3 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <center>
                            
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-success btn-block" >
                                    {{ __('Iniciar Sesión') }}
                                </button>

                            </div>
                        </div>
                        </center>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
