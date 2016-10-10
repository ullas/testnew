<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicles Driver'), ['action' => 'edit', $vehiclesDriver->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicles Driver'), ['action' => 'delete', $vehiclesDriver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclesDriver->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles Drivers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicles Driver'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclesDrivers view large-9 medium-8 columns content">
    <h3><?= h($vehiclesDriver->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehiclesDriver->has('vehicle') ? $this->Html->link($vehiclesDriver->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclesDriver->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Driver') ?></th>
            <td><?= $vehiclesDriver->has('driver') ? $this->Html->link($vehiclesDriver->driver->firstname, ['controller' => 'Drivers', 'action' => 'view', $vehiclesDriver->driver->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $vehiclesDriver->has('customer') ? $this->Html->link($vehiclesDriver->customer->name, ['controller' => 'Customers', 'action' => 'view', $vehiclesDriver->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclesDriver->id) ?></td>
        </tr>
    </table>
</div>
