@extends('admin.adminmain')


@section('heading')

<h1>
   Assigning Roles

  </h1>

@endsection

@section('content')
<section class="content">
    <div class="row ">
      <div class="col-xs-8">
        <div class="box ">

            <div class="box-header">
                <a href="{{url('/users')}}" class="btn btn-info">Back</a>
            </div>


            <div class="box-body table-responsive">

                <div style="display: flex; margin-bottom:20px">
                    @if ($user->roles)

                        @foreach ($user->roles as $user_role)

                            <form action="{{ route('role.revoke',[$user->id,$user_role->id]) }}" method="post"
                                onsubmit="return confirm('Are you sure To delete Role!');">
                                @csrf
                                @method('delete')
                               <button type="submit" class="btn btn-danger data-toggle="tooltip" data-placement="top" title="Delete" style="margin-left: 10px; ">{{$user_role->name}}</button>
                            </form>

                        @endforeach

                    @endif
                </div>


                <form role="form" action="{{url('role_asssigned_to_user/'.$user->id)}}" method="POST" >

                    @csrf

                  <div class="box-body">

                      <div class="form-group">
                            <label for="role">Roles</label><br>
                            <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
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




@endsection
