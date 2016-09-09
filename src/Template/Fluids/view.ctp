<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fluid'), ['action' => 'edit', $fluid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fluid'), ['action' => 'delete', $fluid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fluid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fluids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fluid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fluids view large-9 medium-8 columns content">
    <h3><?= h($fluid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $fluid->has('vehicle') ? $this->Html->link($fluid->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fluid->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fuelquality') ?></th>
            <td><?= h($fluid->fuelquality) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fluid->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltype') ?></th>
            <td><?= $this->Number->format($fluid->fueltype) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltank1 Capacity') ?></th>
            <td><?= $this->Number->format($fluid->fueltank1_capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltank2 Capacity') ?></th>
            <td><?= $this->Number->format($fluid->fueltank2_capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Oil Capacity') ?></th>
            <td><?= $this->Number->format($fluid->oil_capacity) ?></td>
        </tr>
    </table>
</div>
