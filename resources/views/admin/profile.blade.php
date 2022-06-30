@extends('admin.adminmain')


@section('heading')

<h1>
    {{Auth::user()->name}}'s Profile
    
  </h1>

@endsection

@section('content')
 <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Update Profile</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{url('profile-update/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
      <div class="box-body">

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{Auth::user()->name}}" placeholder="Enter name" required>
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="" value="{{Auth::user()->email}}" name="email" placeholder="Enter email" required>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="" value="{{Auth::user()->password}}" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="number" class="form-control" id="" value="{{Auth::user()->phone}}" name="phone" placeholder="Phone" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control" id="" value="{{Auth::user()->address}}" name="address" placeholder="Address" required>
          </div>


        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="" name="image" class="form-control">
        </div>
       
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update Profile</button>
      </div>
    </form>
  </div> 
  <!-- /.box -->
 
@endsection