<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Startpoints'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Startpoint'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tripstatuses'), ['controller' => 'Tripstatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tripstatus'), ['controller' => 'Tripstatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclecategories'), ['controller' => 'Vehiclecategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclecategory'), ['controller' => 'Vehiclecategories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($trip->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $trip->has('customer') ? $this->Html->link($trip->customer->name, ['controller' => 'Customers', 'action' => 'view', $trip->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $trip->has('vehicle') ? $this->Html->link($trip->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $trip->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $trip->has('timepolicy') ? $this->Html->link($trip->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $trip->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Route') ?></th>
            <td><?= $trip->has('route') ? $this->Html->link($trip->route->name, ['controller' => 'Routes', 'action' => 'view', $trip->route->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Startpoint') ?></th>
            <td><?= $trip->has('startpoint') ? $this->Html->link($trip->startpoint->name, ['controller' => 'Locations', 'action' => 'view', $trip->startpoint->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Endpoint') ?></th>
            <td><?= $trip->has('endpoint') ? $this->Html->link($trip->endpoint->name, ['controller' => 'Locations', 'action' => 'view', $trip->endpoint->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Schedule') ?></th>
            <td><?= $trip->has('schedule') ? $this->Html->link($trip->schedule->name, ['controller' => 'Schedules', 'action' => 'view', $trip->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Tripstatus') ?></th>
            <td><?= $trip->has('tripstatus') ? $this->Html->link($trip->tripstatus->name, ['controller' => 'Tripstatuses', 'action' => 'view', $trip->tripstatus->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Last Location') ?></th>
            <td><?= h($trip->last_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiclecategory') ?></th>
            <td><?= $trip->has('vehiclecategory') ? $this->Html->link($trip->vehiclecategory->name, ['controller' => 'Vehiclecategories', 'action' => 'view', $trip->vehiclecategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Passengergroup Id') ?></th>
            <td><?= $this->Number->format($trip->passengergroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Trackingcode') ?></th>
            <td><?= $this->Number->format($trip->trackingcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Platform') ?></th>
            <td><?= $this->Number->format($trip->platform) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($trip->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($trip->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($trip->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($trip->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Adt') ?></th>
            <td><?= h($trip->adt) ?></td>
        </tr>
        <tr>
            <th><?= __('Aat') ?></th>
            <td><?= h($trip->aat) ?></td>
        </tr>
        <tr>
            <th><?= __('Edt') ?></th>
            <td><?= h($trip->edt) ?></td>
        </tr>
        <tr>
            <th><?= __('Eat') ?></th>
            <td><?= h($trip->eat) ?></td>
        </tr>
        <tr>
            <th><?= __('Autogen') ?></th>
            <td><?= $trip->autogen ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Canceled') ?></th>
            <td><?= $trip->canceled ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $trip->active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Fromitinerary') ?></th>
            <td><?= $trip->fromitinerary ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
