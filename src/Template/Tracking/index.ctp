<style>
	.mptl-infoband {
		width: 10px;
		height: 120px;
	}
	.odo-widget {
		padding-left: 5px;
		padding-bottom: 1px;
		height: 32px;
	}
	.odo-widget .odo-val, .odo-widget .odo-fraction {
		width: 16px;
		height: 16px;
		padding-bottom: 20px;
		display: inline-block;
		background-color: #222D32;
		border: 1px solid #222D32;
		text-align: center;
		color: #fff;
		cursor: default;
	}
	.odo-widget .odo-fraction {
		border: 1px solid #222D32;
		color: #222D32;
		background-color: #fff;
	}
	.odo-widget .odo-unit {
		position: absolute;
		padding-top: 2px
	}
	.odo-widget .odo-unit .odo-unit-convert {
		display: block;

    }

.trackbox {
    position: relative;
    background: #ffffff;
    width: 100%;
		border-radius: 0px;
		border-top: 0px;
		margin-bottom:0px;
}


.lowpad{
	padding:5px;
}

.box-vehicle{
    border-top: 1px solid #f4f4f4;
    background-color: #ffffff;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
		margin-bottom:5px
}
.box-driver{
		margin-bottom:5px
}

.selected{
	background-color: bisque;
}

.todo-list > li {
  border-radius: 2px;
  padding: 5px;
  background: #ffffff;
  margin-bottom: 2px;
  border-left: 0;
  color: #444;
}

.products-list .item{
	padding:5px;
}

.products-list .product-info{
	margin-left:35px;
}

.ol-dragbox {
  background-color: rgba(255,255,255,0.4);
  border-color: rgba(100,150,0,1);
}

/*
 * Component: Alert small
 * -------------------
 */
 .alert-small{
	 padding: 5px;
	 margin-bottom: 2px;
	 border-radius: 3px;
 }


 .crsl-item{
	 min-width:320px
 }
</style>
<!-- Main content -->
<section>
	<!-- Map content -->
	<div class="mptl-map">
		<div id="map" style="height:100%; width: 100%;"></div>
	</div>
</section>
<!-- /.content class content-->
<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
		'AdminLTE./plugins/respcarousel/respcarousel',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
  'AdminLTE./plugins/respcarousel/responsiveCarousel.min',
  '/js/ol/ext/interaction/selectclusterinteraction.js',
  '/js/ol/ext/layer/animatedclusterlayer.js',
  '/js/ol/ext/featureanimation/featureanimation',
  '/js/ol/ext/featureanimation/bounceanimation',
  '/js/ol/ext/style/chartstyle',
  '/js/ol/ext/utils/ol.ordering',
  '/js/ol/ext/style/shadowstyle',

],
['block' => 'script']);
?>
<?php $this->Html->script(['/js/maptell/livepoller'],['block' => 'scriptTop']);?>
<?php $this -> start('scriptBotton'); ?>
<script>
	$(function() {

		$('.crsl-items').sortable({
		items : '.crsl-item',
		axis:'y'
		});

		var p =<?php print_r($loggedincustomer['initlong']) ?>;
	    var q = <?php echo $loggedincustomer['initlat']?>;
	    initMap(p, q);
	    checkForTracking();
	});

</script>

<?php $this -> end(); ?>
