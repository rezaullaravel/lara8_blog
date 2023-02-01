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

                            <h2>View  Post Details</h2>
                            <div class="box box-primary">

                               <div class="box-body">
                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>
                                            <th style="width: 200px;">Post Title</th>
                                            <td>{{$post->post_title}}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px;">Post Category</th>
                                            <td>{{$post['categories']['category_name']}}</td>
                                        </tr>


                                        <tr>
                                            <th style="width: 200px;">Post Tag</th>
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                <div class="tag-item">
                                                    <ul>
                                                        <li><a href="">{{$tag->tag_name}}</a></li>


                                                    </ul>
                                                 </div>

                                                @endforeach
                                            </td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px;">Author Name</th>
                                            <td>{{$post['users']['name']}}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 200px;">Post Image</th>
                                            <td>
                                                <img src="{{asset($post->post_image)}}" alt="" width="500" height="300">
                                            </td>
                                        </tr>


                                        <tr>
                                            <th style="width: 200px;">Post Description</th>
                                            <td>{!!$post->post_description!!}</td>
                                        </tr>


                                    </tbody>
                                  </table>


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




