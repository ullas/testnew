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
              <div class="form-group col-md-3" style="padding-right:0;padding-top:7px;padding-left:10px margin-left:10px">
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
                     <ul class="dropdown-menu mptl-group">
                       <?php foreach ($groups as $object): ?>
                           <li><a href="#"> <?php echo $object ?></a></li>
                       
                        <?php endforeach; ?>
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
'AdminLTE./plugins/toastr/toastr.min',
'/css/font-awesome',
'/css/fontmaki',
'/js/ol/ext/control/overview',
'/js/ol/ext/control/controlbar',
'/js/ol/ext/control/layerswitcherimagecontrol'
],
['block' => 'css']); ?>

<?php $this->Html->script([
'AdminLTE./plugins/daterangepicker/moment.min',
'AdminLTE./plugins/daterangepicker/daterangepicker',
'AdminLTE./plugins/toastr/toastr.min',
'/js/ol/ext/utils/ol.ordering',
'/js/ol/ext/style/fontsymbol',
'/js/ol/ext/style/fontmaki.def',
'/js/ol/ext/style/fontawesome.def',
'/js/ol/ext/style/shadowstyle',
'/js/ol/ext/featureanimation/featureanimation',
'/js/ol/ext/featureanimation/dropanimation',
'/js/ol/ext/featureanimation/throwanimation',
'/js/ol/ext/featureanimation/bounceanimation',
'/js/ol/ext/control/layerswitchercontrol',
'/js/ol/ext/control/layerswitcherimagecontrol',
'/js/ol/ext/control/overview',
'/js/ol/ext/control/controlbar',
'/js/ol/ext/control/togglecontrol',
'/js/ol/ext/layer/getpreview',
'/js/ol/ext/utils/jspdfmin',
'/js/ol/ext/utils/jQExportMap',
'/js/maptell/notifications.js',

'AdminLTE./plugins/select2/select2.full.min',
'AdminLTE./plugins/toastr/toastr.min'
],
['block' => 'script']); ?>

<?php $this -> start('scriptBotton'); ?>
<script>
	function resizeMap() {
	}
   
	$(function() {
		$(".select2").select2({
			placeholder : "Select Alert Type",
			allowClear : true
		});
		toastr.options = {
			"closeButton" : true,
			"debug" : false,
			"newestOnTop" : true,
			"progressBar" : false,
			"positionClass" : "toast-bottom-center",
			"preventDuplicates" : false,
			"onclick" : null,
			"showDuration" : "300",
			"hideDuration" : "1000",
			"timeOut" : "5000",
			"extendedTimeOut" : "1000",
			"showEasing" : "swing",
			"hideEasing" : "linear",
			"showMethod" : "fadeIn",
			"hideMethod" : "fadeOut"
		}
		// show when page load

		
		//Date range picker with time picker
		$('input[id="alertdatetimerange"]').daterangepicker({
			timePicker : true,
			timePickerIncrement : 10,
			locale : {
				format : 'DD/MM/YYYY h:mm A'
			}
		});
		
		
	    $(".mptl-group li a").click(function(){
                 group= $(this).text();
                 
        });
		

	});

	function resizeMap() {

		map.removeLayer(vector);
		counter = 1;
		setTimeout(function() {
			map.updateSize();
			map.addLayer(vector);
		}, 2000);

	}
</script>
<?php $this -> end(); ?>