
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Vehicle Categories
    <small>Manage your Vehicle Categories</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Vehicle Categories</li>
    
  </ol>
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Description"  , "type" => "char");
							
				

echo $this->element('indexbasic', array('colheadsformasters' => $fields)); ?>


