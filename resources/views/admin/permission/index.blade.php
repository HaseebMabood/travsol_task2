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
                <a href="{{route('permissions.create')}}" class="btn btn-info">Create Permissions</a>
            </div>
  
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    
                    <th>Name</th>
                    <th>Action</th>
                   
                  
    
                    
    
                  </tr>
                  </thead>
                  <tbody>
    
                    @foreach ($permissions as $permission)
                        <tr>
                        
                            <td>{{$permission->name}}</td>
                        
                            <td class="d-flex">

                                <a href="{{route('permissions.edit',$permission)}}">
                                <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>


                               
                                    <form action="{{ route('permissions.destroy',$permission->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger " style="margin-left: 10px"><i class="fa fa-trash btn-anim btn-s" style="height: 10px;"></i></button>
                                    </form>
                               

                        </td>           
                        
                        </tr>
    
                    @endforeach
    
                  </tbody>
    
                </table>
           
                <style>
                    .d-flex{
                        display: flex;
                    }
                </style>


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
