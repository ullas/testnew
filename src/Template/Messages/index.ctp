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
            <div class="form-group col-md-9">
              <div class="input-group col-md-5" style="float:left;padding-top:7px;padding-left:10px">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                 <input id="messagedatetimerange" type="text" class="form-control">
              </div>
              <div class="input-group col-md-4" style="float:left;padding-top:7px;padding-left:10px">
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
            </div>
            <!-- /.form group -->
            </div>
            <!-- /.row -->
  </div>
</div>
<!-- /.row -->
</div>
  <!-- /.row -->
  <div class="mptl-map">
    <div id="map" style="height:100%; width: 100%; padding=0";></div>
  </div>
</section>
<!-- /.content -->
<?php $this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker'
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/daterangepicker/moment.min',
    'AdminLTE./plugins/daterangepicker/daterangepicker',
],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
  {
  }
  $(function () {
  //Date range picker with time picker
    $('input[id="messagedatetimerange"]').daterangepicker({
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
