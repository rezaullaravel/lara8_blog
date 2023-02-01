<div class="col-lg-12">
    <div class="sidebar-item tags">
      <div class="sidebar-heading">
        <h2>Tag Clouds</h2>
      </div>
      <div class="content">
        @foreach ($tags as $tag)

        @php
            $posts = DB::table('posts')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->where('post_tag.tag_id', '=', $tag->id)
            ->select('posts.*', 'post_tag.tag_id','post_tag.post_id')
            ->get();

            $count=count($posts);
        @endphp
        <ul>
          <li><a href="{{route('tagwise.post',$tag->id)}}">{{$tag->tag_name}}({{  $count }})</a></li>
        </ul>
        @endforeach
      </div>
    </div>
  </div>
