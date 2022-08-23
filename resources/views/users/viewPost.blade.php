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
            <h4 class="card-title">View Post</h4>
            <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right mb-2"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Back</a>
            <p class="card-description">
              <!-- Basic form layout -->
            </p>

            <table id="viewPost" class="table display nowra">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
<?php $i=1; ?>
                @forelse ($postDatas as $postData )
                <tr>
                  <td scope="row">{{$i++}}</td>
                  <td><strong><img src="{{asset('post')}}/{{ $postData['post_img'] }}" height="80px" width="100px" /></strong></td>
                  <td>{{$postData->desc}}</td>
                  <td>
                    <a href="{{url('user/postEdit')}}/{{$postData->id}}" class="btn btn-warning">Edit</a>
                    <a href="{{url('user/delete-post')}}/{{$postData->id}}" onclick="return confirm('Are you sure Delete post')" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @empty
                  <h3>Data Not Found</h3>
                @endforelse
                
              </tbody>
            </table>

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
@push('script')
<script>
  $(document).ready(function() {
    $('#viewPost').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endpush