 {{$row='';}}


 <!-- //////////////////////////////////////////////////////////////// -->


 @extends('admin.adminmain')


 @section('heading')

 <h1>

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             Markups
             <small>page</small>
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
     <!-- /.row -->
     <div class="row">
         <!-- left column -->
         <div class="col-md-12">
             <!-- general form elements -->
             <div class="box box-primary" style="padding: 3rem;">
                 <div class="box-heading">
                     <h2>Add Markup</h2>
                 </div>
                 <!-- form start -->
                 <form role="form" method="get" action="../update_markup/{{$markup->id}}" enctype="multipart/form-data" autocomplete="off" onsubmit="return validateForm(this);">
                     @csrf

                     <input type="hidden" name="pre_userId" value="{{Auth::id();}}">




                     <div class="row">

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Markup Name</label>
                                 <div class="nk-int-st">
                                     <input type="text" class="form-control" name="pre_name" required="" value="{{$markup->name}}">
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Supplier</label>
                                 <div class="nk-int-st">
                                     <select name="pre_supplier" id="supplier" class="form-control">
                                         <option <?php echo $markup->supplier == '4' ? 'selected' : '' ?> value="4">All</option>
                                         <option <?php echo $markup->supplier == '1' ? 'selected' : '' ?> value="1">Galelio</option>
                                         <option <?php echo $markup->supplier == '2' ? 'selected' : '' ?> value="2">Airblue</option>
                                         <option <?php echo $markup->supplier == '3' ? 'selected' : '' ?> value="3">Serene</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Status</label>
                                 <div class="nk-int-st">
                                     <select name="pre_status" id="status" class="form-control">
                                         <option <?php echo $markup->status == '1' ? 'selected' : '' ?> value="1">Active</option>
                                         <option <?php echo $markup->status == '0' ? 'selected' : '' ?> value="0">Inactive</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Priority</label>
                                 <div class="nk-int-st">
                                     <input type="text" class="form-control" value="{{$markup->priority}}" name="pre_priority" required="">
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 markup_byDiv">
                             <div class="form-group">
                                 <label>Markup By</label>
                                 <div class="nk-int-st">
                                     <select name="pre_markup_by" id="markup_by" class="form-control">
                                         <option <?php echo $markup->markup_by == 'All Airlines' ? 'selected' : '' ?> value="All Airlines">All Airlines</option>
                                         <option <?php echo $markup->markup_by == 'Specific' ? 'selected' : '' ?> value="Specific">Specific Airline</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Markup Type</label>
                                 <div class="nk-int-st">
                                     <select name="pre_markup_type" id="markup_type" class="form-control">
                                         <option <?php echo $markup->markup_type == 'p' ? 'selected' : '' ?> value="p">Percentage</option>
                                         <option <?php echo $markup->markup_type == 'f' ? 'selected' : '' ?> value="f">Fix Amount</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Markup On</label>
                                 <div class="nk-int-st">
                                     <select name="pre_markup_on" id="markup_on" class="form-control">
                                         <option <?php echo $markup->markup_on == 'base' ? 'selected' : '' ?> value="base">Base Fare</option>
                                         <option <?php echo $markup->markup_on == 'total' ? 'selected' : '' ?> value="total">Total Fare</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Markup</label>
                                 <div class="nk-int-st">
                                     <input type="text" class="form-control" value="{{$markup->markup_val}}" name="pre_markup_val" required="">
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row paxDiv">
                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Pax Types</label>
                                 <div class="nk-int-st">
                                     <?php $rowPaxTypes = explode(',', $markup->pax_types); ?>
                                     <input type="checkbox" class="pax_types" name="pax_types[]" value="ADT" <?php echo in_array('ADT', $rowPaxTypes) ? 'checked' : '' ?>> Adult
                                     <input type="checkbox" class="pax_types" name="pax_types[]" value="CNN" <?php echo in_array('CNN', $rowPaxTypes) ? 'checked' : '' ?>> Child
                                     <input type="checkbox" class="pax_types" name="pax_types[]" value="INF" <?php echo in_array('INF', $rowPaxTypes) ? 'checked' : '' ?>> Infant
                                     <input type="checkbox" class="pax_types" name="pax_types[]" value="All" <?php echo in_array('All', $rowPaxTypes) ? 'checked' : '' ?>> All
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Origin Airports</label>
                                 <div class="nk-int-st">
                                     <?php $origins = explode(",", $markup->origins); ?>
                                     <input type="text" class="form-control origins" name="pre_origins" placeholder="Airport Codes (Multiple)" value="<?php echo implode(',', $origins); ?>">

                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Destination Airports</label>
                                 <div class="nk-int-st">
                                     <?php $destinations = explode(",", $markup->destinations); ?>
                                     <input type="text" class="form-control destinations" name="pre_destinations" placeholder="Airport Codes (Multiple)" value="<?php echo implode(',', $destinations); ?>">

                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 carriersDiv d-none">
                             <div class="form-group">
                                 <label>Airlines / Carriers</label>
                                 <div class="nk-int-st">
                                     <?php $carriersArr = explode(",", $markup->carriers); ?>
                                     <input type="text" class="form-control carriers" name="pre_carriers" placeholder="Carrier Codes (Multiple)" value="<?php echo implode(',', $carriersArr); ?>">


                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 classesDiv">
                             <div class="form-group">
                                 <label>Class of Services</label>
                                 <div class="nk-int-st">
                                     <?php $classes = explode(",", $markup->classes); ?>
                                     <input type="text" class="form-control classes" name="pre_classes" data-role="tagsinput" placeholder="Classes (Multiple)" value="<?php echo implode(',', $classes); ?>">

                                 </div>
                             </div>
                         </div>

                         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label>Trip Type</label>
                                 <div class="nk-int-st">
                                     <select name="pre_trip_type" id="trip_type" class="form-control">
                                         <option <?php echo $markup->trip_type == 'all' ? 'selected' : '' ?> value="all">All</option>
                                         <option <?php echo $markup->trip_type == 'oneWay' ? 'selected' : '' ?> value="oneWay">One Way</option>
                                         <option <?php echo $markup->trip_type == 'roundTrip' ? 'selected' : '' ?> value="roundTrip">Round Trip</option>
                                         <option <?php echo $markup->trip_type == 'multiCity' ? 'selected' : '' ?> value="multiCity">Multi</option>
                                     </select>
                                 </div>
                             </div>
                         </div>

                     </div>

                     <div class="row">

                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                             <button type="submit" name="submit" value="submit" class="btn-primary btn-md btn-block btn "><?php echo ($markup != '') ? 'Update' : 'Add' ?></button>
                         </div>
                     </div>
                 </form>

             </div>
             <!-- /.box -->
         </div>
         <!--/.col (left) -->

     </div>
 </section>
 <!-- /.content -->



 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <!-- BOOTSTRAP TAGS INPUT -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
 <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
 <style type="text/css">
     .bootstrap-tagsinput>input {
         /*border: none !important;*/
         text-transform: uppercase !important;
     }

     .bootstrap-tagsinput {
         width: 100% !important;
     }

     .bootstrap-tagsinput {
         background-color: #fff;
         border: none !important;
         box-shadow: none !important;
         border-bottom: 1px solid #ccc !important;
         display: inline-block;
         padding: 4px 6px;
         color: #555;
         vertical-align: middle;
         border-radius: 4px;
         max-width: 100%;
         line-height: 22px;
         cursor: text;
     }

     .bootstrap-tagsinput .tag {
         margin-right: 2px;
         color: white;
     }

     .label-info {
         /*background-color: #5bc0de;*/
         background-color: #dc9133;
     }

     .label {
         display: inline;
         padding: .2em .6em .3em;
         font-size: 75%;
         font-weight: 700;
         line-height: 1;
         color: #fff;
         text-align: center;
         white-space: nowrap;
         vertical-align: baseline;
         border-radius: .25em;
     }
 </style>

 <script>
     // setTimeout(function() {
     //   $('.bootstrap-tagsinput').children('input').removeAttr('style');
     // }, 1000);
 </script>

 <!-- <script src="https://rawgit.com/twitter/typeahead.js/master/dist/bloodhound.min.js"></script>
