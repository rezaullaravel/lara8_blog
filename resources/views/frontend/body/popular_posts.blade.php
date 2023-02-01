<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Popular Posts</h2>
      </div>
      <div class="content">
     @foreach ($popular_posts as $post)
        <ul>
          <li><a href="{{route('post.single',$post->id)}}">
            <h5>{{$post->post_title}}</h5>
            <span>{{$post->created_at->format('F j, Y')}}</span>
          </a></li>
        </ul>
        @endforeach

      </div>
    </div>
  </div>
