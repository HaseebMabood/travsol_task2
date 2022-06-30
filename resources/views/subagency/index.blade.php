@extends('admin.adminmain')


@section('heading')

<h1>
    Sub Agencies List

  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-12">
        <div class="box ">

                <div class="box-header">
                    <a href="{{route('subagency.create')}}" class="btn btn-info">Add Sub Agency <i class="fa fa-plus"></i></a>
                </div>

          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>License No</th>
                <th>Location</th>
                <th>Contact_no </th>
                <th>Parent Agency </th>
                {{-- <th>Manager_id</th> --}}
                <th>Agency Users</th>
                <th>Action</th>


              </tr>
              </thead>
              <tbody>

                @foreach ($subagencies as $agency)
                <tr>
                    <td>{{$agency->id}}</td>
                    <td>{{$agency->name}}</td>
                    <td>{{$agency->email}}</td>
                    <td>{{$agency->license_no}}</td>
                    <td>{{$agency->location}}</td>
                    <td>{{$agency->contact_no}}</td>
                    <td>{{$agency->agencies->name}}</td>
                    {{-- <td>{{$agency->manager_id}}</td> --}}

                    <td>
                        <a href="{{url('usershow/'.$agency->id)}}" class=" btn btn-info">
                           Show Users</a>
                    </td>

                    {{-- Below is for checking ::Working fine --}}
        {{-- <?php dd($agency->agencies) ?> --}}

                        <td class="d-flex">

                                <a href="{{route('subagency.edit',$agency)}}">
                                <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>



                                    <form action="{{ route('subagency.destroy',$agency->id) }}" method="post">
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
