<style>
.pb-box{
  margin-bottom:1px;
  margin-top:-2px
}
.nopadding{
  padding:0
}
</style>
<!-- Content Header (Page header) -->
<section >
    <div class="row">
    <div class="col-md-12">
      <div class="box pb-box">
          <div class="row" style="margin-top:5px">
            <!-- Date and time range -->
              <div class="form-group col-md-9">
                <div class="input-group col-md-5" style="float:left;padding-top:7px;padding-left:10px">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                   <input id="alertdatetimerange" type="text" class="form-control">
                </div>
                <div class="input-group col-md-4" style="float:left;padding-top:7px;padding-left:10px">
                   <div class="input-group-btn">
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Select Group
                       <span class="fa fa-caret-down"></span></button>
                     <ul class="dropdown-menu">
                       <li><a href="#">Aerofreight</a></li>
                       <li><a href="#">Aero Group</a></li>
                       <li><a href="#">Volvo Trucks</a></li>
                     </ul>
                   </div>
                   <!-- /btn-group -->
                   <input class="form-control" type="text" placeholder="Vehicle">
                 </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div>
                <button id="linkButton" type="button" class="btn btn-default" >Link</button>
              </div>
              </div>
              <!-- /.row -->
    </div>
  </div>
  <!-- /.row -->
  </div>
  <div class="mptl-map">
    <div id="map" style="height:100%; width: 100%; padding=0";></div>
  </div>
    </div>
</section>
<!-- /.content -->
<?php $this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/toastr/toastr.min',
    '/css/font-awesome',
    '/css/fontmaki'
],
['block' => 'css']); ?>

<?php $this->Html->script([
    'AdminLTE./plugins/daterangepicker/moment.min',
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/toastr/toastr.min',
    '/js/ol/ext/utils/ol.ordering',
    '/js/ol/ext/style/fontsymbol',
    '/js/ol/ext/style/fontmaki.def',
    '/js/ol/ext/style/fontawesome.def',
   '/js/ol/ext/style/shadowstyle',
    '/js/ol/ext/featureanimation/featureanimation',
    '/js/ol/ext/featureanimation/dropanimation',
    '/js/ol/ext/featureanimation/bounceanimation',
      '/js/maptell/notifications.js',
],
['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  function resizeMap()
{
}
$(function () {

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

    // show when page load
      

      $('#linkButton').click(function() {
         // show when the button is clicked
         toastr.error('Harsh breaking from vehicle KL 01 BA 7478.');

      });

//Date range picker with time picker
  $('input[id="alertdatetimerange"]').daterangepicker({
    timePicker: true,
    timePickerIncrement: 10,
    locale: {
        format: 'DD/MM/YYYY h:mm A'
      }
    });
});

  
</script>
<?php $this->end(); ?>
