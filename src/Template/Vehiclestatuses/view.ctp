<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclestatus'), ['action' => 'edit', $vehiclestatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclestatus'), ['action' => 'delete', $vehiclestatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclestatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclestatuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclestatus'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclestatuses view large-9 medium-8 columns content">
    <h3><?= h($vehiclestatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($vehiclestatus->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $vehiclestatus->has('customer') ? $this->Html->link($vehiclestatus->customer->name, ['controller' => 'Customers', 'action' => 'view', $vehiclestatus->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclestatus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($vehiclestatus->vehicles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Plateno') ?></th>
                <th><?= __('Vin') ?></th>
                <th><?= __('Vehicletype Id') ?></th>
                <th><?= __('Year') ?></th>
                <th><?= __('Make') ?></th>
                <th><?= __('Model') ?></th>
                <th><?= __('Trim') ?></th>
                <th><?= __('Registationloc') ?></th>
                <th><?= __('Vehiclestatus Id') ?></th>
                <th><?= __('Driver Id') ?></th>
                <th><?= __('Ownership Id') ?></th>
                <th><?= __('Symbol Id') ?></th>
                <th><?= __('Driverdetectionmode') ?></th>
                <th><?= __('Activedriver') ?></th>
                <th><?= __('Station Id') ?></th>
                <th><?= __('Department Id') ?></th>
                <th><?= __('Odometer') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Regstate') ?></th>
                <th><?= __('Color') ?></th>
                <th><?= __('Bodytype') ?></th>
                <th><?= __('Bodysubtype') ?></th>
                <th><?= __('Msrp') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Purpose Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehiclestatus->vehicles as $vehicles): ?>
            <tr>
                <td><?= h($vehicles->id) ?></td>
                <td><?= h($vehicles->code) ?></td>
                <td><?= h($vehicles->plateno) ?></td>
                <td><?= h($vehicles->vin) ?></td>
                <td><?= h($vehicles->vehicletype_id) ?></td>
                <td><?= h($vehicles->year) ?></td>
                <td><?= h($vehicles->make) ?></td>
                <td><?= h($vehicles->model) ?></td>
                <td><?= h($vehicles->trim) ?></td>
                <td><?= h($vehicles->registationloc) ?></td>
                <td><?= h($vehicles->vehiclestatus_id) ?></td>
                <td><?= h($vehicles->driver_id) ?></td>
                <td><?= h($vehicles->ownership_id) ?></td>
                <td><?= h($vehicles->symbol_id) ?></td>
                <td><?= h($vehicles->driverdetectionmode) ?></td>
                <td><?= h($vehicles->activedriver) ?></td>
                <td><?= h($vehicles->station_id) ?></td>
                <td><?= h($vehicles->department_id) ?></td>
                <td><?= h($vehicles->odometer) ?></td>
                <td><?= h($vehicles->trackingobject_id) ?></td>
                <td><?= h($vehicles->description) ?></td>
                <td><?= h($vehicles->regstate) ?></td>
                <td><?= h($vehicles->color) ?></td>
                <td><?= h($vehicles->bodytype) ?></td>
                <td><?= h($vehicles->bodysubtype) ?></td>
                <td><?= h($vehicles->msrp) ?></td>
                <td><?= h($vehicles->photo) ?></td>
                <td><?= h($vehicles->purpose_id) ?></td>
                <td><?= h($vehicles->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicles', 'action' => 'view', $vehicles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicles', 'action' => 'edit', $vehicles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicles', 'action' => 'delete', $vehicles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
