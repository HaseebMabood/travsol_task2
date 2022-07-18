@extends('admin.adminmain')


@section('heading')

<h1>
    Balance request

  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-12">
        <div class="box ">

                {{-- <div class="box-header">
                    <a href="{{route('agents_new.create')}}" class="btn btn-info">Add Agent +</a>
                </div> --}}

          <!-- /.box-header -->
          <div class="box-body">
         
            <form role="form" action="{{url('credit_req_sent')}}" method="POST" >

                @csrf
              <div class="box-body">
        
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount Credit in Pkr/</label>
                    <input type="number" class="form-control" name="amount" min="0" max="10000000" placeholder="Enter amount" required>
                  </div>
        
                  <div class="form-group ">
                    <label for="req_type">Choose a Request type</label><br>
                     <select name="req_type" id="req_type" class="form-control">
                        <option value="" disabled selected>--Select a manager--</option>
                         <option value="add">add credit</option>
                         <option value="subt">subtract credit</option>                         
                     </select>
                  </div>


                  <input type="hidden" class="form-control" id="" name="agency_id" value="{{$agency->id}}">

                  <input type="hidden" class="form-control" id="" name="agency_name" value="{{$agency->name}}">

                  {{-- <input type="hidden" class="form-control" id="" name="admin_id" value="{{Auth::id()}}"> --}}
        
              
               
              </div>
              <!-- /.box-body -->
        
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send Request</button>
              </div>
            </form>
         
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
