@extends('admin.adminmain')


@section('heading')

<h1>
    Users List

  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-12">
        <div class="box ">

                <div class="box-header">
                    <a href="{{route('subagencyusers.show',$subagency->id)}}" class="btn btn-info">Add User <i class="fa fa-user-plus"></i></a>
                </div>
{{-- <?php dd($subagency->id) ?> --}}
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover table-striped">
              <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>System_id</th>          
                <th>Phone No </th>
                <th>Address</th>
                <th>Subagency</th>
                <th>Image</th>

                <th>Action</th>


              </tr>
              </thead>
              <tbody>

                @foreach ($users as $agent)
               
                <tr>
                    <td>{{$agent->id}}</td>
                    <td>{{$agent->name}}</td>
                    <td>{{$agent->email}}</td>
                    <td>{{$agent->system_id}}</td>
                    <td>{{$agent->phone}}</td>
                    <td>{{$agent->address}}</td>
                    <td>{{$subagency->name}}</td>
                    {{-- <td>{{$agent->manager_id}}</td> --}}
                    <td>
                        <img src="{{asset('users/upload_images/'.$agent->image)}}" height="100px" width="100px" class="round" alt="">
                    </td>



                        <td class="d-flex">

                                <a href="{{route('subagencyusers.edit',$agent)}}">
                                <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>



                                    <form action="{{ route('subagencyusers.destroy',$agent->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger " style="margin-left: 10px"><i class="fa fa-trash btn-anim btn-s" style="height: 10px;"></i></button>
                                    </form>


                        </td>

                  </tr>
               
                @endforeach

              </tbody>

            </table>
            <style>
                .d-flex{
                    display: flex;
                }
            </style>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
