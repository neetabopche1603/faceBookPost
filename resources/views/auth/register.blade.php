@extends('partials.login.app')
@section('auth-title','Register!')
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session::get('success')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @elseif (Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{session::get('error')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h4>New here?</h4>
            <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
            <form class="pt-3" action="{{route('register.store')}}" method="post">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Name">
                <span class="text-danger">
                  @error('name')
                  {{$message}}
                  @enderror
                </span>
              </div>

              <div class="form-group">
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email">
                <span class="text-danger">
                  @error('email')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <!-- <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> -->
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                <span class="text-danger">
                  @error('password')
                  {{$message}}
                  @enderror
                </span>
              </div>

              <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="confirm_password" name="password_confirm" placeholder="Confirm Password">
                <span class="text-danger">
                  @error('password_confirm')
                  {{$message}}
                  @enderror
                </span>
              </div>
              <div class="mb-4">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    I agree to all Terms & Conditions
                  </label>
                </div>
              </div>
              <div class="mt-3">
                <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#">SIGN UP</a> -->
                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN UP">
              </div>
              <div class="text-center mt-4 font-weight-light">
                Already have an account? <a href="{{route('login')}}" class="text-primary">Login</a>
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