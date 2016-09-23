<style>
	.mptl-infoband {
		width: 10px;
		height: 120px;
	}
	.odo-widget {
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

.trackbox{
	border-radius: 0px;
	border-top: 0px;
	margin-bottom:0px;
}
.trackbox {
    position: relative;
    background: #ffffff;
    border-top: 1px solid #d2d6de;
    margin-bottom: 5px;
    width: 100%;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.lowpad{
	padding:5px;
}
.selected{
	background-color: bisque;
}


      .ol-dragbox {
        background-color: rgba(255,255,255,0.4);
        border-color: rgba(100,150,0,1);
      }


/*
 * Component: Info Box small
 * -------------------
 */
.info-box-sm {
  display: block;
  min-height: 45px;
  background: #fff;
  width: 100%;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  margin-bottom: 5px;
}
.info-box-sm .progress {
  background: rgba(0, 0, 0, 0.2);
  margin: 5px -10px 5px -10px;
  height: 2px;
}
.info-box-sm .progress,
.info-box-sm .progress .progress-bar {
  border-radius: 0;
}
.info-box-sm .progress .progress-bar {
  background: #fff;
}
.info-box-sm-icon {
  border-top-left-radius: 2px;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 2px;
  display: block;
  float: left;
  height: 45px;
  width: 45px;
  text-align: center;
  font-size: 45px;
  line-height: 45px;
  background: rgba(0, 0, 0, 0.2);
}
.info-box-sm-icon > img {
  max-width: 100%;
}
.info-box-sm-content {
  padding: 5px 10px;
  margin-left: 40px;
}
.info-box-sm-number {
  display: block;
  font-weight: bold;
  font-size: 12px;
}

.info-box-sm-text {
  display: block;
  font-size: 12px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.info-box-sm-text {
  text-transform: uppercase;
}
.info-box-sm-more {
  display: block;
}
.progress-description {
  margin: 0;
}

.products-list .product-info {
    margin-left: 30px;
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


</style>
<!-- Main content -->
<section>
	<!-- Map content -->
	<div class="mptl-map">
		<div id="map" style="height:100%; width: 100%;"></div>
	</div>
</section>
<section class="content">
	<!-- /.row -->
	<div class="row">
		<div class="trackbox">
			<!-- /.Details Box-->
			<div class="box-body">
				<!-- /.details box body-->
				<div id="trackinfo" class="col-md-6">
							<div id="trackinfo-nav" class="crsl-nav">
												<a style="opacity: 0; left: 0px;" href="#" class="previous">&lt;</a>
												<a style="opacity: 0; right: 0px;" href="#" class="next">&gt;</a>
							</div>
							<div class="trackinfo crsl-items" data-navigation="trackinfo-nav">
									<div class="crsl-wrap">
										<?php echo $this->element('/tracking/vehicle'); ?>
										<?php echo $this->element('/tracking/driver'); ?>
										<?php echo $this->element('/tracking/sensor'); ?>
										<?php echo $this->element('/tracking/events'); ?>
												</div>
										</div>
									</div>
			</div>
			<!-- /.details-->
		</div>
	</div>
	<!-- /.row -->
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
],
['block' => 'script']);
?>
<?php $this->Html->script(['/js/maptell/livepoller'],['block' => 'scriptTop']);?>

<?php $this -> start('scriptBotton'); ?>



<script>
	$(function() {

		$('.crsl-items').sortable({
		items : '.crsl-item'
		});

		$('.crsl-items').carousel({ visible: 3, itemMinWidth:250, itemEqualHeight: false });

		$('.crsl-items').on('initCarousel', function(event, defaults, obj){
			// Hide controls
			$('#'+defaults.navigation).find('.previous, .next').css({ opacity: 0 });
			// Show controls on gallery hover
			// #trackinfo wraps .crsl-items and .crls-nav
			// .stop() prevent queue
			$('#trackinfo-nav').hover( function(){
				$(this).find('.previous').css({ left: 0 }).stop(true, true).animate({ left: '10px', opacity: 1 });
				$(this).find('.next').css({ right: 0 }).stop(true, true).animate({ right: '10px', opacity: 1 });
				}, function(){
					$(this).find('.previous').animate({ left: 0, opacity: 0 });
					$(this).find('.next').animate({ right: 0, opacity: 0 });
				});
			});

		var p =<?php print_r($loggedincustomer['initlong']) ?>;
	    var q = <?php echo $loggedincustomer['initlat']?>;
	    initMap(p, q);
	    checkForTracking();


	});

</script>

<?php $this -> end(); ?>
