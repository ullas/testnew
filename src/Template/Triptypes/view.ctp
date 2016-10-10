<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Triptype'), ['action' => 'edit', $triptype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Triptype'), ['action' => 'delete', $triptype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $triptype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Triptypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Triptype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="triptypes view large-9 medium-8 columns content">
    <h3><?= h($triptype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($triptype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $triptype->has('customer') ? $this->Html->link($triptype->customer->name, ['controller' => 'Customers', 'action' => 'view', $triptype->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($triptype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trips') ?></h4>
        <?php if (!empty($triptype->trips)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th><?= __('Timepolicy Id') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Startpoint Id') ?></th>
                <th><?= __('Endpoint Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                <th><?= __('Autogen') ?></th>
                <th><?= __('Tripstatus Id') ?></th>
                <th><?= __('Last Location') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Fromschedule') ?></th>
                <th><?= __('Trackingcode') ?></th>
                <th><?= __('Adt') ?></th>
                <th><?= __('Aat') ?></th>
                <th><?= __('Edt') ?></th>
                <th><?= __('Eat') ?></th>
                <th><?= __('Vehiclecategory Id') ?></th>
                <th><?= __('Platform') ?></th>
                <th><?= __('Triptype Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($triptype->trips as $trips): ?>
            <tr>
                <td><?= h($trips->id) ?></td>
                <td><?= h($trips->name) ?></td>
                <td><?= h($trips->start_date) ?></td>
                <td><?= h($trips->end_date) ?></td>
                <td><?= h($trips->customer_id) ?></td>
                <td><?= h($trips->vehicle_id) ?></td>
                <td><?= h($trips->start_time) ?></td>
                <td><?= h($trips->end_time) ?></td>
                <td><?= h($trips->timepolicy_id) ?></td>
                <td><?= h($trips->route_id) ?></td>
                <td><?= h($trips->startpoint_id) ?></td>
                <td><?= h($trips->endpoint_id) ?></td>
                <td><?= h($trips->schedule_id) ?></td>
                <td><?= h($trips->autogen) ?></td>
                <td><?= h($trips->tripstatus_id) ?></td>
                <td><?= h($trips->last_location) ?></td>
                <td><?= h($trips->canceled) ?></td>
                <td><?= h($trips->active) ?></td>
                <td><?= h($trips->fromschedule) ?></td>
                <td><?= h($trips->trackingcode) ?></td>
                <td><?= h($trips->adt) ?></td>
                <td><?= h($trips->aat) ?></td>
                <td><?= h($trips->edt) ?></td>
                <td><?= h($trips->eat) ?></td>
                <td><?= h($trips->vehiclecategory_id) ?></td>
                <td><?= h($trips->platform) ?></td>
                <td><?= h($trips->triptype_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trips', 'action' => 'delete', $trips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
