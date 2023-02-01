@extends('frontend.frontend_master')




@section('title')
Comment Edit

@endsection

@section('content')

<div class="container" style="padding-top:120px;">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('comment.update')}}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{$comment->id}}">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Comment Update</label>
                  <textarea name="comment_description" class="form-control" rows="5" required>{{$comment->comment_description}}</textarea>

                </div>




                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
    </div>
</div>

@endsection
