<?php echo $this->element('indexstyles') ; ?>
<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <input type="hidden" value="1"  id="basicfilter"/>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Customers</li>

  </ol>
</section>
<!-- Main content -->

<?php echo $this->element('indexbasicnofilter'); ?>
