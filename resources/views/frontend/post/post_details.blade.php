@extends('frontend.frontend_master')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
                           <a href="javascript:void();">
                              <h4>{{$post->post_title}}</h4>
                           </a>
                           <ul class="post-info">
                              <li><a href="javascript:void();">{{$post['users']['name']}}</a></li>
                              <li><a href="javascript:void();">{{$post->created_at->format('F j, Y')}}</a></li>
                              <li><a href="javascript:void();">
                                 @if (count($comments)>0)
                                 {{count($comments)}} Comments
                                 @else
                                 No Comments Yet
                                 @endif
                                 </a>
                              </li>
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

                 <!-- comment and reply comment section start
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
                                   <a href="javascript:void(0)" data-commentId="{{ $comment->id }}"  class="text-info" onclick="showReply(this)">Reply</a>
                                   @if(Auth::check() && Auth::user()->id==$comment->user_id)
                                   <a href="{{route('comment.edit',
                                      ['comment_id'=>$comment->id,
                                      'post_id'=>$post->id,
                                      ])}}" class="text-success">Edit</a>
                                   <a href="{{route('comment.delete',$comment->id)}}" id="delete2" class="text-danger">Delete</a>
                                   @endif
                                   <br><br>
                                   <div>
                                   {{-- <p><a href="javascript:void(0)" onclick="showLoop(this)">{{ count($comment->replyComments) }} replies</a></p> --}}
                                   <div class="replyLoop" style="background: #f2f3f4;">
                                      {{-- comment reply show --}}
                                      @foreach ($comment->replyComments as $reply)
                                      <div class="right-content" style="padding:10px;">
                                         <p>{{ $reply->created_at }}</p>
                                         <h4>{{ $reply->name }}</h4>
                                         <p>{{ $reply->description }}</p>
                                         <a href="javascript:void(0)" data-commentId="{{ $comment->id }}"  class="text-info" onclick="showReply(this)">Reply</a>
                                      </div>
                                      @endforeach
                                      {{-- comment reply show end --}}
                                   </div>
                                </div>
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
              {{-- add reply section --}}
              <div class="col-lg-12 replysection" style="display: none;">
                 <form action="{{ route('reply.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="commentId" id="commentId">
                    <fieldset>
                       <textarea name="description" rows="4"   required="" class="form-control" placeholder="write something here........"></textarea>
                    </fieldset>
                    <fieldset>
                       <button type="submit"  class="btn btn-info" style="cursor: pointer; float:right; margin:3px;">Reply</button>
                       <button type="button" onclick="closeReply(this)" class="btn btn-primary" style="cursor: pointer; float:right; margin-top:3px;">Close</button>
                    </fieldset>
                 </form>
              </div>
              {{-- add reply section end --}}
              {{-- add comment section --}}
              <div class="col-lg-12">
                 <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                       <h2>Your comment</h2>
                       @if (Session('sms'))
                       <h4 class="alert alert-secondary">{{Session::get('sms')}}</h4>
                       @endif
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
               comment and reply comment  section end
                 ---->

                 {{-- disqus comment system start --}}
                 <div class="col-lg-12">
                    <div id="disqus_thread"></div>
                            <script>
                                /**
                                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                                var disqus_config = function () {
                                this.page.url = "{{ route('post.single',$post->id) }}";  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };

                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://reza-blog.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                 </div>
                 {{-- disqus comment system end --}}
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

   <script id="dsq-count-scr" src="//reza-blog.disqus.com/count.js" async></script>
</section>
{{---js for sccial media share start--}}
{{---js for sccial media share end--}}
<script>
   function showReply(caller){
     document.getElementById('commentId').value=$(caller).attr('data-commentId');
     $('.replysection').insertAfter($(caller));
     $('.replysection').show();
   }

   function closeReply(caller){
     $('.replysection').hide();
   }

   function showLoop(caller){
     $('.replyLoop').insertAfter($(caller));
     $('.replyLoop').show();
   }

</script>
<script>
   document.addEventListener("DOMContentLoaded", function(event) {
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };
</script>
@endsection
