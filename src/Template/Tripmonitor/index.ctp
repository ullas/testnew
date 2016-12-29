<style>
.pb-box{
  margin-bottom:1px;
  margin-top:-2px
}
.nopadding{
  padding:0
}
/*--------------Trip Box related styles----------------------------*/
body {
     font-family:Lato,Helvetica,Arial,sans-serif
   }

   .trip-box{
     background-color: #FFF;
     padding:10px 10px 3px 10px
   }

   .vis-timeline{
     background-color: #FFF;
     border: 1px solid #DEDEDE;
     border-radius: 4px;
     box-shadow: 0 0 7px rgba(0,0,0,.15);
   }
   .vis-time-axis .vis-text.vis-major {
       fill: #4a4847;
   font-size: .866666666em;
   font-weight: 700;
   }

    .vis-time-axis .vis-text.vis-minor {
       fill: #4a4847;
   font-size: .866666666em;
   font-weight: 700;
   }

   .vis-labelset .vis-label{
     font-size: .866666666em;
   }

   .vis-item {
     cursor:pointer;
     border-color: #C8C8C8;
     background:white;
     font-size: 10pt;
     box-shadow: 5px 5px 20px rgba(128,128,128, 0.5);
   }

    .vis-fa.darkgray {
     color: #333333;
 }

  /*-----------------violet-----------------------------*/

  .vis-fa.violet {
     color: #B188D0;
 }

   .vis-item.violet {
     color: #B188D0;
     z-index:1
 }

 .vis-item.violetline {
     color: #B188D0;
     background: #B188D0;
     opacity:0.5
 }

 .vis-item.violetlinelg {
     color: #B188D0;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #B188D0 5px,
         #B188D0 10px
       );
     opacity:0.5
 }
 .vis-item.violet.vis-selected {
     color: #FFFFFF;
     background:#B188D0
 }
 /*-----------------darkgreen-----------------------------*/
 .vis-fa.darkgreen {
     color: #409998;
 }
 .vis-item.darkgreen {
     color: #409998;
     z-index:1
 }
  .vis-item.darkgreenline {
     color: #409998;
     background:#409998;
     opacity:0.5
 }

 .vis-item.darkgreenlinelg {
     color: #B188D0;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #409998 5px,
         #409998 10px
       );
     opacity:0.5
 }
 .vis-item.darkgreen.vis-selected {
     color: #FFFFFF;
     background:#409998
 }
 /*-----------------warmgreen-----------------------------*/
 .vis-fa.warmgreen {
     color: #409998;
 }
 .vis-item.warmgreen {
     color: #b2ce7f;
     z-index:1
 }
  .vis-item.warmgreenline {
     color: #b2ce7f;
     background:#b2ce7f;
     opacity:0.5
 }

 .vis-item.warmgreenlinelg {
     color: #b2ce7f;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #b2ce7f 5px,
         #b2ce7f 10px
       );
     opacity:0.5
 }
 .vis-item.warmgreen.vis-selected {
     color: #FFFFFF;
     background:#b2ce7f
 }
 /*-----------------darkred-----------------------------*/
 .vis-fa.darkred {
     color: #A14040;
 }
 .vis-item.darkred {
     color: #A14040;
     z-index:1
 }
  .vis-item.darkredline {
     color: #A14040;
     background:#A14040;
     opacity:0.5
 }

 .vis-item.darkredlinelg {
     color: #b2ce7f;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #A14040 5px,
         #A14040 10px
       );
     opacity:0.5
 }
   .vis-item.darkred.vis-selected {
     color: #FFFFFF;
     background:#A14040
 }
 /*-----------------orange-----------------------------*/
 .vis-fa.orange {
     color: #CF934B;
 }
 .vis-item.orange {
     color: #CF934B;
     z-index:1
 }
  .vis-item.orangeline {
     color: #CF934B;
     background:#CF934B;
     opacity:0.5
 }

 .vis-item.orangelinelg {
     color: #CF934B;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #CF934B 5px,
         #CF934B 10px
       );
     opacity:0.5
 }
   .vis-item.orange.vis-selected {
     color: #FFFFFF;
     background:#CF934B
 }
 /*-----------------pink-----------------------------*/
 .vis-fa.pink {
     color: #C932AB;
 }
 .vis-item.pink {
     color: #C932AB;
     z-index:1
 }
  .vis-item.pinkline {
     color: #C932AB;
     background:#C932AB;
     opacity:0.5
 }

 .vis-item.pinklinelg {
     color: #C932AB;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #C932AB 5px,
         #C932AB 10px
       );
     opacity:0.5
 }
   .vis-item.pink.vis-selected {
     color: #FFFFFF;
     background:#C932AB
 }
 /*-----------------darkblue-----------------------------*/
 .vis-fa.darkblue {
     color: #59AEEF;
 }
 .vis-item.darkblue {
     color: #59AEEF;
     z-index:1
 }
  .vis-item.darkblueline {
     color: #59AEEF;
     background:#59AEEF;
     opacity:0.5
 }

 .vis-item.darkbluelg {
     color: #59AEEF;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #59AEEF 5px,
         #59AEEF 10px
       );
     opacity:0.5
 }
   .vis-item.darkblue.vis-selected {
     color: #FFFFFF;
     background:#59AEEF
 }
 /*-----------------greenji-----------------------------*/
 .vis-fa.greenji {
     color: #47CB9E;
 }
 .vis-item.greenji {
     color: #47CB9E;
     z-index:1
 }
  .vis-item.greenjiline {
     color: #47CB9E;
     background:#47CB9E;
     opacity:0.5
 }

 .vis-item.greenjilg {
     color: #47CB9E;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #47CB9E 5px,
         #47CB9E 10px
       );
     opacity:0.5
 }
   .vis-item.greenji.vis-selected {
     color: #FFFFFF;
     background:#47CB9E
 }
 /*-----------------darkbrown-----------------------------*/
 .vis-fa.darkbrown {
     color: #834C11;
 }
 .vis-item.darkbrown {
     color: #834C11;
     z-index:1
 }
  .vis-item.darkbrownline {
     color: #834C11;
     background:#834C11;
     opacity:0.5
 }

 .vis-item.darkbrownlg {
     color: #834C11;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #834C11 5px,
         #834C11 10px
       );
     opacity:0.5
 }
   .vis-item.darkbrown.vis-selected {
     color: #FFFFFF;
     background:#834C11
 }
 /*-----------------lightbrown-----------------------------*/
 .vis-fa.lightbrown {
     color: #BCAD0A;
 }
 .vis-item.lightbrown {
     color: #BCAD0A;
     z-index:1
 }
  .vis-item.lightbrownline {
     color: #834C11;
     background:#BCAD0A;
     opacity:0.5
 }

 .vis-item.lightbrownlg {
     color: #BCAD0A;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #BCAD0A 5px,
         #BCAD0A 10px
       );
     opacity:0.5
 }
   .vis-item.lightbrown.vis-selected {
     color: #FFFFFF;
     background:#BCAD0A
 }
 /*-----------------babyred-----------------------------*/
 .vis-fa.babyred {
     color: #F35F42;
 }
 .vis-item.babyred {
     color: #F35F42;
     z-index:1
 }
  .vis-item.babyredline {
     color: #F35F42;
     background:#F35F42;
     opacity:0.5
 }

 .vis-item.babyredlg {
     color: #F35F42;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #F35F42 5px,
         #F35F42 10px
       );
     opacity:0.5
 }
   .vis-item.babyred.vis-selected {
     color: #FFFFFF;
     background:#F35F42
 }
 /*-----------------green-----------------------------*/
 .vis-fa.green {
     color: #35AB64;
 }
 .vis-item.green {
     color: #35AB64;
     z-index:1
 }
  .vis-item.greenline {
     color: #35AB64;
     background:#35AB64;
     opacity:0.5
 }

 .vis-item.greenlg {
     color: #35AB64;
     background: repeating-linear-gradient(
         -45deg,
         #F5F5F5,
         #F5F5F5 5px,
         #35AB64 5px,
         #35AB64 10px
       );
     opacity:0.5
 }
   .vis-item.green.vis-selected {
     color: #FFFFFF;
     background:#35AB64
 }
   /*-----------------vis-item-colors-end-----------------------------*/
   .vis-item.vis-box{
   border-radius:5px;
   }

   .vis-item.vis-dot{
     border-width:0px;
   }
   .vis-item.vis-line{
     border-left-width:0px;
   }
   .vis-item .vis-delete {
   display: none;
    }
   /* alternating column backgrounds */
   .vis-time-axis .vis-grid.vis-odd {
     background: #F5F5F5;
   }

   vis-mptl-5{
     padding-right:5px
   }
