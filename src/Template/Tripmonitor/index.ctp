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
