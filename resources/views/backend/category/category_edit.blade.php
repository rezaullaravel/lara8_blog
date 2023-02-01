@extends('admin.admin_master')

@section('content')



        <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->



                <!-- Main content -->
                <section class="content">


                   <div class="container">
                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <h2>Update Category</h2>
                            <div class="box box-primary">


                                <!-- form start -->
                                <form role="form" action="{{route('category.update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                <div class="box-body">
                                     @include('backend.includes.error')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control"  placeholder="Category Name Here">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Description</label>
                                        <textarea type="text" name="category_description" class="form-control"  placeholder="Category Description Here" rows="5">{{$category->category_description}}</textarea>
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




