@extends('admin.admin_master')

@section('content')



        <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->



                <!-- Main content -->
                <section class="content">


                   <div class="container" style="margin-top:50px;">
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <h2>Update Post</h2>
                            <div class="box box-primary">


                                <!-- form start -->
                                <form role="form" action="{{route('post.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$post->id}}">
                                <div class="box-body">
                                     @include('backend.includes.error')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Title</label>
                                        <input type="text" name="post_title" value="{{$post->post_title}}"  class="form-control"  placeholder="Post Title Here">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Category</label>
                                        <select name="category" id="" class="form-control">
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach ($categories as $row)
                                              <option value="{{$row->id}}" {{$row->id==$post->category? 'selected':''}}>{{$row->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Tag</label>

                                        @foreach ($tags as $tag)
                                        <label>
                                          <input type="checkbox" name="tags[]" id="tag{{$tag->id}}" value="{{$tag->id}}" class="flat-red"

                                          @foreach ($post->tags as $t)
                                          @if ($t->id==$tag->id)
                                          checked

                                          @endif

                                          @endforeach
                                          >
                                          <label for="">{{$tag->tag_name}}</label>
                                        </label>
                                        @endforeach


                                      </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Description</label>
                                        <textarea type="text" name="post_description" id="post-ckeditor" class="form-control"  placeholder="Post Description Here" rows="5">{{$post->post_description}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Image</label>
                                        <input type="file" name="post_image"  class="form-control">
                                        <img src="{{asset($post->post_image)}}" width="300" style="margin-top:3px;">
                                    </div>






                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>{{---container end--}}





                </section>
                <!-- /.content -->
            </div>
        <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->


         {{--js for ck editor--}}
            <script src="{{asset('/')}}ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('post-ckeditor');
            </script>

@endsection