</style>
<!-- Content Header (Page header) -->
<section>
  <div class="mptl-map">
    <div id="map" style="height:100%; width: 100%; padding=0";>
      <div class="trip-box">
        <div class="input-group col-sm-3" style="padding-bottom:5px">
          <span class="input-group-addon"><i class="fa fa-search"></i></span>
          <input class="form-control input-sm" placeholder="Search Trips" type="text">
        </div>
      <div id="triptimeline"></div>
      </div>
  </div>
  </div>
</section>
<!-- /.content -->
<?php $this->Html->css([
    'AdminLTE./plugins/vis/vis',
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/vis/vis',
],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
  {
  }
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

<script>

 
  // create groups
  var groups = new vis.DataSet([

   <?php
    		$this->log($trips );
			$lastid = -1;
			foreach($trips as $key => $value) 
				{
					 if($value['id'] == $lastid)
						 {
							 $this->log($value['id']);
						 }
					 else
						 {
							$this->log($value['id']);
					 		echo '{';		
   ?>
			
    			id: <?php echo $value['id'];?> , title:'Group1',content: '<a class="vis-group-toggle" href="javascript:void"><i class="vis-fa fa fa-toggle-on fa-lg violet"></i></a><i class="vis-fa fa fa-user violet" style="padding-left:5px; padding-right:5px"></i><b> <?php echo $value['name'];?></b>'
    		
   <?php
						
				 			echo '},';			
				 
				 		}
						$lastid = $value['id'];
				 
				}
   ?>
   ]);
  
  
							 
  
  // create a dataset with items
  // note that months are zero-based in the JavaScript Date object, so month 3 is April
  var items = new vis.DataSet([
  	<?php
  	use Cake\I18n\Time;
    		//$this->log($trips );
			$lastid = -1;
			$lastid2 = -1;
			$tempids = [1,2,3,4,5];	
			$barcolor = ['violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg','violetline','babyredlg','darkblueline','greenlg'];
			$startstopcolor = ['violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue','violet','green','babyred','darkblue',];
			
			$c = 0;
			foreach($trips as $key => $value) 
				{
					 if($value['id'] == $lastid)
						 {
						 	
							 $aat = $value['aat'];
						 	 $timeaat = strtotime($aat);
						     $mnthaat = (date('m', $timeaat)) -1;
							 
							 $cdate = Time::now(); 
	?>
							//location points in between start and stop
							{id: <?php echo $tempids[2]* rand();?>, group: <?php echo $value['id'];?>, content: '<?php echo $value['orderid'];?>', start: new Date(<?php echo date('Y', $timeaat) ;?>,<?php echo $mnthaat ;?>,<?php echo date('d', $timeaat) ;?>,<?php echo date('h', $timeaat) ;?>,<?php echo date('i', $timeaat) ;?>,<?php echo date('s', $timeaat) ;?>), type:'box', className:'violet'},
   
	<?php
							
						 }
					 else
						 {
						 $starttime = strtotime($value['start_time']);
						 $endtime = strtotime($value['end_time']);
						 
						 
						 $cdate = strtotime(Time::now());
						 $stdate = strtotime($value['start_date']);
						 $enddate = strtotime($value['end_date']);
						 $mnthstdate = (date('m', $stdate)) -1;
						 $mnthenddate = (date('m', $enddate)) -1;
						 
						 $mnth = (date('m', $stdate)) -1;
						 
						 $aat = $value['aat'];
						 $timeaat = strtotime($aat);
						 $mnthaat = (date('m', $timeaat)) -1;
						 
						 	
								
	?>	
						//bar image	
					    {id: <?php echo $tempids[0] * rand();?>, group: <?php echo $value['id'];?>, content: '', start: new Date(<?php echo date('Y', $stdate) ;?>,<?php echo $mnthstdate;?>,<?php echo date('d', $stdate) ;?>,<?php echo date('h', $starttime) ;?>,<?php echo date('i', $starttime) ;?>,<?php echo date('s', $starttime) ;?>),end: new Date(<?php echo date('Y', $enddate) ;?>,<?php echo $mnthenddate;?>,<?php echo date('d', $enddate) ;?>,<?php echo date('h', $endtime) ;?>,<?php echo date('i', $endtime) ;?>,<?php echo date('s', $endtime) ;?>),type:'background',editable:false,className:<?php echo "'". $barcolor[$c]."'";?>},
					  	
					  	//start icon
					  	{id: <?php echo $tempids[1]* rand();?>, group: <?php echo $value['id'];?>, content: '<i class="fa fa-truck fa-flip-horizontal fa-lg"></i><b>Start</b>', start: new Date(<?php echo date('Y', $stdate) ;?>,<?php echo $mnthstdate;?>,<?php echo date('d', $stdate) ;?>,<?php echo date('h', $starttime);?>,<?php echo date('i', $starttime);?>,<?php echo date('s', $starttime);?>), type:'box',editable:false, className:<?php echo "'". $startstopcolor[$c]."'";?>},
					    
					    //location points in between start and stop
					    {id: <?php echo $tempids[2]* rand();?>, group: <?php echo $value['id'];?>, content: '<?php echo $value['orderid'];?>', start: new Date(<?php echo date('Y', $timeaat) ;?>,<?php echo $mnthaat ;?>,<?php echo date('d', $timeaat) ;?>,<?php echo date('h', $timeaat) ;?>,<?php echo date('i', $timeaat) ;?>,<?php echo date('s', $timeaat) ;?>), type:'box', className:<?php echo "'". $startstopcolor[$c]."'";?>},
					   
						//stop icon
					    {id: <?php echo $tempids[4]* rand();?>, group: <?php echo $value['id'];?>, content: '<b>Stop</b><i class="fa fa-flag fa-lg"></i>', start: new Date(<?php echo date('Y', $enddate) ;?>,<?php echo $mnthenddate;?>,<?php echo date('d', $enddate) ;?>,<?php echo date('h', $endtime) ;?>,<?php echo date('i', $endtime) ;?>,<?php echo date('s', $endtime) ;?>), type:'box',editable:false, className:<?php echo "'". $startstopcolor[$c]."'";?>},
					    
	<?php
								}
									$lastid = $value['id'];
									$c=$c+1;
								}
	?>
		    		
		    		
    
   ]);
  // specify options
  <?php
  $cdate = strtotime(Time::now());
  $mnthcurrent = (date('m', $cdate)) -1;
  
  ?>
  
  var options = {
    stack: false,
    start: new Date(<?php echo date('Y', $cdate) ;?>,<?php echo $mnthcurrent ;?>,<?php echo date('d', $cdate) ;?>),
    end: new Date(2017,0,10),
    
    groupOrder: function (a, b) {
      return a.value - b.value;
    },
    editable: true,
    margin: {
      item: 10, // minimal margin between items
      axis: 5   // minimal margin between items and the axis
    },
    orientation: 'top'
  };
  // create a Timeline
  var container = document.getElementById('triptimeline');
  timeline = new vis.Timeline(container, null, options);
  timeline.setGroups(groups);
  timeline.setItems(items);
  $('.vis-group-toggle').click(function(){
    $(this).find('i').toggleClass('fa-toggle-on fa-toggle-off')
	});
	
	
</script>



<?php $this->end(); ?>
