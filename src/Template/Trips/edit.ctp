<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Startpoints'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Startpoint'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tripstatuses'), ['controller' => 'Tripstatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tripstatus'), ['controller' => 'Tripstatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehiclecategories'), ['controller' => 'Vehiclecategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiclecategory'), ['controller' => 'Vehiclecategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Edit Trip') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('start_time', ['empty' => true]);
            echo $this->Form->input('end_time', ['empty' => true]);
            echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true]);
            echo $this->Form->input('route_id', ['options' => $routes, 'empty' => true]);
            echo $this->Form->input('startpoint_id', ['options' => $startpoints, 'empty' => true]);
            echo $this->Form->input('endpoint_id', ['options' => $endpoints, 'empty' => true]);
            echo $this->Form->input('schedule_id', ['options' => $schedules, 'empty' => true]);
            echo $this->Form->input('passengergroup_id');
            echo $this->Form->input('autogen');
            echo $this->Form->input('tripstatus_id', ['options' => $tripstatuses, 'empty' => true]);
            echo $this->Form->input('last_location');
            echo $this->Form->input('canceled');
            echo $this->Form->input('active');
            echo $this->Form->input('fromitinerary');
            echo $this->Form->input('trackingcode');
            echo $this->Form->input('adt');
            echo $this->Form->input('aat');
            echo $this->Form->input('edt');
            echo $this->Form->input('eat');
            echo $this->Form->input('vehiclecategory_id', ['options' => $vehiclecategories, 'empty' => true]);
            echo $this->Form->input('platform');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
