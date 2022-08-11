{{$row='';}}


<!-- //////////////////////////////////////////////////////////////// -->


@extends('admin.adminmain')


@section('heading')

<h1>
    Home Sliders Image Managment

</h1>

@endsection

@section('content')
<section class="content">


    <div class="container">

    </div>
    <!-- summernote CSS -->


    <div class="col-xs-8">

        <div class="box ">

            <div class="form-element-area">
                <div class="container">


                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-4">
                            <div class="form-element-list">
                                <div class="basic-tb-hd">
                                </div>
                                <form role="form" method="get" action="../update_slider/{{$slider->id}}" enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="image" value="">
                                    <input type="hidden" name="id" value=""> -->
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label>Slider Image</label>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                                            <label for="inputId">
                                                <input type="file" id='slider_image' onchange="image_preview();" style="" name="image">
                                                <img id="img_preview" style="height:100px ;width:100px;" src="{{asset('public/upload_images/'.$slider->image)}}" alt="Image">
                                                <!-- <input type="file" name="image" id="exampleInputFile"> -->
                                            </label>
                                        </div>
                                    </div> <!-- end of row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Sequence</label>
                                                <div class="nk-int-st">
                                                    <input type="number" class="form-control" name="sequence" required="" value="{{$slider->sequence}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <?php $status = array(0, 1);  ?>
                                                <label>Status</label>
                                                <select class="form-control" id="status" name="status" required>
                                                    <?php foreach ($status as $key => $value) : ?>
                                                        <option value="<?php echo $key; ?>" <?php if (!empty($slider) && $slider->status == $key) {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $value; ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <button type="submit" name="submit" value="submit" class="btn-primary btn-md btn-block btn notika-add-todo waves-effect"><?php echo ($slider != '') ? 'Update' : 'Add' ?></button>
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



    @endsection



    <script>
        function image_preview() {

            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("slider_image").files[0]);

            oFReader.onload = function(oFREvent) {
                document.getElementById("img_preview").src = oFREvent.target.result;
            };

        }
    </script>


    <!-- ///////////////////////////////////////////////////////// -->
