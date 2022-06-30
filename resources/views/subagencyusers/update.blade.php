@extends('admin.adminmain')


@section('heading')

<h1>
    Update agency user

  </h1>

  <div class="card-header bg-secondary text-white">
   
    <a href="{{url('usershow/'.$agency->subagency->id)}}" class="btn btn-primary" style="margin-top:15px">Back <i class="fa fa-arrow-left"></i></a>

</div>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('subagencyusers.update',$agency->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
      <div class="box-body">

        {{-- Working perfectly ...Checking that id of its relevant agency can grab or not --}}
        {{-- <?php dd($agency->subagency->id) ?> --}}



        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" value="{{$agency->name}}" name="name" id="" placeholder="Enter name" required>
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="" value="{{$agency->email}}" name="email" placeholder="Enter email" required>
        </div>


          <div class="form-group">
            <label for="exampleInputPassword1">System_id</label>
            <input type="number" class="form-control" id="" value="{{$agency->system_id}}" name="system_id" placeholder="System ID" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Phone no</label>
            <input type="number" class="form-control" id="" value="{{$agency->phone}}" name="phone" placeholder="Phone No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" id="" value="{{$agency->address}}" placeholder="Enter address" required>
          </div>

          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
          </div>

          <input type="hidden" class="form-control" id="" name="subagency_id" value="{{$agency->subagency->id}}">
          




      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
@endsection
