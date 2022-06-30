@extends('admin.adminmain')


@section('heading')

<h1>
    Create Agency Users

  </h1>

  <div class="card-header bg-secondary text-white">
   
        <a href="{{url('usershow/'.$subagency->id)}}" class="btn btn-primary" style="margin-top:15px">Back <i class="fa fa-arrow-left"></i></a>

</div>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('subagencyusers.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
      <div class="box-body">

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="" placeholder="Enter name" required>
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="" name="email" placeholder="Enter email" required>
        </div>


          <div class="form-group">
            <label for="exampleInputPassword1">System_id</label>
            <input type="number" class="form-control" id="" name="system_id" placeholder="System ID" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Phone no</label>
            <input type="number" class="form-control" id="" name="phone" placeholder="Phone No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" id="" placeholder="Enter address" required>
          </div>

          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
          </div>


          <input type="hidden" class="form-control" id="" name="subagency_id" value="{{$subagency->id}}">





      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
@endsection
