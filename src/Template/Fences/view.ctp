<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fence'), ['action' => 'edit', $fence->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fence'), ['action' => 'delete', $fence->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fence->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fence'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fences view large-9 medium-8 columns content">
    <h3><?= h($fence->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($fence->name) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $fence->has('user') ? $this->Html->link($fence->user->username, ['controller' => 'Users', 'action' => 'view', $fence->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $fence->has('vehicle') ? $this->Html->link($fence->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fence->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $fence->has('customer') ? $this->Html->link($fence->customer->name, ['controller' => 'Customers', 'action' => 'view', $fence->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fence->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiclegroup Id') ?></th>
            <td><?= $this->Number->format($fence->vehiclegroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Out Time') ?></th>
            <td><?= $this->Number->format($fence->leave_out_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Enter In Time') ?></th>
            <td><?= $this->Number->format($fence->enter_in_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Zonetype Id') ?></th>
            <td><?= $this->Number->format($fence->zonetype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Peoplegroup Id') ?></th>
            <td><?= $this->Number->format($fence->peoplegroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assetgroup Id') ?></th>
            <td><?= $this->Number->format($fence->assetgroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Show On Map') ?></th>
            <td><?= $fence->show_on_map ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Alerts On') ?></th>
            <td><?= $fence->alerts_on ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enter Alert') ?></th>
            <td><?= $fence->enter_alert ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enter In') ?></th>
            <td><?= $fence->enter_in ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Alert') ?></th>
            <td><?= $fence->leave_alert ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Out') ?></th>
            <td><?= $fence->leave_out ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Fencedata') ?></h4>
        <?= $this->Text->autoParagraph(h($fence->fencedata)); ?>
    </div>
</div>
