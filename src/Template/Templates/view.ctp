<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View email/SMS Template 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Templates</a></li>
     <li><a href="/templates/"> email/SMS Template</a></li>
    <li class="active">View</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    	<div class="col-md-12">
    		<div class="box box-info">
    			<div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <a href="/addresses/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Address</a>
         
          </div>
        </div>
        <!-- /.box-header -->
     <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $template->has('customer') ? $this->Html->link($template->customer->name, ['controller' => 'Customers', 'action' => 'view', $template->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($template->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Template') ?></th>
            <td><?= h($template->template) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($template->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Templatecat') ?></th>
            <td><?= h($template->templatecat) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($template->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Templatetype Id') ?></th>
            <td><?= $this->Number->format($template->templatetype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Alertcategory Id') ?></th>
            <td><?= $this->Number->format($template->alertcategory_id) ?></td>
        </tr>
    </table>
    </div>
    </div>
    </div> <!--box info-->
    </div>
 </div> <!--row -->
</section>
