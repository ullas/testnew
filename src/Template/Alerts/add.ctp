<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Alerts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alerts form large-9 medium-8 columns content">
    <?= $this->Form->create($alert) ?>
    <fieldset>
        <legend><?= __('Add Alert') ?></legend>
        <?php
            echo $this->Form->input('alert');
            echo $this->Form->input('trackingobject_id', ['options' => $trackingobjects, 'empty' => true]);
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('alert_type');
            echo $this->Form->input('priority');
            echo $this->Form->input('send_option');
            echo $this->Form->input('alertcategories_id');
            echo $this->Form->input('ack');
            echo $this->Form->input('ack_by');
            echo $this->Form->input('alert_dtime');
            echo $this->Form->input('location');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('velocity');
            echo $this->Form->input('ack_dtime');
            echo $this->Form->input('notification_send');
            echo $this->Form->input('odometer');
            echo $this->Form->input('extinfo');
            echo $this->Form->input('frid');
            echo $this->Form->input('driver_id', ['options' => $drivers, 'empty' => true]);
            echo $this->Form->input('driver_key');
            echo $this->Form->input('endtime');
            echo $this->Form->input('duration');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
