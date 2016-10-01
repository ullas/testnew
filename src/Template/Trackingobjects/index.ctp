<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assettypes'), ['controller' => 'Assettypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assettype'), ['controller' => 'Assettypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trackingobjects index large-9 medium-8 columns content">
    <h3><?= __('Trackingobjects') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('assettype_id') ?></th>
                <th><?= $this->Paginator->sort('created_date') ?></th>
                <th><?= $this->Paginator->sort('modifield_date') ?></th>
                <th><?= $this->Paginator->sort('public_asset') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trackingobjects as $trackingobject): ?>
            <tr>
                <td><?= $this->Number->format($trackingobject->id) ?></td>
                <td><?= h($trackingobject->name) ?></td>
                <td><?= $trackingobject->has('assettype') ? $this->Html->link($trackingobject->assettype->name, ['controller' => 'Assettypes', 'action' => 'view', $trackingobject->assettype->id]) : '' ?></td>
                <td><?= h($trackingobject->created_date) ?></td>
                <td><?= h($trackingobject->modifield_date) ?></td>
                <td><?= h($trackingobject->public_asset) ?></td>
                <td><?= h($trackingobject->is_active) ?></td>
                <td><?= $trackingobject->has('customer') ? $this->Html->link($trackingobject->customer->name, ['controller' => 'Customers', 'action' => 'view', $trackingobject->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trackingobject->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trackingobject->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trackingobject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobject->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
