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
       
                <form role="form" action="{{route('roles.update',$role->id)}}" method="POST" >

                    @csrf
                    @method('put')
                  <div class="box-body">
            
                    <div class="form-group">
                        <label for="r_name">Role</label>
                        <input type="text" class="form-control" name="name" id="r_name" placeholder="Enter role" value="{{$role->name}}" required>
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













    {{-- Permission Asigning View --}}

    <div class="row ">
        <div class="col-xs-8">
          <div class="box ">
  
              
              <div class="box-body table-responsive">
         
                 
                    <div class="box-body">
              
                        <div style="display: flex; margin-bottom:20px">
                            @if ($role->permissions)

                                @foreach ($role->permissions as $role_perm)
                                   
                                    <form action="{{ route('permission.revoke',[$role->id,$role_perm->id]) }}" method="post" ">
                                        @csrf
                                        @method('delete')
                                       <button type="submit" class="btn btn-danger " style="margin-left: 10px; ">{{$role_perm->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div>


                <form role="form" action="{{route('roles.permission',$role->id)}}" method="POST" >
  
                            @csrf
                           
                      <div class="form-group ">
                          <label for="permission">Permission</label><br>
                           <select name="permission" id="permission" class="form-control">
                            <option value="" disabled selected>--Select a permission--</option>
                               @foreach ($permissions as $permission)
                               <option value="{{$permission->name}}">{{$permission->name}}</option>
                               @endforeach
                              
                           </select>
                        </div>
              
                     
                    </div>
                    <!-- /.box-body -->
              
                    <div class="box-footer">
                      <button type="submit" class="btn btn-success">Assign</button>
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
