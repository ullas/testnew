<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Address 
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
            <a href="/addresses/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new Address</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($address->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($address->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($address->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($address->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
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
          <h3 class="box-title">Related DLs</h3>

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
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('System') ?></th>
                <th><?= __('Enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->distributionlists as $distributionlists): ?>
            <tr>
                <td><?= h($distributionlists->name) ?></td>
                <td><?= h($distributionlists->description) ?></td>
                <td><?= h($distributionlists->customer_id) ?></td>
                <td><?= h($distributionlists->id) ?></td>
                <td><?= h($distributionlists->system) ?></td>
                <td><?= h($distributionlists->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Distributionlists', 'action' => 'view', $distributionlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Distributionlists', 'action' => 'edit', $distributionlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Distributionlists', 'action' => 'delete', $distributionlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distributionlists->id)]) ?>
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