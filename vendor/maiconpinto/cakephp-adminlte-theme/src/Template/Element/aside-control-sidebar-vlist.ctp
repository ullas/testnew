<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'aside-control-sidebar.ctp';
if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>
<style>
	.mptl-vlist li a{
		padding :1px;
	}
	.mptl-vlist li a i{
		width:16px;
		height:16px;
	}
</style>

<aside class="control-sidebar control-sidebar-light" >
   <div class="box">
            <div class="box-header">
              <h3 class="box-title">Items Tracked</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="vlist" class="table">
              	 <thead>
                <tr>
                  
                  <th width="40%">Name</th>
                  <th>Location</th>
                 
                </tr>
                 </thead>
                 <tbody>
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
    
</aside>
<?php
}
?>
