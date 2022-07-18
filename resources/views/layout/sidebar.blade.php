<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel ">

            <div class="pull-left image">
                {{-- <a href="{{url('my-profile')}}"> --}}
                     <img src="{{asset('public/upload_images/'.Auth::user()->image)}}"  class="img-circle" alt="" style="height: 45px;">
                {{-- </a> --}}
            </div>


            <div class="pull-left info ">
                <b >
                <a href="{{url('my-profile')}}" style="color: rgb(137, 175, 197)">
                    {{ Auth::user()->name }}
                </a>

            </b>

                {{-- <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a> --}}
            </div>

    </div>
    <!-- search form -->
    {{-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> --}}
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu " data-widget="tree">
      <li class="header ">MAIN NAVIGATION</li>


      <li class="nav-item">
        <a class="nav-link {{Request::routeIs('home') ? 'active' : ''}}" href="{{url('home')}}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>


      <li class="nav-item" >
        <a class="nav-link  " href="{{url('reg_users')}}">
          <i class="fa fa-users"></i> <span>Users</span>
        </a>
      </li>

      @role('admin')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('roles')?'active':''}}" href="{{url('roles')}}">
          <i class="fa fa-user"></i> <span>Roles</span>
        </a>
      </li>

      <li class="nav-item" >
        <a class="nav-link {{Request::is('permissions')?'active':''}}" href="{{url('permissions')}}">
          <i class="fa fa-lock"></i> <span>Permissions</span>
        </a>
      </li>



      <li class="nav-item" >
        <a class="nav-link {{Request::is('agencies')?'active':''}}" href="{{route("agencies.index")}}">
          <i class="fa fa-building"></i> <span>Agencies</span>
        </a>
      </li>

      <li class="nav-item" >
        <a class="nav-link {{Request::is('subagencies_list')?'active':''}}" href="{{route("subagencies_list.index")}}">
          <i class="fa fa-building-o"></i> <span>Sub Agencies List</span>
        </a>
      </li>


      <li class="nav-item" >
        <a class="nav-link {{Request::is('index')?'active':''}}" href="{{url("index")}}">
          <i class="fa fa-check-circle"></i> <span>Balance Requests</span>
        </a>
      </li>


      <li class="nav-item" >
        <a class="nav-link {{Request::is('credit_index')?'active':''}}" href="{{url("credit_index")}}">
          <i class="fa fa-check-circle"></i> <span>Credit Requests</span>
        </a>
      </li>

      @endrole

      {{-- <li class="nav-item" {{Request::is('agency')?'active':''}}>
        <a class="nav-link" href="{{route("agency.index")}}">
          <i class="fa fa-user"></i> <span>Agency Detail</span>
        </a>
      </li> --}}


      {{-- These are the agents relevant to a specific agency admin who created them --}}
  
      {{-- @role('agency admin')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('agents_new')?'active':''}}" href="{{route("agents_new.index")}}">
          <i class="fa fa-user-secret"></i> <span>Agents</span>
        </a>
      </li>
      @endrole --}}


      {{-- These are all the Agents created by individual agency admins--}}
    
      {{-- @role('admin')
      <li class="nav-item" >
        <a class="nav-link {{Request::is('agents_all')?'active':''}}" href="{{url("/agents_all")}}">
          <i class="fa fa-user-secret"></i> <span>Agents</span>
        </a>
      </li>
      @endrole --}}



      {{-- this agency is related to their corresponding agency admin --}}
      @role('agency admin')

      <li class="nav-item" >
        <a class="nav-link {{Request::is('agency')?'active':''}}" href="{{route("agency.index")}}">
          <i class="fa fa-building"></i> <span>Agency</span>
        </a>
      </li>

      @endrole


      @role('agency admin')

      <li class="nav-item" >
        <a class="nav-link {{Request::is('subagency')?'active':''}}" href="{{route("subagency.index")}}">
          <i class="fa fa-building-o"></i> <span>Sub agency</span>
        </a>
      </li>


      <li class="nav-item" >
        <a class="nav-link {{Request::is('balance_req')?'active':''}}" href="{{url("balance_req")}}">
          <i class="fa fa-envelope"></i> <span>Balance Request</span>
        </a>
      </li>

      <li class="nav-item" >
        <a class="nav-link {{Request::is('credit_req')?'active':''}}" href="{{url("credit_req")}}">
          <i class="fa fa-envelope"></i> <span>Credit Request</span>
        </a>
      </li>

      @endrole
{{--
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Super Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Admin</a></li>
          <li><a href="{{route("agencies.index")}}"><i class="fa fa-circle-o"></i> Agencies</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> agency admin</a></li>

        </ul>
      </li>



      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>agency admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href=""><i class="fa fa-circle-o"></i> Agency</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Users</a></li>

        </ul>
      </li> --}}




    </ul>
  </section>
