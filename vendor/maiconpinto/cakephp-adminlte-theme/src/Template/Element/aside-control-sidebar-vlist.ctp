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
  .noborder{
    border:0
  }
  .aside-scroll{
    max-height: 100%;
    overflow: scroll;
  }
  .aside-box{
    padding:0;
    margin:0;
    margin-top: auto;
    border-bottom:2px solid #f4f4f4
  }

</style>
<aside class="control-sidebar control-sidebar-light aside-scroll">
   <div class="box box-solid aside-box">
            <div class="box-header">
              <h3 class="box-title">Items Tracked</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" id='table_search' name="table_search" class="table_search form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding:0;">
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
          <div class="box noborder">
            <div class="box-body" style="padding:0;">
      				<!-- /.details box body-->
              <div id="trackinfo">
                    <div class="crsl-items" class="col-md-3" >
                        <div class="crsl-wrap">
                          <?php echo $this->element('/tracking/vehicle'); ?>
                          <?php echo $this->element('/tracking/driver'); ?>
                          <?php echo $this->element('/tracking/obdfuel'); ?>
                          <?php echo $this->element('/tracking/obdengine'); ?>
                          <?php echo $this->element('/tracking/obdfaults'); ?>
                          <?php echo $this->element('/tracking/obddriving'); ?>
                          <?php echo $this->element('/tracking/sensor'); ?>
                          <?php echo $this->element('/tracking/events'); ?>
                              </div>
                          </div>
                        </div>
      			</div>
      			<!-- /.details-->
                 </div>
                 <!-- /.box -->
</aside>
<?php
}
?>
