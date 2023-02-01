@extends('admin.admin_master')

@section('content')



        <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->



                <!-- Main content -->
                <section class="content">


                   <div class="container" style="margin-top:50px;">
                      <div class="row" >
                        <div class="col-md-8 col-md-offset-2">

                            <h2>Manage Tag</h2>
                            <div class="box box-primary">

                               <div class="box-body">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Tag Name</th>
                                        <th class="text-center">Tag Slug</th>
                                        <th class="text-center">Count Post</th>
                                        <th class="text-center">Action</th>

                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tags as $row)
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td class="text-center">{{$row->tag_name}}</td>
                                            <td class="text-center">{{$row->tag_slug}}</td>
                                            <td class="text-center">{{$row->id}}</td>


                                            <td class="text-center">
                                                <a href="{{route('tag.edit',$row->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('tag.delete',$row->id)}}" class="btn btn-primary btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                            </td>


                                          </tr>

                                        @endforeach

                                    </tbody>
                                  </table>

                                  {{$tags->links()}}
                               </div>{{--box body--}}




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




