<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Issues</li>
    
  </ol>
</section>
                
<?php echo $this->element('indexbasicIssues'); ?>