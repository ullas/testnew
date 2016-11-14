
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Service Documents
    <small>Manage your Service Documents</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Service Documents</li>
    
  </ol>
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Service Entry"  , "type" => "char");
				$fields[2] = array("title" =>"Data"  , "type" => "char");
							
				

echo $this->element('indexbasic', array('colheadsformasters' => $fields)); ?>


