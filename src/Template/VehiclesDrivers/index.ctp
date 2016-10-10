<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicles Driver'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclesDrivers index large-9 medium-8 columns content">
    <h3><?= __('Vehicles Drivers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('driver_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclesDrivers as $vehiclesDriver): ?>
            <tr>
                <td><?= $this->Number->format($vehiclesDriver->id) ?></td>
                <td><?= $vehiclesDriver->has('vehicle') ? $this->Html->link($vehiclesDriver->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclesDriver->vehicle->id]) : '' ?></td>
                <td><?= $vehiclesDriver->has('driver') ? $this->Html->link($vehiclesDriver->driver->firstname, ['controller' => 'Drivers', 'action' => 'view', $vehiclesDriver->driver->id]) : '' ?></td>
                <td><?= $vehiclesDriver->has('customer') ? $this->Html->link($vehiclesDriver->customer->name, ['controller' => 'Customers', 'action' => 'view', $vehiclesDriver->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclesDriver->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclesDriver->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclesDriver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclesDriver->id)]) ?>
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
