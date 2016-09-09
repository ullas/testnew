

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
     Templates
    <small>Customise your email/sms messages</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"></i> Templates</a></li>
     <li><a href="/templates"></i> email/sms/Templates</a></li>
    
    
  </ol>
</section>

<!-- Main content -->
<section class="content">


  
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">
      
      
     
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">List of message templates </h3>

          <div class="box-tools pull-right">
            <a href="/templates/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Template</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('templatetype_id') ?></th>
                <th><?= $this->Paginator->sort('alertcategory_id') ?></th>
                <th><?= $this->Paginator->sort('template') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('templatecat') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($templates as $template): ?>
            <tr>
                <td><?= $this->Number->format($template->id) ?></td>
                <td><?= $template->has('customer') ? $this->Html->link($template->customer->name, ['controller' => 'Customers', 'action' => 'view', $template->customer->id]) : '' ?></td>
                <td><?= h($template->name) ?></td>
                <td><?= h($template->description) ?></td>
                <td><?= $this->Number->format($template->templatetype_id) ?></td>
                <td><?= $this->Number->format($template->alertcategory_id) ?></td>
                <td><?= h($template->template) ?></td>
                <td><?= h($template->subject) ?></td>
                <td><?= h($template->templatecat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $template->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $template->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $template->id], ['confirm' => __('Are you sure you want to delete # {0}?', $template->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
          <div class="paginator">
        <ul class="pagination pagination-sm no-margin pull-right">
            <?= $this->Paginator->prev('' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' ') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>	
         
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

   
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->