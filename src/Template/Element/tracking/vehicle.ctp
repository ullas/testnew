<div class="col-md-3 ui-sortable">
	<div class="box box-success">
		<div class="box-header lowpad" style="cursor:move;">
			<h3 class="box-title">Vehicle</h3>
			<span><i class="fa fa-circle text-green"></i> <span>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove">
					<i class="fa fa-times"></i>
				</button>
			</div>
		</div>
		<div class="box-body lowpad">
			<ul class="todo-list">
				<li  class="text-blue" style="font-weight:bold">
					<span id="vname"></span>
				</li>
				<li>
					<i class="icon fa fa-map text-light-blue"></i>
					<span id="loc"></span>
				</li>
				<li>
					<i class="fa fa-compass text-green"></i> <span id="gps">GPS: 4 Sats</span></span> <span><i class="fa fa-signal text-green"></i> <span id="gsm">GSM: 65%</span></span>
				</li>
				<li>
					<ul class="list-inline odo-widget">
						<i class="icon fa fa-dashboard text-light-blue"></i>
						<li id="odo1" class="odo-val">
							0
						</li>
						<li id="odo2" class="odo-val">
							0
						</li>
						<li id="odo3" class="odo-val">
							0
						</li>
						<li id="odo4" class="odo-val">
							0
						</li>
						<li id="odo5" class="odo-val">
							0
						</li>
						<li id="odo6" class="odo-val">
							0
						</li>
						<li id="odo7" class="odo-fraction">
							0
						</li>
						<li class="odo-unit">
							km

						</li>
					</ul>
				</li>
				<li>
					<div>
						<div class="info-box-sm">
							<span class="info-box-sm-icon bg-aqua"><i class="ion ion-ios-clock-outline"></i></span>

							<div class="info-box-sm-content">
								<span class="info-box-sm-text">Last Updated</span>
								<span class="info-box-sm-number"><small id="gpsdate"></small><span id="gpstime"></span></span>
							</div>
							<!-- /.info-box-content -->
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
