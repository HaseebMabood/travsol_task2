@extends('admin.adminmain')


@section('heading')

<h1>
    Roles
    
  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-8">
        <div class="box ">

            <div class="box-header">
                <a href="{{route('roles.index')}}" class="btn btn-info">Role Index</a>
            </div>

            
            <div class="box-body table-responsive">
       
                <form role="form" action="{{route('roles.store')}}" method="POST" >

                    @csrf
                  <div class="box-body">
            
                    <div class="form-group">
                        <label for="r_name">Role</label>
                        <input type="text" class="form-control" name="name" id="r_name" placeholder="Enter role" required>
                      </div>
            
                   
                  </div>
                  <!-- /.box-body -->
            
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">Create</button>
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
