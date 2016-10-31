<style>
	
	
	.mptl-input{
		
		width:100%;
	}
	.required label:after {
    color: #d00;
    content: " *"
    }
</style>

<?php
   $myTemplates = [
    'inputContainer' => '<div class="form-group">{{content}}<div class="col-sm-offset-3 col-sm-6 style="margin-top:18px">{{help}}</div></div>',
     'label' => '<label class="col-sm-3 control-label" {{attrs}}>{{text}}</label>',
    'input' => '<div class="col-sm-6"><input type="{{type}}" name="{{name}}"{{attrs}}/></div>',
     'select' => '<div class="col-sm-6"><select name="{{name}}"{{attrs}}>{{content}}</select></div>',
     'textarea' => '<div class="col-sm-6"><textarea name="{{name}}"{{attrs}}>{{value}}</textarea></div>'
];
$this->Form->templates($myTemplates);
 
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Add Workorders
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/Workorders/"> Work Orders</a></li>
    <li class="active">Add</li>
  </ol>
</section>

<!-- Main content -->


<section class="content">
	
	<div class="row">
		 <div class="col-md-12">
		<div class="box box-danger">
		 <div class="box-header">
              <h3 class="box-title">Workorder Cost Summary</h3>
            </div>
            <div class="box-body">
            	 <div class="row">
    
			    <div class="col-sm-offset-1 col-sm-2">
			    	
			    	<h3><small>Labour</small><div style="margin-left:5px">0.00</div></h3>
			    	
			    </div>
			     <div class="col-sm-2">
			    	
			    	<h3><small>Parts</small><div style="margin-left:5px">0.00</div></h3>
			    	
			    </div>
			     <div class="col-sm-2">
			    	
			    	<h3><small>Tax</small><div style="margin-left:5px">0.00</div></h3>
			    	
			    </div>
			    <div class="col-sm-2">
			    	
			    	<h3><small>Discount</small><div style="margin-left:5px">0.00</div></h3>
			    	
			    </div>
			    <div class="col-sm-3">
			    	
			    	<h3><small>Total</small><div style="margin-left:5px">0.00</div></h3>
			    	
			    </div>
    
    		</div>
            
            	
		    </div>
		  </div>
		 </div>
	</div>
	
 <?= $this->Form->create($workorder)?>
  <div class="row">
    
    <div class="col-md-12">
    	<div style="margin:5px" class="pull-right">
              <a href="#" class="mptl-workorder-serv-add btn btn-sm btn-success" style="margin-left:5px;" title="Add ServiveItem"><i class="fa fa-plus" aria-hidden="true"></i></a>
              <a href="#" class="mptl-workorder-issue-add btn btn-sm btn-success" style="margin-left:5px;" title="Add ServiveItem"><i class="fa fa-plus" aria-hidden="true"></i></a>
                   
        </div>
      <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li  class="active"><a href="#details" data-toggle="tab">Details</a></li>	
            <li><a href="#lineitems" data-toggle="tab">Service items</a></li>
            <?php if(count($issues)>0 ): ?>
            	 <li><a href="#issueitem" data-toggle="tab">Iusses</a></li>
            <?php endif; ?>
          </ul>
          
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
             	<div class="row">
        <?php
            echo $this->Form->input('issuedate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Issue Date*','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09)'],'required'=>'required']);
            echo $this->Form->input('workorderstatus_id',['label'=>'Work Order Status *','class'=>'select2']);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true,'class'=>'select2','label'=>'Vehicle *']);
            echo $this->Form->input('startdate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Start Date *','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09) Required when a meter reading is present']]);
            echo $this->Form->input('lables');
            echo $this->Form->input('odometer',['label'=>'Odometer *']);
           
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true,'class'=>'select2']);
            echo $this->Form->input('completiondate', ['empty' => true,'type'=>'text','class'=>'datemask','label'=>'Completion Date','templateVars' => ['help' => 'YYYY-MM-DD (Ex: 2016-09-09)']]);
           ?>
           <?php
            echo $this->Form->input('issuedby_id',['label'=>'Issued By','class'=>'select2']);
            echo $this->Form->input('assignedby_id',['label'=>'Assigned By','class'=>'select2']);
            echo $this->Form->input('assignto_id',['label'=>'Assigned To','class'=>'select2']);
            echo $this->Form->input('invoicenumber',['label'=>'Invoice Number']);
            echo $this->Form->input('POnumber',['label'=>'PO Number']);
            echo $this->Form->input('description');
			
			?>
			
           	
          
              </div>
              
              
        
              </div>
                <!--- /.form horizodal -->
          </div>
          <!-- /.tab-pane -->
          
              <div class="tab-pane" id="lineitems">
             
               <div class="row mptl-workorder-servsum">
               	  <div class="col-sm-5" style="margin-bottom:5px">
               	  	<label>Service task</label>
               	  </div>
               	  <div class="col-sm-2 "><label>Labour</label></div>
               	  <div class="col-sm-2 "><label>Parts</label></div>
               	  <div class="col-sm-2 "><label>Sub Total</label></div>
               	
               </div>
              
    	  </div>
            <!-- /tab pane -->
            <?php if(count($issues)>0 ): ?>
            <div class="tab-pane" id="issueitem">
              	
            
               <div class="row mptl-workorder-issuesum">
               	  <div class="col-xs-5" style="margin-bottom:5px">
               	  	<label>Issue</label>
               	  </div>
               	  <div class="col-sm-2 "><label>Labour</label></div>
               	  <div class="col-sm-2 "><label>Parts</label></div>
               	  <div class="col-sm-2 "><label>Sub Total</label></div>
               	
               </div>
    	  </div>
            <!-- /tab pane -->
             <?php endif; ?>
          
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
                <div class="col-sm-offset-6 col-sm-12">
                 <!-- <button type="submit" class="btn btn-primary">Save</button>-->
                  <div id="fileuploader">Upload</div>
                </div>
   </div>
   </div>
 <?= $this->Form->end() ?>
