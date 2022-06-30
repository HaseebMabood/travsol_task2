@extends('admin.adminmain')


@section('heading')

<h1>
    Create User
    
  </h1>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">

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
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="number" class="form-control" id="" name="phone" placeholder="Phone" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" id="" name="address" placeholder="Address" required>
          </div>


        <div class="form-group">
          <label for="exampleInputFile">Image</label>
          <input type="file" name="image" id="exampleInputFile">
        </div>
       
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
@endsection