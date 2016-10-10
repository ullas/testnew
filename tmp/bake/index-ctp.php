<section class="content-header">
  <h1>
    <CakePHPBakeOpenTagphp echo $this->request->params['controller'] CakePHPBakeCloseTag>
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></a>Fleet Management</li>
    <li class="active"><?=$pluralHumanName ?></li>
    
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
                <CakePHPBakeOpenTagphp foreach ($configs as $field): CakePHPBakeCloseTag>
                
                <th><CakePHPBakeOpenTagphp echo $field['title']  CakePHPBakeCloseTag></th>
                
                <CakePHPBakeOpenTagphp endforeach CakePHPBakeCloseTag>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>
    </div></div>
   
 

</section>

<CakePHPBakeOpenTagphp
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap',  ], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
], ['block' => 'script']); CakePHPBakeCloseTag>

<CakePHPBakeOpenTagphp $this->start('scriptBotton'); CakePHPBakeCloseTag>
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
          "ajax": "/<CakePHPBakeOpenTagphp echo $this->request->params['controller'] CakePHPBakeCloseTag>/ajaxData"
  
    });
     $('<a href="/<CakePHPBakeOpenTagphp echo $this->request->params['controller'] CakePHPBakeCloseTag>/add/" class="btn btn-sm btn-success" style="margin-left:5px;"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
    
  });
</script>
<CakePHPBakeOpenTagphp $this->end(); CakePHPBakeCloseTag>