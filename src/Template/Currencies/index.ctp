
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Asset Types
    <small>Manage your Asset Types</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Asset Types</li>
    
  </ol>
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Abbreviation"  , "type" => "char");
				$fields[3] = array("title" =>"Symbol"  );
				

echo $this->element('indexbasic', array('colheadsformasters' => $fields)); ?>


