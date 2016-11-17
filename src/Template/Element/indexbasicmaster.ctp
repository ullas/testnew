<section class="content">
	<?php echo $this->Form->create($this->request->params['controller'],array('url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAll')));?>
   <input type="hidden" value="1"  id="basicfilter"/>
  
  <div class="row">
        <div class="col-md-12">
  <div class="box box-primary">
      <div class="box-body">
    <table id="mptlindextblmaster" class="table table-hover  table-bordered ">
        <thead>
            <tr>
            	<th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
           	
               <?php
               if(isset($colheadsformasters))
			   {
			   
	               	 for($i=1;$i<count($colheadsformasters);$i++)
	               	 {
	                 echo "<th>". $colheadsformasters[$i]["title"] ."</th>";
	                 }
				
			   }
			   else
			   {
                    for($i=1;$i<count($configs);$i++)
                    {
                    echo "<th>". $configs[$i]['title'] ."</th>";
                    }
				  
			   }
			   ?>  
                
                <th data-orderable="false">Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
    <?= $this->Form->end() ?>
</section>

