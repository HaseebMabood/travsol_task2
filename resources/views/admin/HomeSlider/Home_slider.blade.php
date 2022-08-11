{{$row='';}}


<!-- //////////////////////////////////////////////////////////////// -->


@extends('admin.adminmain')


@section('heading')

@endsection

@section('content')
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
                    <h2>List Sliders</h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Sequence</th>
                                <th>Status</th>

                                @can('action')
                                <th>Action</th>
                                @endcan


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td>
                                    <img style="width:45px;height:45px;" class="img-circle" src="{{asset('public/upload_images/'.$slider->image)}}" alt="Slider Image">
                                </td>
                                <td>{{$slider->sequence}}</td>
                                <td>{{$slider->status}}</td>


                                <td>
                                    @can('action')
                                    <a href="edit_slider/{{$slider->id}}" type="button btn-info" class="btn btn-info">Edit</a>
                                    <a href="delete_slider/{{$slider->id}}" type="button" class="btn btn-danger">Delete</a>
                                    @endcan
                                </td>





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

    <div class="row">
        <div class="col-xs-12">

            <div class="box ">

                <div class="form-element-area">
                    <div class="container">


                        <div class="row">
                            <div class="col-lg-10 col-md-4 col-sm-4 col-xs-4">
                                <div class="form-element-list">
                                    <div class="basic-tb-hd">
                                    </div>
                                    <form role="form" method="post" action="add_slider" enctype="multipart/form-data">
                                        <!-- <input type="hidden" name="image" value="">
                                    <input type="hidden" name="id" value=""> -->
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label>Slider Image</label>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                                                <label for="inputId">
                                                    <input type="file" id='inputId' onchange="image_preview();" style="" accept="image/*" name="image" required>
                                                    <img id="img_preview" style="height:100px ;width:100px; display:none;" src="" alt="Image">
                                                    <!-- <img id="imgId" style="width:150px;height:auto; border:1px solid black"> -->
                                                    <!-- <input type="file" name="image" id="exampleInputFile"> -->
                                                </label>
                                            </div>
                                        </div> <!-- end of row -->

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Sequence</label>
                                                    <div class="nk-int-st">
                                                        <input type="number" class="form-control" name="sequence" required="" value="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <?php $status = array(0, 1);  ?>
                                                    <label>Status</label>
                                                    <select class="form-control" id="status" name="status" required>
                                                        <?php foreach ($status as $key => $value) : ?>
                                                            <option value="<?php echo $key; ?>" <?php if (!empty($row) && $row->status == $key) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $value; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <button type="submit" name="submit" value="submit" class="btn-primary btn-md btn-block btn notika-add-todo waves-effect"><?php echo ($row != '') ? 'Update' : 'Add' ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- summernote CSS -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>

    </div>
</section>
@endsection

<script>
    function image_preview() {
        document.getElementById("img_preview").style.display = 'block';
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("inputId").files[0]);

        oFReader.onload = function(oFREvent) {
            document.getElementById("img_preview").src = oFREvent.target.result;
        };
    }
</script>



<!-- ///////////////////////////////////////////////////////// -->
