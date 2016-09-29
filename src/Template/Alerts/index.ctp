<style>
.pb-box{
  margin-bottom:1px;
  margin-top:-2px
}
.nopadding{
  padding:0
}
</style>
<!-- Content Header (Page header) -->
<section >
    <div class="row">
    <div class="col-md-12">
      <div class="box pb-box">
          <div class="row" style="margin-top:5px">
            <!-- Date and time range -->
              <div class="form-group col-md-4" style="padding-right:0;">
                <div class="input-group" style="padding-top:7px;padding-left:10px">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                   <input id="alertdatetimerange" type="text" class="form-control">
                </div>
              </div>
              <!-- /.form group -->
              <div class="form-group col-md-3" style="float:left;padding-right:0;padding-top:7px;padding-left:10px">
                <select class="form-control select2" multiple="multiple">
                  <option value="0">All</option>
		             <option value="10">Stop</option>
		             <option value="7">No Movement</option>
		             <option value="6">Start</option>
		             <option value="2">Trip</option>
		             <option value="8">POI Visited</option>
		             <option value="5">Zone Alert</option>
		             <option value="11">Route Violation</option>
		             <option value="1">Over Speed</option>
		             <option value="16">Excessive acceleration</option>
		             <option value="15">Harsh Braking</option>
		             <option value="22">Night Driving</option>
		             <option value="9">Panic</option>
		             <option value="23">Fatique</option>
		             <option value="24">Exccess Time</option>
		             <option value="3">License Alert</option>
			           <option value="4">Maintenance Alert</option>
			           <option value="18">Battery</option>
			           <option value="19">Fuel level</option>
			           <option value="20">Sensor Alerts</option>
			           <option value="21">Relay Alerts</option>
			           <option value="17">Security</option>
			           <option value="12">Device Tamper</option>
			           <option value="13">Towing Alert</option>
			           <option value="25">Communication</option>
			           <option value="14">General Alert</option>
                </select>
              </div>
              <!-- /.form-group -->

              <div class="form-group col-md-4">
                <div class="input-group" style="float:left;padding-top:7px;padding-left:10px">
                  <div class="input-group-btn">
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Select Group
                       <span class="fa fa-caret-down"></span></button>
                     <ul class="dropdown-menu">
                       <li><a href="#">Aerofreight</a></li>
                       <li><a href="#">Aero Group</a></li>
                       <li><a href="#">Volvo Trucks</a></li>
                     </ul>
                   </div>
                   <!-- /btn-group -->
                   <input class="form-control" type="text" placeholder="Vehicle">
                 </div>
                <!-- /.input group -->
            <!-- /.col -->
              </div>
              </div>
              <!-- /.row -->
    </div>
  </div>
  <!-- /.row -->
  </div>
  <div class="mptl-map">
    <div id="map" style="height:100%; width: 100%; padding=0";></div>
  </div>
    </div>
</section>
<!-- /.content -->
<?php $this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/toastr/toastr.min'
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/daterangepicker/moment.min',
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/select2/select2.full.min',
    'AdminLTE./plugins/toastr/toastr.min'
],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
{
}
$(function () {

  $(".select2").select2({
    placeholder: "Select Alert Type",
    allowClear: true
  });

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

    // show when page load
      toastr.info('Page Loaded!');

      $('#linkButton').click(function() {
         // show when the button is clicked
         toastr.error('Harsh breaking from vehicle KL 01 BA 7478.');

      });

//Date range picker with time picker
  $('input[id="alertdatetimerange"]').daterangepicker({
    timePicker: true,
    timePickerIncrement: 10,
    locale: {
        format: 'DD/MM/YYYY h:mm A'
      }
    });
});

  function CenterMap(long, lat,zoom) {
     console.log("Long: " + long + " Lat: " + lat);
     map.getView().setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
     map.getView().setZoom(zoom);
   }
   var map=  new ol.Map({
     layers: [
       new ol.layer.Tile({source: new ol.source.OSM()})
     ],
     view: new ol.View({
       center: [0, 0],
       zoom: 0
     }),
     interactions: ol.interaction.defaults({mouseWheelZoom:false}),
     target: 'map'
   });
   CenterMap(78.5,25.6,8);
</script>
<?php $this->end(); ?>
