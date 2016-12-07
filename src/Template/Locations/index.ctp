<?php

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/extensions/TableTools/js/dataTables.tableTools',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],     
['block' => 'script']);
?>
<!-- dropzone -->
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<style>
/*margin left for export buttons*/
.DTTT{
	margin-left:10px;
}
.DTTT .btn{
	background-color: #00a65a;margin:5px;
	border-color: #008d4c;color:#FFF;padding:3px 8px;
}
.dropzone{
	overflow-y:scroll;height:100px;
}
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Manage
    <small>Locations</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Locations</li>
  </ol>
</section>

<!-- <form action="/Locations/upload" class="dropzone"></form> -->
      
<!-- Main content -->
<section class="content">


  <div class="row">
    <div class="col-md-12">
       <section>

     
            <div class="mptl-map">
              <div id="map" style="height:400px; width: 100%; padding:0px;"></div>
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
          <h3 class="box-title">Location List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
	$(document).ready(function() {
    	var table =$('#mptlindextbl').DataTable();
		//table tools like export
    	var tt = new $.fn.dataTable.TableTools( table, {aButtons: [ { "sExtends": "copy","sButtonText": "<i class='fa fa-files-o'></i>","sToolTip": "Copy" },
    																						 { "sExtends": "csv","sButtonText": "<i class='fa fa-file-word-o'></i>","sToolTip": "Csv"  },
 																							 { "sExtends": "xls","sButtonText": "<i class='fa fa-file-excel-o'></i>","sToolTip": "Excel"  },
   																							 { "sExtends": "pdf","sButtonText": "<i class='fa fa-file-pdf-o'></i>","sToolTip": "Pdf"  },
   																							 { "sExtends": "print","sButtonText": "<i class='fa fa-print'></i>","sToolTip": "Print" } ]} );
		$( tt.fnContainer() ).appendTo('div.dataTables_filter');
	
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

