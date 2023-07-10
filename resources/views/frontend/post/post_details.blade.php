@extends('frontend.frontend_master')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>

<style>
    .my_media{}
    .my_media ul{}
    .my_media ul li{float: right;}
    .my_media ul li a{    font-size: 17px;
                          color: #aaa;

                          padding: 0 6px;}

    .my_media ul li a:hover{
        color:#F48840;
    }
</style>
@section('title')
Post Detail Page

@endsection
@section('content')



<!-- Banner Starts Here -->
<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">
              <h4>Post Details</h4>
              <h2>Single blog post</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Banner Ends Here -->




  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{asset($post->post_image)}}" alt="">
                  </div>
                  <div class="down-content">
                    <span>{{$post['categories']['category_name']}}</span>
                    <a href="javascript:void();"><h4>{{$post->post_title}}</h4></a>
                    <ul class="post-info">
                      <li><a href="javascript:void();">{{$post['users']['name']}}</a></li>
                      <li><a href="javascript:void();">{{$post->created_at->format('F j, Y')}}</a></li>
                      <li><a href="javascript:void();">
                        @if (count($comments)>0)
                        {{count($comments)}} Comments

                        @else
                            No Comments Yet
                        @endif
                        </a></li>
                    </ul>
                    <p>{!!$post->post_description!!}</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">

                          </ul>
                        </div>


                        <div class="col-6">
                              @php
                                    //  $facebook=Share::page(null, $post->post_description)
                                    //     ->facebook()
                                    //     ->getRawLinks();


                                        // $twitter=Share::page(null, $post->post_description)
                                        // ->twitter()
                                        // ->getRawLinks();


                                        // $linkedin=Share::page(null, $post->post_description)
                                        // ->linkedin()
                                        // ->getRawLinks();

                                        $social_medias=Share::page(null,  $post->post_description)
                                        ->facebook()
                                        ->twitter()
                                        ->linkedin()
                                        ->whatsapp()
                                        ->getRawLinks();
                                @endphp

                    <div class="my_media">
                        <ul>
                            @foreach ($social_medias as $key=>$value)

                              <li><a href="{{$value}}" title="Share">{!! $key !!}</a></li>
                              @endforeach

                          </ul>
                    </div>


                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @if (count($comments)>0)
              <div class="col-lg-12">
                <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                    <h2>{{count($comments)}} Comments</h2>
                  </div>
                  <div class="content">
                 @foreach ($comments as $comment)
                    <ul>
                      <li>
                        <div class="right-content">
                          <h4>{{$comment['users']['name']}}<span>{{$comment->created_at->format('F j, Y')}}</span></h4>
                          <p>{!!$comment->comment_description!!}</p>

                          @if(Auth::check() && Auth::user()->id==$comment->user_id)
                          <p>
                            <a href="{{route('comment.edit',
                            ['comment_id'=>$comment->id,
                             'post_id'=>$post->id,
                            ])}}" class="btn btn-success btn-sm">Edit</a>

                            <a href="{{route('comment.delete',$comment->id)}}" id="delete2" class="btn btn-danger btn-sm">Delete</a>
                          </p>
                          @endif
                          <br><br>
                        </div>
                      </li>
                    </ul>
                    @endforeach

                  </div>
                </div>
              </div>
              @else
                <div class="col-lg-12">
                    <h3 class="text-center text-success">No Comments Yet.</h3>
                </div>
              @endif



              <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                  <div class="sidebar-heading">
                    <h2>Your comment</h2>
                    <h4 class="alert alert-secondary">{{Session::get('sms')}}</h4>
                  </div>
                  <div class="content">
                    <form  action="{{route('store.comment')}}" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{$post->id}}">
                      <div class="row">


                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="comment_description" rows="6"  placeholder="Type your comment" required="" ></textarea>

                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button" style="cursor: pointer;">Submit</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
              <form action="{{route('post.search')}}" method="GET" style="display: inherit;">
                @csrf
                <div class="col-lg-9">
                  <div class="sidebar-item search">

                      <input type="text" name="post_title" class="searchText" placeholder="type to search..." required>

                  </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-item search">

                      <button type="submit" class="btn btn-success btn-lg">Search</button>

                    </div>
                </div>
              </form>



              @include('frontend.body.popular_posts')

             @include('frontend.body.categorywise_post')

             @include('frontend.body.tagwise_post')
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{---js for sccial media share start--}}

  {{---js for sccial media share end--}}


@endsection
