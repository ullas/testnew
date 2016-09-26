<style>
.irs-with-grid{
  height:52px
}
.pb-box{
  margin-bottom:1px;
  margin-top:-2px
}
.nopadding{
  padding:0
}
.btn-app{
  min-height:50px;
  height:50px;
  min-width:55px;
  padding:17px 5px;
  margin:0 0 5px 10px
}
.btn-app .fa{
  font-size:12px
}

</style>
    <!-- Main content -->
    <section >
        <div class="row">
        <div class="col-md-12">
          <div class="box pb-box">
              <div class="row " style="margin-top:5px">
               <div class="col-md-2 datepick" style="padding-left:25px">
                	    <input type="text" class="form-control" style="margin-top:5px">
                </div>
                <div class="col-md-4">
                  <input id="range_2" type="text" name="range_2"  data-type="double" data-step="0.5"  data-from="0" data-to="24" data-hasgrid="true">
                </div>

                 <div class="col-md-6">

		            <div class="box-body nopadding">

		              <a class="btn btn-app">
		                <i class="fa fa-play"></i> Play
		              </a>
                  <!-- <a class="btn btn-app">
		                <i class="fa fa-pause"></i> Play
		              </a> -->
                  <a class="btn btn-app">
		                <i class="fa fa-repeat"></i> Repeat
		              </a>
		              <a class="btn btn-app">
		                <i class="fa fa-backward"></i> Rewind
		              </a>
		              <a class="btn btn-app">
		                <i class="fa fa-forward"></i> Forward
		              </a>
		            </div>
                </div>
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
            <div class="mptl-map">
              <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
    </section>
    <!-- /.content -->

<?php $this->Html->css([
    'AdminLTE./plugins/ionslider/ion.rangeSlider',
    'AdminLTE./plugins/ionslider/ion.rangeSlider.skinNice',
    'AdminLTE./plugins/bootstrap-slider/slider',
    'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min'
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/ionslider/ion.rangeSlider.min',
    'AdminLTE./plugins/bootstrap-slider/bootstrap-slider',
     'AdminLTE./plugins/bootstrap-datepicker/bootstrap-datepicker.min'

],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
{



}
  $(function () {

    $('.datepick input').datepicker({
    });

  var slider=  $("#range_2").ionRangeSlider({
    min: 0,
    max: 24,

    grid: true,
    grid_num: 1,
    postfix: 'hr'

   });

    var updateSliderScale;
$(window).resize(function(){
    clearTimeout(updateSliderScale);
    updateSliderScale = setTimeout(function(){
        $(slider).ionRangeSlider('update');
    }, 100);
});



  });
  var map= new ol.Map({
    layers: [
      new ol.layer.Tile({source: new ol.source.OSM()})
    ],
    view: new ol.View({
      center: [0, 0],
      zoom: 3
    }),
     interactions: ol.interaction.defaults({mouseWheelZoom:false}),
    target: 'map'
  });

</script>
<?php $this->end(); ?>