</section>

<?php
$this->Html->css([
    
    'AdminLTE./plugins/select2/select2.min',
    
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  
],
['block' => 'script']);
?>
<?php $this->start('scriptBotton'); ?>
<script>
  
  var servcounter=0;
  var issuecount =0;
  function getLabourcost(){
  	var t=0;
  	$(".mptl-money-labour").each(function(){
  		t+=Number($(this).val());
  	});
  	return t;
  }
  function getPartscost(){
  	var t=0;
  	$(".mptl-money-parts").each(function(){
  		t+=Number($(this).val());
  	});
  	return t;
  }
  function getTotalCost(){
  	 var l= getLabourcost();
  	 var p= getPartscost();
  }
  function updateChangeListner(index){
  	
  	   $(".mptl-money").change(function(){
     	 	var id=$(this).attr("id").split("-")[1];
     	    var l=$("#workorderlineitem-"+id+"-labour").val();
     	    var p=$("#workorderlineitem-"+id+"-parts").val();
     	    l=l?Number(l):0;p=p?Number(p):0;
     	    if(index==1){
     	 	 $(".mptl-svr-par-sum-"+id).text((p+l).toFixed(2));
     	 	}else{
     	      $(".mptl-issue-par-sum-"+id).text((p+l).toFixed(2));
     	 	}
     	 	getTotalCost();
     	 	
     	 	
         });
  }
  
  function getsrow(){
  	var optstring="<?php   
  	      foreach($servicetasks as $key =>$value){
  	      	
			echo "<option value='$key'>$value</option>";
  	      }
  	
  	 ?>";
  	 
  	 
  	var rows='<div class="row "><div class="col-xs-5" style="margin-bottom:5px">';
             	 rows+='<select name="workorderlineitem[' + servcounter + '][servicetask_id]" id="workorderlineitem-' + servcounter + '-servicetask_id"  class="mptl-input select2dyn"  >' + optstring + '</select>';
                 rows+='</div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px"><div class="input-group-addon"><i class="fa fa-dollar"></i></div>';
		         rows+='<input class="mptl-money mptl-money-labour form-control pull-right" name="workorderlineitem['+ servcounter +'][labour]" id="workorderlineitem-'+ servcounter +'-labour" type="text">';
		         rows+='<div class="input-group-addon"><i class="fa fa-edit"></i></div></div></div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px">';
		         rows+='<div class="input-group-addon"><i class="fa fa-dollar"></i></div><input class="mptl-money mptl-money-parts form-control pull-right" name="workorderlineitem['+ servcounter +'][parts]" id="workorderlineitem-'+servcounter+'-parts" type="text">';
		         rows+='<div class="input-group-addon"><i class="fa fa-edit"></i></div></div></div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px">';
		         rows+='<div class="form-group"><label class="mptl-svr-par-sum-'+ servcounter + ' col-sm-3 control-label">0.00</label></div></div></div></div>';
      return rows; 
  }
  function getirow(){
  	var optstringissue="<?php   
  	      foreach($issues as $key =>$value){
  	      	
			echo "<option value='$key'>$value</option>";
  	      }
  	
  	 ?>";
  	var rowi='<div class="row"><div class="col-xs-5" style="margin-bottom:5px">';
             	 rowi+='<select name="workorderlineitem[' + issuecount + '][issue_id]" id="workorderlineitem-' + issuecount + '-issue_id"  class="mptl-input select2dyn"  >' + optstringissue + '</select>';
                 rowi+='</div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px"><div class="input-group-addon"><i class="fa fa-dollar"></i></div>';
		         rowi+='<input class="mptl-money mptl-money-labour form-control pull-right" name="workorderlineitem['+ issuecount +'][labour]" id="workorderlineitem-'+ issuecount +'-labour" type="text">';
		         rowi+='<div class="input-group-addon"><i class="fa fa-edit"></i></div></div></div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px">';
		         rowi+='<div class="input-group-addon"><i class="fa fa-dollar"></i></div><input class="mptl-money mptl-money-parts form-control pull-right" name="workorderlineitem['+ issuecount +'][parts]" id="workorderlineitem-'+issuecount+'-parts" type="text">';
		         rowi+='<div class="input-group-addon"><i class="fa fa-edit"></i></div></div></div><div class="col-sm-2"><div class="input-group " style="margin-bottom:5px">';
		         rowi+='<div class="form-group"><label class="mptl-issue-par-sum-'+ issuecount + '  control-label">0.00</label></div></div></div></div>';
     return rowi;
  }
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2({ width: '100%' });
    $(".datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
   
         
     
     $(".mptl-workorder-serv-add").click(function(){
     	
     	$(".mptl-workorder-servsum").after(getsrow());
     	
     	 $(".select2dyn").select2();
     	 updateChangeListner(1);
     	 
     	 servcounter++;
     });
     $(".mptl-workorder-issue-add").click(function(){
     	$(".mptl-workorder-issuesum").after(getirow());
     	 $(".select2dyn").select2();
     	 updateChangeListner(2);
     	 issuecount++;
     	 
     });
     
     $('.nav-tabs a').on('shown.bs.tab', function(event){
     	var x = $(event.target).text(); 
     	$(".mptl-workorder-serv-add").hide();
     	$(".mptl-workorder-issue-add").hide();
     	if(x=='Service items'){
     		$(".mptl-workorder-serv-add").show();
     	}else if(x=='Iusses'){
     		$(".mptl-workorder-issue-add").show();
     	}
     });
     $(".mptl-workorder-serv-add").hide();
     $(".mptl-workorder-issue-add").hide();
	 

  });
</script>
<?php $this->end(); ?>      	