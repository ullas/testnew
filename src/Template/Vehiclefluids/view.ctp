<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclefluid'), ['action' => 'edit', $vehiclefluid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclefluid'), ['action' => 'delete', $vehiclefluid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclefluid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclefluids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclefluid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclefluids view large-9 medium-8 columns content">
    <h3><?= h($vehiclefluid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehiclefluid->has('vehicle') ? $this->Html->link($vehiclefluid->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclefluid->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fuelquality') ?></th>
            <td><?= h($vehiclefluid->fuelquality) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclefluid->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltype') ?></th>
            <td><?= $this->Number->format($vehiclefluid->fueltype) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltank1 Capacity') ?></th>
            <td><?= $this->Number->format($vehiclefluid->fueltank1_capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltank2 Capacity') ?></th>
            <td><?= $this->Number->format($vehiclefluid->fueltank2_capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Oil Capacity') ?></th>
            <td><?= $this->Number->format($vehiclefluid->oil_capacity) ?></td>
        </tr>
    </table>
</div>
