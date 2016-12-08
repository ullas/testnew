<?php echo $this->element('templateelement'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    New SIM Providers
  </h1>
  
</section>

<!-- Main content -->
<section class="content">
    <?= $this->Form->create($simprovider,['id'=>'masterdataform']) ?>
   <div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        
        <div class="tab-content">
          <div class="active tab-pane" id="details">
             <div class="form-horizontal">
        <?php
                	
                  echo $this->Form->input('name',['label'=>'Name','required' => 'required']); 

                    
                	
                  echo $this->Form->input('billdateofmonth',['label'=>'Bill Day Of Month']);

                    
                	
                  echo $this->Form->input('duedateofmonth',['label'=>'Due Day Of Month']);

                    
                	
                  echo $this->Form->input('lastdatefineofmonth',['label'=>'Last Date With Fine']);
				  
				  echo $this->Form->input('description');
				  
				    
            
        ?>
    </div>
 
          </div>
          <!-- /.tab-pane -->
          
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
   <!-- /.row -->
 <?= $this->Form->end() ?>
</section>
<!-- /.content -->       