<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Manage
    <small>Routes</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Locations</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">


  <div class="row">
    <div class="col-md-12">
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
    <div class="col-md-12">
      
      
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Routes List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table table-hover  table-bordered " id="mptlindextbl">
              <thead>
              <tr>
                <th> ID</th>
                <th>Message</th>
                <th>Status</th>
                <th>Content</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-info">Processing</span></td>
                <td>
                  <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR1848</a></td>
                <td>Samsung Smart TV</td>
                <td><span class="label label-warning">Pending</span></td>
                <td>
                  <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                <td>iPhone 6 Plus</td>
                <td><span class="label label-danger">Delivered</span></td>
                <td>
                  <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                </td>
              </tr>
              <tr>
                <td><a href="pages/examples/invoice.html">OR9842</a></td>
                <td>Call of Duty IV</td>
                <td><span class="label label-success">Shipped</span></td>
                <td>
                  <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                </td>
              </tr>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Create a new Message</a>
          <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Messages</a>
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
    	$(document).ready(function() {
    		$('#mptlindextbl').DataTable();
		} );
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

