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
    {id: 0, title:'Group1',content: '<a class="vis-group-toggle" href="javascript:void"><i class="vis-fa fa fa-toggle-on fa-lg violet"></i></a><i class="vis-fa fa fa-user violet" style="padding-left:5px; padding-right:5px"></i><b>Gopakumar</b>'},
    {id: 1, title:'Group2',content: '<a class="vis-group-toggle" href="javascript:void"><i class="vis-fa fa fa-toggle-on fa-lg green"></i></a><i class="vis-fa fa fa-user green" style="padding-left:5px; padding-right:5px"></i><b>Gowri&nbsp;Menon</b>'},
    {id: 2, title:'Group3',content: '<a class="vis-group-toggle" href="javascript:void"><i class="vis-fa fa fa-toggle-on fa-lg babyred"></i></a><i class="vis-fa fa fa-user babyred" style="padding-left:5px; padding-right:5px"></i><b>Jojo&nbsp;J&nbsp;J</b>'},
    {id: 3, title:'Group4',content: '<a class="vis-group-toggle" href="javascript:void"><i class="vis-fa fa fa-toggle-on fa-lg darkblue"></i></a><i class="vis-fa fa fa-user darkblue" style="padding-left:5px; padding-right:5px"></i><b>Abu&nbsp;Ansari</b>'},
  ]);
  // create a dataset with items
  // note that months are zero-based in the JavaScript Date object, so month 3 is April
  var items = new vis.DataSet([
    {id: 10000, group: 0, content: '', start: new Date(2016,9,10,1,0,0),end: new Date(2016,9,10,12,0,0),type:'background',editable:false,className:'violetline'},
  	{id: 1234, group: 0, content: '<i class="fa fa-truck fa-flip-horizontal fa-lg"></i><b>Start</b>', start: new Date(2016,9,10,1,0,0), type:'box',editable:false, className:'violet'},
    {id: 0, group: 0, content: '1', start: new Date(2016,9,10,2,0,0), type:'box', className:'violet'},
    {id: 1, group: 0, content: '2', start: new Date(2016,9,10,5,0,0), type:'box', className:'violet'},
    {id: 1235, group: 0, content: '<b>Stop</b><i class="fa fa-flag fa-lg"></i>', start: new Date(2016,9,10,12,0,0), type:'box',editable:false, className:'violet'},
    {id: 10001, group: 1, content: '', start: new Date(2016,9,10,8,0,0),end: new Date(2016,9,10,16,0,0),type:'background',editable:false,className:'greenlg'},
    {id: 1236, group: 1, content: '<i class="fa fa-truck fa-flip-horizontal fa-lg"></i><b>Start<b>', start: new Date(2016,9,10,8,0,0), type:'box',editable:false, className:'green'},
    {id: 2, group: 1, content: '1', start: new Date(2016,9,10,9,0,0), type:'box', className:'green'},
    {id: 3, group: 1, content: '2', start: new Date(2016,9,10,12,0,0), type:'box', className:'green'},
    {id: 1237, group: 1, content: '<b>Stop</b><i class="fa fa-flag fa-lg"></i>', start: new Date(2016,9,10,16,0,0), type:'box',editable:false, className:'green'},
    {id: 10002, group: 2, content: '', start: new Date(2016,9,10,6,0,0),end: new Date(2016,9,10,18,0,0),type:'background',editable:false,className:'babyredlg'},
    {id: 1238, group: 2, content: '<i class="fa fa-truck fa-flip-horizontal fa-lg"></i><b>Start<b>', start: new Date(2016,9,10,6,0,0), type:'box',editable:false, className:'babyred'},
    {id: 4, group: 2, content: '1', start: new Date(2016,9,10,10,30,0), type:'box', className:'babyred'},
    {id: 5, group: 2, content: '2', start: new Date(2016,9,10,13,0,0), type:'box', className:'babyred'},
    {id: 6, group: 2, content: '3', start: new Date(2016,9,10,15,0,0), type:'box', className:'babyred'},
    {id: 1239, group: 2, content: '<b>Stop</b><i class="fa fa-flag fa-lg"></i>', start: new Date(2016,9,10,18,0,0), type:'box',editable:false, className:'babyred'},
    {id: 10003, group: 3, content: '', start: new Date(2016,9,10,4,0,0),end: new Date(2016,9,10,20,0,0),type:'background',editable:false,className:'darkblueline'},
    {id: 1240, group: 3, content: '<i class="fa fa-truck fa-flip-horizontal fa-lg"></i><b>Start<b>', start: new Date(2016,9,10,4,0,0), type:'box',editable:false, className:'darkblue'},
    {id: 7, group: 3, content: '1', start: new Date(2016,9,10,5,0,0), type:'box', className:'darkblue'},
    {id: 8, group: 3, content: '2', start: new Date(2016,9,10,9,40,0), type:'box', className:'darkblue'},
    {id: 9, group: 3, content: '3', start: new Date(2016,9,10,12,0,0), type:'box', className:'darkblue'},
    {id: 10, group: 3, content: '4', start: new Date(2016,9,10,17,0,0), type:'box', className:'darkblue'},
    {id: 11, group: 3, content: '5', start: new Date(2016,9,10,19,0,0), type:'box', className:'darkblue'},
    {id: 1241, group: 3, content: '<b>Stop</b><i class="fa fa-flag fa-lg"></i>', start: new Date(2016,9,10,20,0,0), type:'box',editable:false, className:'darkblue'}
  ]);
  // specify options
  var options = {
    stack: false,
    start: new Date(2016,9,10),
    end: new Date(2016,9,11),
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
