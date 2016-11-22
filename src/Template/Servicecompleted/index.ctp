
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Services Completed
    <small>Manage your Services Completed</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Service Entry"  , "type" => "char");
				$fields[2] = array("title" =>"Services Completed"  , "type" => "char");
							
				

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


