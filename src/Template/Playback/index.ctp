
     <section class="content-header" style="margin-bottom: 20px">
      <h1>
        Play Back
        <small>Histoty is a collections on mistakes and misfortues....</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>


    <!-- Main content -->
    <section >

     
            <div class="mptl-map">
              <div id="map" style="height: 1200px; width: 100%;"></div>
            </div>
           
      
    </section>
    <!-- /.content -->
<?php $this->start('scriptBotton'); ?>
    <script type="text/javascript">
      new ol.Map({
    layers: [
      new ol.layer.Tile({source: new ol.source.OSM()})
    ],
    view: new ol.View({
      center: [0, 0],
      zoom: 2
    }),
     interactions: ol.interaction.defaults({mouseWheelZoom:false}),
    target: 'map'
  });
    </script>
<?php $this->end(); ?>
