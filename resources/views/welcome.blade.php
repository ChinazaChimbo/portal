@extends('layouts.guest')
@section('page')
    Student Login
@endsection

@section('content')
<div class="bg-grey">
    <section class="d-flex justify-content-center align-items-center main-section">
      <!-- Large screen Login -->
        <section class="container login-section d-none d-lg-flex justify-content-between p-0 position-relative">
          <img src="./img/motif2.png" alt="" class="position-absolute motive2">
          <div class="form-img ">
            <img class="img-fluid img-backpack" src="./img/form-pic1.png" alt="">
          </div>
          <div class="login-form">
            <div class="form-text-area">
  
              <h4 class="ml-3 mb-4">Student Login</h4>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- username -->
                <div class="form-group mx-sm-3 mb-2">
                  <label for="email">Email</label>
                  <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <!-- password -->
                <div class="form-group mx-sm-3 mb-2">
                  <label for="inputPassword2">Password</label>
                  <div class="position-relative">
                    <input type="password" class="form-control" id="inputPassword2" name="password" required autocomplete="current-password" />
                    <div class="pass-icon">
                      <i class="fas fa-eye-slash position-absolute"></i>
                      <i class="fas fa-eye position-absolute"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group mx-sm-3 mb-2 custom-control custom-checkbox ">
                  <input type="checkbox" class="custom-control-input font-1em" id="remember_me" name="remember">
                  <label class="custom-control-label rememberme" for="rememberme">Remember me</label>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                  <button class="btn btn-primary btn-md btn-block" type="submit">Submit</button>
                </div>
                <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="text-center">
                    @if (Route::has('password.request'))
                        <small>Forgot password? <a href="{{ route('password.request') }}" class="text-primary">Reset Password</a></small>
                    @endif
                </div>
              </form>
            </div>
  
  
          </div>
        </section>
        <!-- /Large screen -->
        <!-- Small screens -->
        <div class="login-form bg-light d-lg-none">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
          <div class="form-text-area">
            <img src="./img/logo.png" class="logo-sm" alt="logo">
            <h4 class="ml-3 mb-4">Student Login</h4>
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <!-- username -->
              <div class="form-group mx-sm-3 mb-2">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
              </div>
              <!-- password -->
              <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2">Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control" id="inputPassword2" name="password" required autocomplete="current-password" />
                  <div class="pass-icon">
                    <i class="fas fa-eye-slash position-absolute"></i>
                    <i class="fas fa-eye position-absolute"></i>
                  </div>
                </div>
              </div>
              <div class="form-group mx-sm-3 mb-2 custom-control custom-checkbox ">
                <input type="checkbox" class="custom-control-input font-1em" id="remember_me" name="remember">
                <label class="custom-control-label rememberme" for="rememberme">Remember me</label>
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input class="btn btn-primary btn-md btn-block" type="button" value="submit">
              </div>
              <x-jet-validation-errors class="mb-4" />
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
              <div class="text-center">
                @if (Route::has('password.request'))
                    <small>Forgot password? <a href="{{ route('password.request') }}" class="text-primary">Reset Password</a></small>
                @endif
              </div>
            </form>
          </div>
  
  
        </div>
        <!-- /small screens -->
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5036f34c07.js" crossorigin="anonymous"></script>
</div>
@endsection
