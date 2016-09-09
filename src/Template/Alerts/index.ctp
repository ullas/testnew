<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Alerts
    <small>Details</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Alerts</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">


  <div class="row">
    <div class="col-md-12" style="padding-left: 0 ; padding-right:0">
       <section >

     
            <div class="mptl-map">
              <div id="map" style="height:400px; width: 100%; padding="0"></div>
            </div>
           
      
    </section>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12" style="padding-left: 0 ; padding-right:0">
      
      
      
      <div class="box box-info">
        <div class="box-header with-border">
         <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Acknowledge All Alerts</a>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
           
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
              <tr>
                <th> ID</th>
                <th>Alert</th>
                <th>Alert Category</th>
                <th>Time</th>
              </tr>
              </thead>
              <tbody>
              
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          
          
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      
      
      
      


      <!-- PRODUCT LIST -->
      
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<?php $this->start('scriptBotton'); ?>
    <script>
    	
    	function CenterMap(long, lat,zoom) {
    		 console.log("Long: " + long + " Lat: " + lat);
   			 map.getView().setCenter(ol.proj.transform([long, lat], 'EPSG:4326', 'EPSG:3857'));
   			 map.getView().setZoom(zoom);
		}
    	
    </script>


    <script type="text/javascript">
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

