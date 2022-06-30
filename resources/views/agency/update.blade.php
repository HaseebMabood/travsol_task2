@extends('admin.adminmain')


@section('heading')

<h1>
    Update agency
    
  </h1>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('agencies.update',$agency->id)}}" method="POST" >

        @csrf
        @method('put')
      <div class="box-body">

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$agency->name}}" placeholder="Enter name" required>
          </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="" name="email" value="{{$agency->email}}" placeholder="Enter email" required>
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">Contact</label>
            <input type="number" class="form-control" id="" name="contact" value="{{$agency->Contact_no}}" placeholder="Contact No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Liscense No</label>
            <input type="number" class="form-control" id="" name="license" value="{{$agency->license_no}}" placeholder="License No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Location</label>
            <input type="text" class="form-control" id="" name="location" value="{{$agency->Location}}" placeholder="Location" required>
          </div>


          <div class="form-group ">
            <label for="manager">Choose a manager</label><br>
             <select name="manager" id="manager" class="form-control">
                
                 @foreach ($managers as $manager)
                
                 <option value="{{$manager->id}}" {{($manager->id == $agency->manager_id) ? 'selected' : '' }}>{{$manager->name}}</option>
                 @endforeach
                
             </select>
          </div>


      
       
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
@endsection