
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Event Types
    <small>Manage your Event Types</small>
  </h1>
 
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Code"  , "type" => "num");
				$fields[3] = array("title" =>"Provider"  , "type" => "num");
				//$fields[4] = array("title" =>"Model"  , "type" => "char");
				$fields[4] = array("title" =>"Description"  , "type" => "char");

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


