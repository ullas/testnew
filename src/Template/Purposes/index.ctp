
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Purposes
    <small>Manage your Purposes</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
							
				

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


