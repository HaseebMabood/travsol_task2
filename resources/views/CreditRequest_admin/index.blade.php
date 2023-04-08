@extends('admin.adminmain')


@section('heading')

<h1>
    Credit Request History

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
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover table-striped">
              <thead>
              <tr>
                {{-- <th>Id</th> --}}

                <th>Agency Admin</th>
                <th>Agency</th>
                <th>Credit Amount</th>
                <th>Request Type</th>
                <th>Date</th>

                <th>Action</th>


              </tr>
              </thead>
              <tbody>

                @foreach ($data as $data)

                <tr>
                    <td>{{$data->admin_name}}</td>
                    <td>{{$data->agency_name}}</td>
                    <td>{{$data->req_amount}}</td>
                    <td>{{$data->credit_req_type}}</td>
                    <td>{{$data->created_at}}</td>




                    @if ($data->status == '1')

                        <td>
                            <span class="badge " style="background-color: green">Approved</span>
                        </td>

                    @elseif ($data->status == '2')
                        <td>
                            <span class="badge " style="background-color: red">Rejected</span>
                        </td>

                    @else
                        <td >

                            <a href="{{url('add_credit/'.$data->id)}}">
                                <span class="badge " style="background-color: green">Approve</span></a>


                            <a href="{{url('reject_credit_req',$data->id)}}" style="margin-left:10px">
                                <span class="badge" style="background-color: red" >Reject</span></a>

                        </td>
                    @endif


                  </tr>

                @endforeach

              </tbody>

            </table>

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
