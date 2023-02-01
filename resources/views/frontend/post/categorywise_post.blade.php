@extends('frontend.frontend_master')
<style>
    .readmore{
        border: 1px solid #eee;
        padding: 7px;
    }
</style>

@section('title')
Category Wise Post

@endsection
@section('content')

<div class="heading-page header-text">
    <section class="page-heading">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-content">

              <h2>Categoy Wise Post</h2>
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

             @foreach ($categorywist_posts as $post)
              <div class="col-lg-6">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="{{asset($post->post_image)}}" alt="">
                  </div>
                  <div class="down-content">
                    <span>{{$post['categories']['category_name']}}</span>
                    <a href="javascript:void();"><h4>{{$post->post_title}}</h4></a>
                    <ul class="post-info">
                      <li><a href="#">{{$post['users']['name']}}</a></li>
                      <li><a href="#">{{$post->created_at->format('F j, Y')}}</a></li>
                      <li><a href="#">
                        @php
                            $comments=App\Models\Comment::where('post_id',$post->id)->get();
                        @endphp
                        {{count($comments)}} Comments
                        </a></li>
                    </ul>
                    <p>{!! Str::limit($post->post_description,250)!!}</p>
                    <div class="post-options">
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <div class="col-6">
                              <ul class="post-share">

                                <li><a href="{{route('post.single',$post->id)}}" class="readmore">ReadMore</a></li>
                              </ul>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
             @endforeach


              <div class="col-lg-12">
               {{$categorywist_posts->links()}}
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



@endsection

