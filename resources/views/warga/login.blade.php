{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}


 <!DOCTYPE html>
 <html lang="en">
 
 <head>
 
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
 
   <title>SB Admin 2 - Login</title>
 
   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
   <!-- Custom styles for this template-->
   <link href="{{ url('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
 
 </head>
 
 <body class="bg-gradient-primary">
 
   <div class="container">
 
     <!-- Outer Row -->
     <div class="row justify-content-center">
     
 
       <div class="col-xl-6 col-lg-6 col-md-6">
 
         <div class="card o-hidden border-0 shadow-lg my-5">
           <div class="card-body p-0">
             <!-- Nested Row within Card Body -->
             <div class="row justify-content-center">
               <div class="col-lg-12">
                @if (session('success')) 
                <div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
                  <strong>{{ session('success') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if (session('error')) 
                <div class="alert alert-danger alert-dismissible fade show col-md-6" role="alert">
                  <strong>{{ session('error') }}</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                 <div class="p-5">
                   <div class="text-center">
                     <a href="/Administrator/home"><h1 class="h4 text-gray-900 mb-4">Login Warga!</h1>
                     </a>
                     
                   </div>
 
 
                   <form class="user" method="POST" action="{{ route('login.proses') }}">
                     @csrf
                     <div class="form-group">
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan Email" required autocomplete="email" autofocus>
                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>
 
                     <div class="form-group">
                         <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Masukan Password" required autocomplete="current-password">
                             @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                     </div>
                     
                     <div class="form-group">
                       <div class="custom-control custom-checkbox small">
                         <input type="checkbox" class="custom-control-input" id="customCheck">
                         <label class="custom-control-label" for="customCheck">Remember Me</label>
                       </div>
                     </div>
                     <button class="btn btn-primary btn-user btn-block">Login</button>
                     {{-- <hr>
                     <a href="index.html" class="btn btn-google btn-user btn-block">
                       <i class="fab fa-google fa-fw"></i> Login with Google
                     </a>
                     <a href="index.html" class="btn btn-facebook btn-user btn-block">
                       <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                     </a> --}}
                   </form>
 
 
                   <hr>
                   {{-- <div class="text-center">
                     <a class="small" href="forgot-password.html">Forgot Password?</a>
                   </div> --}}
                   <div class="text-center">
                     <a class="small" href="{{ route('warga.register') }}">Create an Account!</a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
 
       </div>
 
     </div>
 
   </div>
 
   <!-- Bootstrap core JavaScript-->
   <script src="{{ url('admin/vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ url('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
   <!-- Core plugin JavaScript-->
   <script src="{{ url('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
 
   <!-- Custom scripts for all pages-->
   <script src="{{ url('admin/js/sb-admin-2.min.js') }}"></script>
 
 </body>
 
 </html>
 