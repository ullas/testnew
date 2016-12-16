
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Digital Sensor Types
    <small>Manage your Digital sensor types</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Description"  , "type" => "char");
				$fields[3] = array("title" =>"Icon"  , "type" => "char");
				//$fields[4] = array("title" =>"Unit"  , "type" => "char");
				// $fields[5] = array("title" =>"Atmessage"  , "type" => "char");
				// $fields[6] = array("title" =>"Btmessage"  , "type" => "char");
				// $fields[7] = array("title" =>"Irmessage"  , "type" => "char");
				// $fields[8] = array("title" =>"Ormessage"  , "type" => "char");

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


