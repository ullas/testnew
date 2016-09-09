<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclegroup'), ['action' => 'edit', $vehiclegroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclegroup'), ['action' => 'delete', $vehiclegroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclegroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclegroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclegroup'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defaultvehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defaultvehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclegroups view large-9 medium-8 columns content">
    <h3><?= h($vehiclegroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($vehiclegroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($vehiclegroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Defaultvehicle') ?></th>
            <td><?= $vehiclegroup->has('defaultvehicle') ? $this->Html->link($vehiclegroup->defaultvehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $vehiclegroup->defaultvehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclegroup->id) ?></td>
        </tr>
    </table>
</div>
