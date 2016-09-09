<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Pointdata') ?></th>
            <td><?= h($location->pointdata) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $location->has('user') ? $this->Html->link($location->user->username, ['controller' => 'Users', 'action' => 'view', $location->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $location->has('customer') ? $this->Html->link($location->customer->name, ['controller' => 'Customers', 'action' => 'view', $location->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Reg Name') ?></th>
            <td><?= h($location->reg_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Accesslevel') ?></th>
            <td><?= $this->Number->format($location->accesslevel) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiclegroup Id') ?></th>
            <td><?= $this->Number->format($location->vehiclegroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assetgroup Id') ?></th>
            <td><?= $this->Number->format($location->assetgroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Peoplegroup Id') ?></th>
            <td><?= $this->Number->format($location->peoplegroup_id) ?></td>
        </tr>
    </table>
</div>
