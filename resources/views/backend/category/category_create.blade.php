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

                            <h2>Create Category</h2>
                            <div class="box box-primary">


                                <!-- form start -->
                                <form role="form" action="{{route('category.store')}}" method="POST">
                                    @csrf
                                <div class="box-body">
                                     @include('backend.includes.error')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" name="category_name" class="form-control"  placeholder="Category Name Here">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Description</label>
                                        <textarea type="text" name="category_description" class="form-control"  placeholder="Category Description Here" rows="5"></textarea>
                                    </div>





                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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




