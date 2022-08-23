@extends('partials.login.app')
@section('auth-title','Login')
@section('authcontent')

<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
              <img src="{{asset('users/images/logo.svg')}}" alt="logo">
            </div>

            @if(Session::get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session::get('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @elseif (Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{session::get('error')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <h4>Hello! let's get started</h4>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            <form class="pt-3" action="{{route('login.store')}}" method="post">
              @csrf

              <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Username">
                <span class="text-danger">
                  @error('email')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                <span class="text-danger">
                  @error('password')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="mt-3">
                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#">SIGN IN</a> -->

                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN">
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                  </label>
                </div>
                <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
              </div>
              <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div> -->
              <div class="text-center mt-4 font-weight-light">
                Don't have an account? <a href="{{route('register')}}" class="text-primary">Create</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@endsection