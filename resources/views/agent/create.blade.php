@extends('admin.adminmain')


@section('heading')

<h1>
    Create agent

  </h1>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('agents_new.store')}}" method="POST" enctype="multipart/form-data">

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
            <label for="">Image</label>
            <input type="file" name="image" class="form-control">
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
