@extends('partials.user.app')
@section('title','User Profile Update')
@section('content')


<div class="main-panel">        

        <div class="content-wrapper">
        <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right mb-2"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Back</a>
        @if(Session::get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session::get('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @elseif(Session::get('password'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session::get('password')}}</strong>
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

            @elseif (Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{session::get('danger')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @endif

          <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
            
                <div class="card-body">
                  <h4 class="card-title">Update Profile</h4>
                  <!-- <p class="card-description">
                    Basic form layout
                  </p> -->
                  <form class="forms-sample" action="{{route('user.updateProfile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <input type="hidden" name="id" value="{{$userProfile->id}}}">

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="name" class="form-control" name="name" value="{{$userProfile->name}}" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" value="{{$userProfile->mobile}}" name="mobile" id="mobile" placeholder="Mobile">
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$userProfile->email}}" placeholder="Email">
                    </div>
                    <!-- <div class="form-group">
                      <label for="password">Old Password</label>
                      <input type="password" class="form-control" name="old_password" id="password" placeholder="Old Password">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Post">
                    </div> -->
                    <div class="form-group">
                      <label for="profile_img">Profile Image</label>
                      <input type="file" class="form-control" name="profile_img" id="profile_img">
                      <img src="{{asset('profile_image')}}/{{ $userProfile['profile_img'] }}" style="border: 1px solid #ffbe0f;" height="80px" width="100px" />
                    </div>

                    <div class="form-group">
                      <label for="description">Address</label>
                     <textarea name="address" class="form-control" id="address" cols="30" rows="10">{{$userProfile->address}}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Change Password -->
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Password</h4>
                  <p class="card-description">
                   Change Password
                  </p>
                  <form class="forms-sample mt-4" action="{{route('user.changePassword')}}" method="post">
                    @csrf
                    @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach 
                    <div class="form-group row">
                    <label for="password"> Old Password<span class="text-danger">*</span></label><br>
                      <div class="col-sm-10">
                      <input type="password" class="form-control" name="current_password" id="password" placeholder="Current Password">
                      </div>
                    </div>

                    <div class="form-group row">
                    <label for="password"> New Password<span class="text-danger">*</span></label><br>
                      <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_password" id="password" placeholder="password">
                      </div>
                    </div>

                    <div class="form-group row">
                    <label for="password">Repeat new password<span class="text-danger">*</span></label>
                      <div class="col-sm-10">
                      <input type="password" class="form-control" name="new_confirm_password" id="new_confirm_password" placeholder="Re-Type Password">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Updare</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
            </div>
         
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>

      @endsection