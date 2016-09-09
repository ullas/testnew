<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View DL 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Contacts</a></li>
     <li><a href="/addresses/"> Addresses</a></li>
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
            <a href="/distributionlists/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new DL</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($distributionlist->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($distributionlist->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $distributionlist->has('customer') ? $this->Html->link($distributionlist->customer->name, ['controller' => 'Customers', 'action' => 'view', $distributionlist->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($distributionlist->id) ?></td>
        </tr>
        <tr>
            <th><?= __('System') ?></th>
            <td><?= $distributionlist->system ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enabled') ?></th>
            <td><?= $distributionlist->enabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
      </div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
     
 <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Related Address</h3>

          <div class="box-tools pull-right">
            <a href="/addresses/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Address</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Designation') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Mobile') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($distributionlist->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->name) ?></td>
                <td><?= h($addresses->designation) ?></td>
                <td><?= h($addresses->email) ?></td>
                <td><?= h($addresses->customer_id) ?></td>
                <td><?= h($addresses->mobile) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div>
       </div> <!--box body -->
     </div> <!-- box -->
    </div> <!-- col -->
  </div> <!-- row -->

</section>