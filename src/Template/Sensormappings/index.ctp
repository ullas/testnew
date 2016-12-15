
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Sensormappings
    <small>Manage your Sensormappings</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				//$fields[1] = array("title" =>"AI0"  , "type" => "num");
				//$fields[2] = array("title" =>"AI1"  , "type" => "num");
				

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


