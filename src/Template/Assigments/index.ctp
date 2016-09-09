<style>
.timeline {
  height: 15px;
  /*margin: 1em;*/
  /*line-height: 250px;*/
  position: relative;
  text-align: center;
}
.timeline:before {
  content: '';
  position: absolute;
  width: 100%;
  top: 61%;
  /*left: 6%;*/
   height: 4px;
  /*margin-top: -36px;*/
  background: #ddd;
  left:0px;
}
.timeline-badge{
    color:#FFFFFF;
    padding:4px 0px 0px;
}
.event {
  width: 30px;
  height: 30px;
  position: relative;
  margin: 0 5%;
  display: inline-block;
  /*background: #0073b7 !important;*/
  vertical-align: bottom;
  border-radius: 50%;
}
.detail {
  position: absolute;
  line-height: 1em;
  white-space: nowrap;
  left: 100%;
}
.event:before {
  content: '';
  position: absolute;
  left: 50%;
  margin-left: -1px;
  width: 3px;
  background: #ddd;
  height: 10px;
}
.event.up:before {
  top: -100%;
}
.event.down:before {
  top: 100%;
}
.up .detail {
  top: -50px;
}
.down .detail {
  bottom: -10px;
}
.triplabel{
    padding:5px;
    
}

.mptl-trimpad{
    margin-right:0px;
    margin-left:0px;
    padding-right:0px;
    padding-left:0px;
}
.mptl-h60{
    height:60px;
}
.mptl-mt9{
    margin-top:9px;
}

</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trips
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Trips</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Available Drivers</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events" class="driver">
                <div class="external-event bg-green driver" id="driver1">Driver 1</div>
                <div class="external-event bg-yellow driver" id="driver2">Driver 2</div>
                <div class="external-event bg-aqua" id="driver3">Driver 3</div>
                <div class="external-event bg-light-blue" id="driver4">Driver 4</div>
                <div class="external-event bg-red" id="driver5">Driver 5</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Available Vehicles</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green vehicle" id="vehicle1">Vehicle 1</div>
                <div class="external-event bg-yellow vehicle" id="vehicle2">Vehicle 2</div>
                <div class="external-event bg-aqua" id="vehicle3">Vehicle 3</div>
                <div class="external-event bg-light-blue" id="vehicle4">Vehicle 4</div>
                <div class="external-event bg-red" id="vehicle5">Vehicle 5</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          
          <div class="box-primary">
              
            <!-- <div class="box-header with-border">
              <h4 class="box-title">Delete</h4>
            </div> -->
            <div class="box-body" id="trash">
              <!-- the events --><div align="center">
              <img class="" src="/img/trash.png" alt="Trash" ></div>

            </div>
            <!-- /.box-body -->
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body">
                
                <div class="content">
                    <?php for ($x = 1; $x <= 15; $x++) { ?>
                    <div class="row mptldrop" id="row<?php echo $x ?>">
                    
                    <?= $this->element('tripelement', array('tripstart' => false, 'tripend' => true, 'id' => $x,'statusarr' => [ ['1','TVC'], ['2','DXB'], ['3','Loc 3'], ['4','Loc 4'], ['5','Loc 5'] ] )); ?>
                      <!-- /.row end -->
                    </div>
                    <!-- <hr> -->
                    <?php } ?>
        
        </div>
        
     
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
    
    
    
    <?php
// $this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
// $this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  '/js/moment.min.js',
  // 'AdminLTE./plugins/fullcalendar/fullcalendar.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));
    
    ini_events($('#drivimgs img.dimg'));
    ini_events($('#drivimgs img.vimg'));

    $('.mptldrop').droppable({
      drop: function( event, ui ) {
          var draggableId = ui.draggable.attr("id");
          if ($("#"+draggableId).parents('.driver').length) {
              $(this).find(".dimg").addClass('mptldrag').attr("src","img/profile-icon.png");
              $(this).find(".pdriver").html(draggableId);
          }else{
            $(this).find(".vimg").addClass('mptldrag').attr("src","img/car.png");
            $(this).find(".pvehicle").html(draggableId);
        }
      }
    });
    
    $('#trash').droppable({
      drop: function( event, ui ) {
          var draggableId = ui.draggable.attr("id");
          if ($("#"+draggableId).parents('.mptl-driv').length) {
              if ($("#"+draggableId).hasClass('mptldrag')) {
                  $("#"+draggableId).removeClass('mptldrag').attr("src","img/cross.png");
                  $(this).parents().find(".pdriver").html("Driver");
              }else{
                  alert("No driver assigned.");
              }
          }else{
              if ($("#"+draggableId).hasClass('mptldrag')) {
                  $("#"+draggableId).removeClass('mptldrag').attr("src","img/cross.png");
                  $(this).parents().find(".pvehicle").html("Vehicle");
              }else{
                  alert("No vehicle assigned.");
              }
          }
      }
    });

   
    $("#add-new-event").click(function (e) {
      e.preventDefault();
     
      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>
<?php $this->end(); ?>