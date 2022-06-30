@extends('admin.adminmain')


@section('heading')

<h1>
    Permissions
    
  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-8">
        <div class="box ">

            <div class="box-header">
                <a href="{{route('permissions.index')}}" class="btn btn-info">Permission Index</a>
            </div>

            
            <div class="box-body table-responsive">
       
                <form role="form" action="{{route('permissions.update',$permission->id)}}" method="POST" >

                    @csrf
                    @method('put')
                  <div class="box-body">
            
                    <div class="form-group">
                        <label for="r_name">Permission</label>
                        <input type="text" class="form-control" name="name" id="r_name" placeholder="Give Permission" value="{{$permission->name}}" required>
                      </div>
            
                   
                  </div>
                  <!-- /.box-body -->
            
                  <div class="box-footer">
                    <button type="submit" class="btn btn-success">Update</button>
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
