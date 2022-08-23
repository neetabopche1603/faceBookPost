@extends('partials.user.app')
@section('title','User Home')
@section('content')

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
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

            @elseif (Session::get('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>{{session::get('danger')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            @endif

          <div class="card-body">
            <h4 class="card-title">Edit Post</h4>
            <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right mb-2"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Back</a>
            <!-- <p class="card-description">
                    Basic form layout
                  </p> -->


            <form class="forms-sample" action="{{route('user.postUserUpdate')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$postEditViews['id']}}">
              <div class="form-group">
                <label for="exampleInputUsername1">Post</label>
                <input type="file" class="form-control" name="post" id="post" placeholder="Post">
                <img src="{{asset('post')}}/{{ $postEditViews['post_img'] }}" style="border: 1px solid #ffbe0f;" height="80px" width="100px" />
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{$postEditViews->desc}}</textarea>
              </div>

              <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021. Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
    </div>
  </footer>
  <!-- partial -->
</div>

@endsection