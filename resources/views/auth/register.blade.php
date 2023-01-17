<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title> Taman Baca - Website Perpustakaan Daerah - Kota Salatiga </title>
    
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>
      
<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <h3>
              Taman
            </h3>
            <span> .Baca</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- login section -->

  <section class="login_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
          <div class="login_form">
            <h5>
              Register
            </h5>
            <form method="POST" action="{{ route('register') }}">
             @csrf

                <div>
                    <input placeholder="User Name " id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                </div>
                
                <div>
                    <input placeholder="Email " id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>
                </div>

                <div>
                    <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
                </div>

                <div>
                    <input placeholder="Password Confirmation" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                </div>
                
                <p class="mt-4 text-sm text-center">
                    had an account?
                    <a href="{{ URL::to('/login')}}" class="text-primary text-gradient font-weight-bold"> Log In </a>
                </p>
                <button  type="submit" >Register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end login section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-3">
          
        </div>

        <div class="col-md-5 offset-md-1">
          
        </div>
      </div>
    </div>
  </section>

  <footer class="container-fluid footer_section">
  
    <p>
      Distributed By 
      <a href="https://themewagon.com/">Themewagon</a>
    </p>

</footer>
  <!-- footer section -->

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

</body>

</html>