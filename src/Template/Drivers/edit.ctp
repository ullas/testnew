<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $driver->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supervisor'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ibuttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ibutton'), ['controller' => 'Ibuttons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfids'), ['controller' => 'Rfids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfid'), ['controller' => 'Rfids', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivergroups'), ['controller' => 'Drivergroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Drivergroup'), ['controller' => 'Drivergroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="drivers form large-9 medium-8 columns content">
    <?= $this->Form->create($driver) ?>
    <fieldset>
        <legend><?= __('Edit Driver') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('middlename');
            echo $this->Form->input('lastname');
            echo $this->Form->input('dob', ['empty' => true]);
            echo $this->Form->input('sex');
            echo $this->Form->input('nationality');
            echo $this->Form->input('idcardno');
            echo $this->Form->input('licenceno');
            echo $this->Form->input('licenceexpdate');
            echo $this->Form->input('address_id', ['options' => $addresses, 'empty' => true]);
            echo $this->Form->input('nextofkin');
            echo $this->Form->input('comments');
            echo $this->Form->input('photo');
            echo $this->Form->input('ibutton_id');
            echo $this->Form->input('drivingpassportno');
            echo $this->Form->input('drivingpassportexp', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('vehicle_id');
            echo $this->Form->input('drivinglicenseclass');
            echo $this->Form->input('contractor_id', ['options' => $contractors, 'empty' => true]);
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true]);
            echo $this->Form->input('reporingtime', ['empty' => true]);
            echo $this->Form->input('offday1');
            echo $this->Form->input('offday2');
            echo $this->Form->input('supervisor_id', ['options' => $supervisors, 'empty' => true]);
            echo $this->Form->input('drivergroups._ids', ['options' => $drivergroups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
