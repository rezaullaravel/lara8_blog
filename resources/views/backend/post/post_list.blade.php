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
                        <div class="col-md-10 col-md-offset-1">

                            <h2>Manage Post</h2>
                            <div class="box box-primary">

                               <div class="box-body">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Post Title</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Tag</th>
                                        <th class="text-center">Author</th>
                                        <th class="text-center">Image</th>
                                        <th class="text-center">Action</th>

                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($posts as $row)
                                        <tr>
                                            <td class="text-center">{{$row->id}}</td>
                                            <td class="text-center">{{$row->post_title}}</td>
                                            <td class="text-center">{{$row['categories']['category_name']}}</td>
                                            <td style="width:30%">

                                              @foreach ($row->tags as $tag)


                                                 <div class="tag-item">
                                                    <ul>
                                                        <li><a href="">{{$tag->tag_name}}</a></li>


                                                    </ul>
                                                 </div>

                                               @endforeach

                                            </td>
                                            <td class="text-center">{{$row['users']['name']}}</td>
                                            <td class="text-center">
                                                <img src="{{asset($row->post_image)}}" alt="" width="60" height="60">
                                            </td>


                                            <td class="text-center" width="20%">
                                                <a href="{{route('post.view',$row->id)}}" class="btn btn-success btn-sm" title="View"><i class="fa fa-eye-slash"></i></a>

                                                <a href="{{route('post.edit',$row->id)}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>

                                                <a href="{{route('post.delete',$row->id)}}" class="btn btn-info btn-sm" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>


                                          </tr>

                                        @endforeach

                                    </tbody>
                                  </table>

                                  {{$posts->links()}}
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




