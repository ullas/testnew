
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Inspection Statuses
    <small>Manage your Inspection Statuses</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Inspection Statuses</li>
    
  </ol>
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				
				

echo $this->element('indexbasic', array('colheadsformasters' => $fields)); ?>


