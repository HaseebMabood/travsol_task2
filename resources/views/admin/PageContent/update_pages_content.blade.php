 {{$row='';}}


 <!-- //////////////////////////////////////////////////////////////// -->


 @extends('admin.adminmain')


 @section('heading')

 <h1>

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             General Form Elements
             <small>Preview</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Forms</a></li>
             <li class="active">General Elements</li>
         </ol>
     </section>

 </h1>

 @endsection

 @section('content')


 <!-- Main content -->
 <section class="content">





     <div class="row">
         <!-- left column -->
         <div class="col-md-12">
             <!-- general form elements -->
             <div class="box box-primary">
                 <!-- form start -->
                 <form role="form" method="get" action="../update_content/{{$page->id}}" enctype="multipart/form-data">
                     @csrf
                     <div class="box-body">
                         <div class="form-group">
                             <!-- <input type="text" class="form-control" disabled value="{{$page->id}}" name="id"> -->
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="name">Name_cms</label>
                                     <input type="text" class="form-control" value="{{$page->name_cms}}" id="name" name="name" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="slug">Slug-cms</label>
                                     <input type="text" class="form-control" value="{{$page->slug_cms}}" id="slug" name="slug" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="meta_title">Meta Title</label>
                                     <input type="text" class="form-control" id="meta_title" value="{{$page->meta_title}}" placeholder="" name="meta_title">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="meta_desc">Meta Description</label>
                                     <input type="text" class="form-control" id="meta_desc" value="{{$page->meta_desc}}" name="meta_desc" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="details">Details</label>
                                     <input type="text" class="form-control" id="details" value="{{$page->details}}" name="details" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="banner_text">Banner Text</label>
                                     <input type="text" class="form-control" id="banner_text" value="{{$page->banner_text}}" name="banner_text" placeholder="">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="sequence">Sequence</label>
                                     <input type="number" class="form-control" id="sequence" value="{{$page->sequence}}" name="sequence" placeholder="">
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="parent_id">Parent_id</label>
                                     <input type="number" class="form-control" id="parent_id" value="{{$page->parent_id}}" name="parent_id" placeholder="">
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
                                             <option value="<?php echo $key; ?>" <?php if ($page->status_cms == $value) {
                                                                                        echo "selected";
                                                                                    } ?>><?php echo $value; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                     <!-- {{$page->status}} -->
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="banner_image">Banner Image</label>
                                     <input type="file" value="{{$page->image}}" onchange="image_preview();" id="banner_image" name="banner_image">


                                 </div>
                                 <img id="img_preview" style="height:100px ;width:100px;" src="{{asset('public/upload_images/'.$page->image)}}" alt="Image">
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

         var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("banner_image").files[0]);

         oFReader.onload = function(oFREvent) {
             document.getElementById("img_preview").src = oFREvent.target.result;
         };

     }
 </script>