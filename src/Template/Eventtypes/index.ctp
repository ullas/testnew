
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Event Types
    <small>Manage your Event Types</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Event Types</li>
    
  </ol>
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Code"  , "type" => "num");
				$fields[3] = array("title" =>"Provider"  , "type" => "num");
				$fields[4] = array("title" =>"Model"  , "type" => "char");

echo $this->element('indexbasic', array('colheadsformasters' => $fields)); ?>


