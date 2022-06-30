@extends('admin.adminmain')


@section('heading')

<h1>
    Create agency
    
  </h1>

@endsection

@section('content')
<div class="box box-primary">
    {{-- <div class="box-header with-border">
      <h3 class="box-title">Insert Data</h3>
    </div> --}}
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{route('agencies.store')}}" method="POST" >

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
            <label for="exampleInputPassword1">Contact</label>
            <input type="number" class="form-control" id="" name="contact" placeholder="Contact No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Liscense No</label>
            <input type="number" class="form-control" id="" name="license" placeholder="License No" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Location</label>
            <input type="text" class="form-control" id="" name="location" placeholder="Location" required>
          </div>


          <div class="form-group ">
            <label for="manager">Choose a manager</label><br>
             <select name="manager" id="manager" class="form-control">
                <option value="" disabled selected>--Select a manager--</option>
                 @foreach ($managers as $manager)
                 <option value="{{$manager->id}}">{{$manager->name}}</option>
                 @endforeach
                
             </select>
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