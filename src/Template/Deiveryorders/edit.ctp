<?php
  $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6" style="margin-top:4px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><div class="input-group">{{icon}}<input type="{{type}}" name="{{name}}"{{attrs}}/></div></div>',

     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);
?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Asset <small>Please fill the details to create a new Delivery Orders</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  	<li><a href="/Deiveryorders/"><i class="fa fa-cube"></i> Delivery Orders</a></li>
    <li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
 <?= $this->Form->create($deiveryorder) ?>
  <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
  
        <?php
            echo $this->Form->input('orderno',['required' => 'required']);
			echo $this->Form->input('awbumber',['required' => 'required']);
            echo $this->Form->input('shipmenttype_id', ['label'=>'Shipment Type','options' => $shipmenttypes, 'empty' => true,'class'=>'select2'  ]);
			echo $this->Form->input('orderstate_id', ['label'=>'Order State','options' => $orderstates, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('shipmentorderdate', ['type'=>'text','empty' => true,'label'=>'Shipment Order Date','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('distributioncenter_id', ['label'=>'Distribution Centre','options' => $distributioncenteres, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('packageweight', ['label'=>'Package Weight']);
			echo $this->Form->input('packagevolume', ['label'=>'Package Volume']);
			echo $this->Form->input('packagevalue', ['label'=>'Package Value']);
            echo $this->Form->input('paymenttype_id', ['label'=>'Payment Type','options' => $paymenttypes, 'empty' => true,'class'=>'select2'  ]);
            echo $this->Form->input('pickupdeliverytype_id', ['label'=>'Pickup Delivery Type','options' => $pickupdeliverytypes, 'empty' => true,'class'=>'select2'  ]);
            echo $this->Form->input('partialdeliveryallowed', ['label'=>'Partial Delivery Allowed']);
            echo $this->Form->input('returnallowed', ['label'=>'Return Allowed']);
            echo $this->Form->input('cancellationallowed', ['label'=>'Cancellation Allowed']);
            echo $this->Form->input('pickupdeliverybranch_id', ['label'=>'Pickup Delivery Branch','options' => $pickupdeliverybranches, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('deliveryservicetime');
            echo $this->Form->input('deliverystarttimewindow', ['type'=>'text','empty' => true,'label'=>'Delivery Start','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('deliverydtimewindow', ['type'=>'text','empty' => true,'label'=>'Delivery End','class'=>'datemask','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pdlocationtype_id', ['label'=>'PD Location Type','options' => $pdlocationtypes, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('pdaccount_id', ['label'=>'PD Account','options' => $pdaccounts, 'empty' => true,'class'=>'select2' ]);
            echo $this->Form->input('returnbranch_id', ['label'=>'Return Branch','options' => $returnbranches, 'empty' => true,'class'=>'select2' ]);
         ?>
		
      </div>
 
          </div>
          <!-- /.tab-pane -->
          
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->

<?php
$this->Html->css([
  'AdminLTE./plugins/datepicker/datepicker3',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/select2/select2.min'
  ],
  ['block' => 'css']);

$this->Html->script([
 'AdminLTE./plugins/select2/select2.full.min',
 'AdminLTE./plugins/datepicker/bootstrap-datepicker',
 'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
 '/js/dropzone/dropzone',
 'AdminLTE./plugins/iCheck/icheck.min'
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
   
   $(".select2").select2({ width: '100%' });
   $('.datemask').datepicker({
            format:"dd/mm/yy",
              autoclose: true
   });
  

$('.timepicker').timepicker({
	showInputs:false
});
  });
</script>
<?php $this->end(); ?>
   