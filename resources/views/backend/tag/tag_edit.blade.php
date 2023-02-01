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

                            <h2>Update Tag</h2>
                            <div class="box box-primary">


                                <!-- form start -->
                                <form role="form" action="{{route('tag.update')}}" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$tag->id}}">

                                <div class="box-body">
                                     @include('backend.includes.error')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tag Name</label>
                                        <input type="text" name="tag_name" value="{{$tag->tag_name}}" class="form-control"  placeholder="Tag Name Here">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tag Description</label>
                                        <textarea type="text" name="tag_description" class="form-control"  placeholder="Tag Description Here" rows="5">{{$tag->tag_description}}</textarea>
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



@endsection




