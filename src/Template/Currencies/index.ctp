
<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    Currencies
    <small>Manage your Currencies</small>
  </h1>
  
</section>
<?php 
				$fields = array();
				$fields[0] = array("title" =>"Id"  , "type" => "num");
				$fields[1] = array("title" =>"Name"  , "type" => "char");
				$fields[2] = array("title" =>"Abbreviation"  , "type" => "char");
				$fields[3] = array("title" =>"Symbol"  );
				$fields[4] = array("title" =>"Description", "type" => "char"  );
				

echo $this->element('indexbasicmaster', array('colheadsformasters' => $fields)); ?>