<script src="{{url('/')}}/assets/js/typeahead.js" type="text/javascript"></script> -->
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js" type="text/javascript"></script>
 <script>
     var url = "{{url('/')}}";
     var autoComplete = [];
     $.get(url + "/airports.json", function(data) {

         for (var i = 0, len = data.length; i < len; i++) {

             autoComplete.push(data[i].code);

         }
     });
     var airPortCodes = new Bloodhound({
         datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
         queryTokenizer: Bloodhound.tokenizers.whitespace,
         prefetch: {
             url: url + "/airports.json",
             filter: function(list) {
                 return $.map(list, function(airport) {
                     return {
                         name: airport.code
                     };
                 });
             }
         }
     });
     airPortCodes.initialize();

     $('.origins, .destinations').tagsinput({
         typeaheadjs: {
             name: 'airPortCodes',
             displayKey: 'name',
             valueKey: 'name',
             source: airPortCodes.ttAdapter()
         }
     });



     $(document).on('DOMNodeInserted', function(e) {
         $('.bootstrap-tagsinput').children('input').removeAttr('style');
         $('.bootstrap-tagsinput').children('input').css('text-transform', 'uppercase');
         $('.tt-input').css('border-bottom', 'none');
         $('.tt-menu').css({
             background: '#fff',
             width: '100px'
         });

     });

     var airLinesAC = [];
     $.getJSON(url + "/airlines.json", function(data) {

         for (var i = 0, len = data.length; i < len; i++) {
             var airlineCode = data[i].split(',')[0];

             airLinesAC.push({
                 "value": airlineCode
             });

         }
         var airLineCodes = new Bloodhound({
             datumTokenizer: function(d) {
                 return Bloodhound.tokenizers.whitespace(d.value);
             },
             queryTokenizer: Bloodhound.tokenizers.whitespace,
             local: airLinesAC
         });
         airLineCodes.initialize();
         $('.carriers').tagsinput({
             typeaheadjs: {
                 name: 'airLineCodes',
                 displayKey: 'value',
                 valueKey: 'value',
                 source: airLineCodes.ttAdapter()
             }
         });
     });

     var srvCalsses = new Bloodhound({
         datumTokenizer: function(d) {
             return Bloodhound.tokenizers.whitespace(d.value);
         },
         queryTokenizer: Bloodhound.tokenizers.whitespace,
         local: [{
                 "value": "Economy"
             },
             {
                 "value": "PremiumFirst"
             },
             {
                 "value": "First"
             },
             {
                 "value": "Business"
             },
             {
                 "value": "Upper"
             },
             {
                 "value": "PremiumEconomy"
             },
         ]
     });
     srvCalsses.initialize();
     $('.classes').tagsinput({
         typeaheadjs: {
             name: 'srvCalsses',
             displayKey: 'value',
             valueKey: 'value',
             source: srvCalsses.ttAdapter()
         }
     });

     // 
     $('#supplier').on('change', function(event) {
         var supplier = $(this).val();
         if (supplier == '2' || supplier == '3') {
             $('.classesDiv, .markup_byDiv').addClass('d-none');
             $('#markup_by').val('All Airlines');
             $('#markup_on').val('total');
             $("#markup_on option").not(":selected").attr("disabled", "disabled");
             $('.pax_types[value!="All"]').prop('checked', false);
             $('.pax_types[value="All"]').prop('checked', true);
             $('.paxDiv').hide();
         } else {
             $('.classesDiv, .markup_byDiv').removeClass('d-none');
             $("#markup_on option").not(":selected").attr("disabled", false);
             $('.paxDiv').show();
         }
     });

     $('#markup_by').on('change', function(event) {
         var supplier = $('#supplier').val();
         if (supplier == '1') {
             $('.classesDiv').removeClass('d-none');
             if ($(this).val() == 'Specific') {
                 $('.carriersDiv').removeClass('d-none');
             } else {
                 $('.carriersDiv').addClass('d-none');
             }
         } else {
             $('.classesDiv').addClass('d-none');
         }
     });

     $('.pax_types').on('change', function(event) {
         if ($(this).prop('checked') == true) {
             if ($(this).val() != 'All') {
                 $('.pax_types[value="All"]').prop('checked', false)
             } else {
                 $.each($('.pax_types'), function(index, val) {
                     if ($(this).val() != 'All') {
                         $(this).prop('checked', false)
                     }
                 });
             }
         }
         var checked = false;
         $.each($('.pax_types'), function(index, val) {
             if ($(this).prop('checked') == true) {
                 checked = true;

             }
         });
         if (checked != true) {
             alert('One of Pax Types is mandatory');
             $(this).prop('checked', true);
         }
     });

     function validateForm(frm) {
         // CHECK CARRIERS ONLY
         var markup_by = $('#markup_by').val()
         if (markup_by == 'Specific') {
             if ($('.carriers').val() == "") {
                 alert("Please select atleast one carrier");
                 return false;
             }
         }
         return true;
     }
 </script>
 @endsection