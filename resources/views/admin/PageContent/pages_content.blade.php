 {{$row='';}}


 <!-- //////////////////////////////////////////////////////////////// -->


 @extends('admin.adminmain')


 @section('heading')

 <h1>

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Page Contents
             <small>CMS</small>
         </h1>
         <!-- <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Forms</a></li>
             <li class="active">General Elements</li>
         </ol> -->
     </section>

 </h1>

 @endsection

 @section('content')


 <!-- Main content -->
 <section class="content">
     <div class="row ">
         <div class="col-xs-12">
             <div class="box ">
                 <!-- @can('create-page')
                 <div class="box-header">
                     <a href="" class="btn btn-info">Add page +</a>
                 </div>
                 @endcan -->

                 <div class="box-header">
                     <h2>List Pages</h2>
                 </div>
                 <!-- /.box-header -->
                 <div class="box-body table-responsive">
                     <table id="example2" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                 <td>Id</td>

                                 <td>Name</td>
                                 <td>Slugan</td>
                                 <td>Meta Title</td>
                                 <td>Meta Description</td>
                                 <td>Banner Text</td>
                                 <td>Banner Image</td>
                                 <td>Status</td>
                                 <td>Sequence</td>

                                 <td>Parent Id</td>
                                 @can('action')
                                 <th>Action</th>
                                 @endcan


                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($pages as $page)
                             <tr>
                                 <td>{{$page->id}}</td>
                                 <td>{{$page->name_cms}}</td>
                                 <td>{{$page->slug_cms}}</td>
                                 <td>{{$page->meta_title}}</td>
                                 <td>{{$page->meta_desc}}</td>
                                 <td>{{$page->banner_text}}</td>
                                 <td>
                                     <img style="width:45px;height:45px;" class="img-circle" src="{{asset('public/upload_images/'.$page->image)}}" alt="User Image">
                                 </td>
                                 <td>{{$page->status_cms}}</td>
                                 <td>{{$page->sequence}}</td>

                                 <td>{{$page->parent_id}}</td>
                                 <td>
                                     @can('action')
                                     <div class="d-flex">
                                        <div>
                                            <a href="edit_content/{{$page->id}}" type="button btn-info" class="btn btn-info">Edit</a>

                                        </div>

                                        <div style="margin-left: 8px">
                                             <a href="delete_content/{{$page->id}}" type="button" class="btn btn-danger">Delete</a>

                                        </div>
                                    </div>
                                     @endcan
                                 </td>




                                 {{-- <!-- @can('action')

                                 <td class="d-flex">

                                     <a href="{{route('users.edit',$page)}}">
                                         <i class=" btn btn-success btn-anim  btn-s fa fa-edit" style="height: 34px"></i></a>


                                     @if ($page->usertype=='0')
                                     <form action="{{ route('users.destroy',$page->id) }}" method="post">
                                         @csrf
                                         @method('delete')
                                         <button type="submit" class="btn btn-danger " style="margin-left: 10px"><i class="fa fa-trash btn-anim btn-s" style="height: 10px;"></i></button>
                                     </form>
                                     @endif

                                 </td>
                                 @endcan --> --}}
                             </tr>

                             @endforeach

                         </tbody>

                     </table>
                     <style>
                         .d-flex {
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




     <div class="row">
         <!-- left column -->
         <div class="col-md-12">
             <!-- general form elements -->
             <div class="box box-primary">
                 <div class="box-heading">
                     <h2>Add Page Content</h2>
                 </div>
                 <!-- form start -->
                 <form role="form" method="post" action="add_content" enctype="multipart/form-data">
                     @csrf
                     <div class="box-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="name">Name_cms</label>
                                     <input type="text" class="form-control" id="name" name="name" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="slug">Slug-cms</label>
                                     <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="meta_title">Meta Title</label>
                                     <input type="text" class="form-control" id="meta_title" placeholder="" name="meta_title">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="meta_desc">Meta Description</label>
                                     <input type="text" class="form-control" id="meta_desc" name="meta_desc" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="details">Details</label>
                                     <input type="text" class="form-control" id="details" name="details" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="banner_text">Banner Text</label>
                                     <input type="text" class="form-control" id="banner_text" name="banner_text" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="sequence">Sequence</label>
                                     <input type="number" class="form-control" id="sequence" name="sequence" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="parent_id">Parent_id</label>
                                     <input type="number" class="form-control" id="parent_id" name="parent_id" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <?php $status = array(0, 1);  ?>
                                     <label for="status">Status</label>
                                     <select class="form-control" id="status" name="status">
                                         <?php foreach ($status as $key => $value) : ?>
                                             <option value="<?php echo $key; ?>" <?php if (!empty($row) && $row->status == $key) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $value; ?></option>
                                         <?php endforeach; ?>
                                     </select>

                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="banner_image">Banner Image</label>
                                     <input type="file" id="banner_image" onchange="image_preview();" name="banner_image">
                                 </div>
                                 <img id="img_preview" style="height:100px ;width:100px; display:none;" src="" alt="Image">

                             </div>
                         </div>

                         <!-- <div class="checkbox">
                             <label>
                                 <input type="checkbox"> Check me out
                             </label>
                         </div> -->
                     </div>
                     <!-- /.box-body -->

                     <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                 </form>
             </div>
             <!-- /.box -->
         </div>
         <!--/.col (left) -->

     </div>
 </section>
 <!-- /.content -->


 @endsection


 <script>
     function image_preview() {
         document.getElementById("img_preview").style.display = 'block';
         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("banner_image").files[0]);

         oFReader.onload = function(oFREvent) {
             document.getElementById("img_preview").src = oFREvent.target.result;
         };

     }
 </script>