@extends('admin.adminmain')


@section('heading')

<div class="col-md-6">
  <h3>
    Role Update and Assign Permission
  </h3>
</div>

@endsection

@section('content')
<section class="content">
  <div class="row" style="margin-bottom: 10px">
    <div class="col-md-6" style="float: left;">
      <a href="{{route('roles.index')}}" style="float: right;" class="btn btn-info">List Roles</a>
    </div>
  </div>



  <div class="row ">
    <div class="col-xs-6">
      <div class="box">

        <div class="box-body table-responsive">

          <form role="form" action="{{route('roles.update',$role->id)}}" method="POST">

            @csrf
            @method('put')
            <div class="form-group">
              <label for="r_name">Role Name</label>
              <input type="text" class="form-control" name="name" id="r_name" placeholder="Enter role" value="{{$role->name}}" required>
            </div>



            <!-- /.box-body -->

            <div class="form-group">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </form>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <!-- /.col -->
    <div class="col-xs-6">
      <div class="box ">




        <div class="box-body table-responsive">

          <form role="form" action="{{route('roles.permission',$role->id)}}" method="POST">

            @csrf

            <div class="form-group ">
              <label for="permission">Permission</label><br>
              <select name="permission" id="permission" class="form-control">
                @foreach ($permissions as $permission)
                <option value="{{$permission->name}}">{{$permission->slug}}</option>
                @endforeach

              </select>
            </div>
            <div class="form-group">
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













  {{-- Permission Asigning View --}}

  <div class="row ">
    <div class="col-xs-12">
      <div class="box ">


        <div class="box-body table-responsive">
          <div class="box-header">
            <h4><b>Assigned permissions</b></h4>
          </div>

          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <tr>
                <th>Permission Name</th>
                <th>Action</th>
              </tr>
              @if ($role->permissions)

              @foreach ($role->permissions as $role_perm)
              <tr>
                <td>{{$role_perm->slug}}</td>
                <td>
                  <form action="{{ route('permission.revoke',[$role->id,$role_perm->id]) }}" method="post" ">
                                        @csrf
                                        @method('delete')
                                       <button type=" submit" class="btn btn-danger " style="margin-left: 10px; "><i class="fa fa-trash btn-anim btn-s" style="height: 10px;"></i></button>
                  </form>
                </td>
              </tr>

              @endforeach

              @endif
            </table>

            <!-- <div style="display: flex; margin-bottom:20px">
                            @if ($role->permissions)

                                @foreach ($role->permissions as $role_perm)
                                   
                                    <form action="{{ route('permission.revoke',[$role->id,$role_perm->id]) }}" method="post" ">
                                        @csrf
                                        @method('delete')
                                       <button type="submit" class="btn btn-danger " style="margin-left: 10px; ">{{$role_perm->name}}</button>
                                    </form>
                                    
                                @endforeach
                                
                            @endif
                        </div> -->



          </div>
          <!-- /.box-body -->



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