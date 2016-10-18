<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active">Createconfigs</li>
    
  </ol>
</section>
                
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
  <div class="box box-primary">
      <div class="box-body">
    <table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>
                <?php foreach ($configs as $field): ?>
                
                <th><?php echo $field['title']  ?></th>
                
                <?php endforeach ?>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
   
 

</section>

<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap',  ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
      
      // $.fn.dataTable.ext.errMode=throw;
      
    $('#mptlindextbl').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
     
          //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData"
  
    });
     $('<a href="/<?php echo $this->request->params['controller'] ?>/add/" class="btn btn-sm btn-success" style="margin-left:5px;"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    
  });
</script>
<?php $this->end(); ?>