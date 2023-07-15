
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Donation Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Disaster Donation Management </h1>
      </div>
      <div class="login-box"> 
        <br>
      <p class="message text-center"></p>
  
    
      <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <br>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          @if (isset($message))
          <span class="login-head" role="alert">
              <strong><p style="color: red">{{ $message }}</p></strong>
          </span>
          @endif
          <div class="form-group">
            <label for="email" class="control-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password" class="control-label">{{ __('Password') }}</label>
            
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          
          
          <button type="submit" class="btn btn-primary btn-block login-btn">
              {{ __('Login') }}
          </button>
        </form>

      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('js/plugins/pace.min.js')}}"></script>
  </body>
</html>