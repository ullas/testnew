<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    SIM Providers
    <small>Manage your SIM Providers</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Bill Date Of Month"  , "type" => "num");
				$fields[3] = array("title" =>"Due Date Of Month"  , "type" => "num");
				$fields[4] = array("title" =>"Last Date With Fine"  , "type" => "num");
				$fields[5] = array("title" =>"Description"  , "type" => "char");
				

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


