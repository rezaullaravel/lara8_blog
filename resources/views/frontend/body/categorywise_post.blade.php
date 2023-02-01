<div class="col-lg-12">
    <div class="sidebar-item categories">
      <div class="sidebar-heading">
        <h2>Categories</h2>
      </div>
      <div class="content">

        @foreach ($categories as $category)

        @php
            $posts=App\Models\Post::where('category',$category->id)->get();
            $count=count($posts);


        @endphp

          <ul>
            <li><a href="{{route('categorywise.post',$category->id)}}">- {{$category->category_name}}({{ $count}})</a></li>
          </ul>

        @endforeach

      </div>
    </div>
  </div>
