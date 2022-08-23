<?php

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

$postCount = DB::table('posts')->where('user_id', auth()->user()->id)->count();
$comments = DB::table('comments')->where('user_id', auth()->user()->id)->count();
$like = DB::table('likes')->where('user_id', auth()->user()->id)->count();

?>
@extends('partials.user.app')
@section('title','User Home')
@section('content')
<!-- bootstrap@5 CSS -->
 <!-- CSS only -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
@push('style')
<style>
  .post-image {
    width: 100%;
    max-width: 500px;
    height: auto;
    max-height: 300px;
  }

  .list {
    list-style: none;
  }
</style>
@endpush
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <b class="text-bold" style="color: #4747a1;">{{auth()->user()->name}}</b></h3>
            <h6 class="font-weight-normal mb-0">Always Be Happy <span class="text-primary">!</span></h6>
          </div>
          <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="{{asset('users/images/dashboard/people.svg')}}" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                </div>
                <div class="ml-2">
                  <h4 class="location font-weight-normal">Indore</h4>
                  <h6 class="font-weight-normal">India</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Total Post</p>
                <p class="fs-30 mb-2">{{$postCount}}</p>
                <!-- <p>10.00% (30 days)</p> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Total comments</p>
                <p class="fs-30 mb-2">{{$comments}}</p>
                <!-- <p>22.00% (30 days)</p> -->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Total Like</p>
                <p class="fs-30 mb-2">{{$like}}</p>
                <!-- <p>2.00% (30 days)</p> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4"></p>
                <p class="fs-30 mb-2"></p>
                 <a href="{{route('user.profileUpdate')}}"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      @forelse ($posts as $post)
      <div class="col-sm-12 col-md-6 col lg-6 mb-3">
        <div class="card">
          <div class="card-header text-light" style="background-color: #4747a1;" >
            <h4>Post</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-2 col-md-2 col lg-2">
                <img class="card-img-top" src="{{asset('profile_image')}}/{{$post->profile_img}}" alt="Card image cap" style="height: 64px; width: 64px;">
              </div>
              <div class="col-sm-10 col-md-10 col lg-10">
                <p><strong>{{$post->user_name}}</strong></p>
                <a href="#">{{ $post->created_at->format('d M Y') }}</a>
              </div>
            </div>
            <div class="description">
              <p>{{$post->desc}}</p>
            </div>

            <!-- <div class="post post-image text-lg-center">
              <img class="img-fluid" src="{{asset('post')}}/{{$post['post_img']}}" alt="Card image cap">
            </div> -->

              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach (json_decode($post->post_img) as $key=>$data)
                      <div class="carousel-item active">
                        <img src="{{asset('post')}}/{{$data}}" class="d-block w-100" alt="..." >
                      </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>


          </div>
          <div class="card-footer bg-light">
            <div class="row">

              <div class="col-sm-6 col-lg-6 col-md-6">
                <?php $like = Like::where('user_id', Auth::user()->id)->where('post_id', $post->id)->first();

                $likeCount = Like::where('post_id', $post->id)->count(); ?>
                @if ($like)
                <i class="fa fa-thumbs-up fa-2x text-primary like" data-user="{{Auth::user()->id}}" data-post="{{$post['id']}}"></i>
                @else
                <i class="fa fa-thumbs-up fa-2x like" data-user="{{Auth::user()->id}}" data-post="{{$post['id']}}"></i>
                @endif
                <a class="likeUsers postLike{{$post['id']}}" data-click="false" data-user="{{Auth::user()->id}}" data-post="{{$post['id']}}">{{$likeCount}}</a>
              </div>

              <div class="col-sm-6 col-lg-6 col-md-6">
                <div class="float-right post closePost{{$post['id']}}" data-click="false" data-user="{{Auth::user()->id}}" data-post="{{$post['id']}}">
                  <i class="fa fa-comments fa-2x text-primary"></i> <span id="commentCount{{$post['id']}}"><?php
                                                                                                            $count = Comment::where('post_id', $post->id)->count();
                                                                                                            ?>{{ $count }}</span>
                </div>
              </div>

            </div>

            <div class="commentArea mt-3 mb-2" id="comment{{$post['id']}}" style="display: none;">
              <div class="closeBtn float-right" data-post="{{$post['id']}}"><a href="javascript:void(0)" class="btn btn-danger btn-sm">&times;</a></div><br>
              <!-- Comment Box -->
              <div class="inputComment">
                <form class="commentForm" data-post="{{$post['id']}}">
                  <div class="row">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="post_id" value="{{$post['id']}}">
                    <div class="col-sm-10 col-md-10 col-lg-10">
                      <div class="form-group">
                        <input type="text" name="comment" class="form-control" placeholder="Comment Here...!">
                      </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                      <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i></button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="comments bg-white mt-2 mb-2 rounded" id="comments{{$post['id']}}" style="display: none;">
              </div>
              <!-- Comment Box End -->
            </div>

            <!-- Like Area -->
            <div class="likes bg-white mt-2 mb-2 rounded" id="likes{{$post['id']}}" style="display: none;">
            <div class="closeLikeBtn float-right" data-post="{{$post['id']}}"><a href="javascript:void(0)" class="btn btn-danger btn-sm">&times;</a></div><br>
            <div id="likeUsers{{$post['id']}}"></div>
              </div>
              <!-- Like Area End-->

          </div>

        </div>
      </div>
      @empty
      <h4 class="text-center">No Post Found.</h4>
      @endforelse


    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. <a href="https://www.bootstrapdash.com/" target="_blank">EMS</a> All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Neeta Bopche<i class="ti-heart text-danger ml-1"></i></span>
      </div>
      <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div> -->
    </footer>
    <!-- partial -->
  </div>

  @endsection
  @push('script')
  <!-- Comment Script -->
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    $(document).ready(function() {
      $('.commentForm').submit(function(e) {
        e.preventDefault();
        let form = $(this);
        let formData = $(this).serialize();
        let fpostId = $(this).data('post');
        $.ajax({
          type: "POST",
          url: "{{route('store.comment')}}",
          data: formData,
          success: function(result) {
            $(`#comments${fpostId}`).css('display', 'block');
            // console.log(result)
            let html = '';

            html = `<ul class="commentUser${fpostId} list"><li><div class="row ml-1 mr-1 mt-1 mb-1">
                  <div class="col-sm-2 col-md-2 col-lg-2">
                    <img class="card-img-top" src="{{asset('profile_image')}}/${result.result.profile_img}" alt="Card image cap" style="height: 64px; width: 64px;">
                  </div>
                  <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="name">
                      <strong>${result.result.user_name}</strong>
                    </div>
                    <div class="comment">
                    ${result.result.comment}
                    </div>
                  </div>
                </div></li></ul>`;

            $(`#comments${fpostId}`).prepend(html)
            $(`#commentCount${fpostId}`).html(result.count)
            form[0].reset();
          }
        });
      })
    });

    $(document).ready(function() {
      $('.closeBtn').on('click', function() {
        let cpostId = $(this).data('post');
        $(`#comment${cpostId}`).css('display', 'none');
        $(`#comments${cpostId}`).css('display', 'none');
        $(`.commentUser${cpostId}`).remove();
        $(`.closePost${cpostId}`).attr('data-click', false);
      })
    });

    $(document).ready(function() {
      $('.post').on('click', function() {
        let commentBtn = $(this);
        let getClick = commentBtn.attr('data-click');
        let postId = $(this).data('post');
        let getUrl = `{{url('user/get-comments')}}/${postId}`;
        $(`#comment${postId}`).css('display', 'block');

        if (getClick === "false") {
          $.ajax({
            type: "GET",
            url: getUrl,
            dataType: 'json',
            success: function(result) {
              // console.log(result)
              let html = '';
              $.each(JSON.parse(result), function(i, val) {
                // console.log(val.comment);
                $(`#comments${postId}`).css('display', 'block');
                html = `<ul class="commentUser${postId} list"><li><div class="row ml-1 mr-1 mt-1 mb-1">
                  <div class="col-sm-2 col-md-2 col-lg-2">
                    <img class="card-img-top" src="{{asset('profile_image')}}/${val.profile_img}" alt="Card image cap" style="height: 64px; width: 64px;">
                  </div>
                  <div class="col-sm-10 col-md-10 col-lg-10">
                    <div class="name">
                      <strong>${val.user_name}</strong>
                    </div>
                    <div class="comment">
                    ${val.comment}
                    </div>
                  </div>
                </div></li></ul>`;

                $(`#comments${postId}`).append(html)
              })
              commentBtn.attr('data-click', true);
            }
          });
        }

      })
    });
  </script>
  <!-- Comment Script End -->

  <!-- Like Script -->
  <script>
    $(document).ready(function() {
      $('.like').on('click', function() {
        var likePostId = $(this).data('post');
        var likeUserId = $(this).data('user');
        var getLikeCount = $(`.postLike${likePostId}`);
        let thisLike = $(this);
        $.ajax({
          type: "POST",
          url: "{{route('like')}}",
          data: {
            'post_id': likePostId,
            'user_id': likeUserId
          },
          success: function(result) {
            if (result.status === 'add') {
              thisLike.addClass('text-primary');
            } else {
              thisLike.removeClass('text-primary');
            }
            getLikeCount.html(result.count);
          }
        });
      })

      $(document).ready(function() {
      $('.closeLikeBtn').on('click', function() {
        let lpostId = $(this).data('post');
        $(`#likes${lpostId}`).css('display', 'none');
        $(`#likeUsers${lpostId}`).css('display', 'none');
        $(`.likeUser${lpostId}`).remove();
        $(`.postLike${lpostId}`).attr('data-click', false);
      })
    });

      $('.likeUsers').on('click', function() {
        var likePostId = $(this).data('post');
        var likeUserId = $(this).data('user');
        let thisClick = $(this);
        var getThisClick = thisClick.attr('data-click');
        let getLikeUrl = `{{url('user/get-user-like')}}/${likePostId}`;
        

        if(getThisClick === "false"){
          $.ajax({
            type: "GET",
            url: getLikeUrl,
            success: function (result) {
              // console.log(result)
              $(`#likes${likePostId}`).css('display', 'block');
              $(`#likeUsers${likePostId}`).css('display', 'block');
              let html = '';
              $.each(JSON.parse(result), function(i, val) {
                html = `<ul class="likeUser${likePostId} list"><li><div class="row ml-1 mr-1 mt-1 mb-1"><strong>${val.user_name}</strong></li></ul>`;

                $(`#likes${likePostId}`).append(html)
              })
              thisClick.attr('data-click', true);
            }
          });
        }

      })

    });
  </script>
  <!-- Like Script End -->

<!-- Bootstrap@5 Script-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  @endpush