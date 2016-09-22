<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fences'), ['controller' => 'Fences', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fence'), ['controller' => 'Fences', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ibuttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ibutton'), ['controller' => 'Ibuttons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspections'), ['controller' => 'Inspections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspection'), ['controller' => 'Inspections', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Issues'), ['controller' => 'Issues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issue'), ['controller' => 'Issues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Measurementunits'), ['controller' => 'Measurementunits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Measurementunit'), ['controller' => 'Measurementunits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ownerships'), ['controller' => 'Ownerships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ownership'), ['controller' => 'Ownerships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Partcategories'), ['controller' => 'Partcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partcategory'), ['controller' => 'Partcategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passengergroups'), ['controller' => 'Passengergroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passengergroup'), ['controller' => 'Passengergroups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purposes'), ['controller' => 'Purposes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purpose'), ['controller' => 'Purposes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['controller' => 'Renewalreminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['controller' => 'Renewalreminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Renewalstypes'), ['controller' => 'Renewalstypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renewalstype'), ['controller' => 'Renewalstypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rfids'), ['controller' => 'Rfids', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rfid'), ['controller' => 'Rfids', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['controller' => 'Servicereminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['controller' => 'Servicereminders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicetasks'), ['controller' => 'Servicetasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicetask'), ['controller' => 'Servicetasks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Symbols'), ['controller' => 'Symbols', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Symbol'), ['controller' => 'Symbols', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Templatetypes'), ['controller' => 'Templatetypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Templatetype'), ['controller' => 'Templatetypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehiclecategories'), ['controller' => 'Vehiclecategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiclecategory'), ['controller' => 'Vehiclecategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehiclestatuses'), ['controller' => 'Vehiclestatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiclestatus'), ['controller' => 'Vehiclestatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicletypes'), ['controller' => 'Vehicletypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicletype'), ['controller' => 'Vehicletypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Worklorderlineitems'), ['controller' => 'Worklorderlineitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Worklorderlineitem'), ['controller' => 'Worklorderlineitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorderdocuments'), ['controller' => 'Workorderdocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorderdocument'), ['controller' => 'Workorderdocuments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorderstatuses'), ['controller' => 'Workorderstatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorderstatus'), ['controller' => 'Workorderstatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zonetypes'), ['controller' => 'Zonetypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zonetype'), ['controller' => 'Zonetypes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers form large-9 medium-8 columns content">
    <?= $this->Form->create($customer) ?>
    <fieldset>
        <legend><?= __('Edit Customer') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('srv_exp_date', ['empty' => true]);
            echo $this->Form->input('contact_first_name');
            echo $this->Form->input('tech_cont_first_name');
            echo $this->Form->input('alert_email');
            echo $this->Form->input('srv_str_date', ['empty' => true]);
            echo $this->Form->input('no_of_lic');
            echo $this->Form->input('contact_phone');
            echo $this->Form->input('tech_cont_phone');
            echo $this->Form->input('address');
            echo $this->Form->input('contact_last_name');
            echo $this->Form->input('tech_cont_last_name');
            echo $this->Form->input('contact_email');
            echo $this->Form->input('city');
            echo $this->Form->input('state');
            echo $this->Form->input('country');
            echo $this->Form->input('zip');
            echo $this->Form->input('designation');
            echo $this->Form->input('parent_customer');
            echo $this->Form->input('fax');
            echo $this->Form->input('timezone');
            echo $this->Form->input('language');
            echo $this->Form->input('smsenabled');
            echo $this->Form->input('mapregion_id');
            echo $this->Form->input('customertype_id');
            echo $this->Form->input('initlat');
            echo $this->Form->input('initlong');
            echo $this->Form->input('updategroup');
            echo $this->Form->input('weekly_off1');
            echo $this->Form->input('weekly_off2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
