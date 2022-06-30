@extends('admin.adminmain')


@section('heading')

<h1>
    Agencies List
    
  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-12">
        <div class="box ">
           
                <div class="box-header">
                    <a href="{{route('agencies.create')}}" class="btn btn-info">Add Agency +</a>
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

             
                <th>Action</th>
           

              </tr>
              </thead>
              <tbody>

                @foreach ($agencies as $agency)
                <tr>
                    <td>{{$agency->id}}</td>
                    <td>{{$agency->name}}</td>
                    <td>{{$agency->email}}</td>
                    <td>{{$agency->license_no}}</td>
                    <td>{{$agency->Location}}</td>
                    <td>{{$agency->Contact_no}}</td>
              

                   

                        <td class="d-flex">

                                <a href="{{route('agencies.edit',$agency)}}">
                                <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>


                               
                                    <form action="{{ route('agencies.destroy',$agency->id) }}" method="post">
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
