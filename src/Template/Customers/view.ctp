<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fences'), ['controller' => 'Fences', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fence'), ['controller' => 'Fences', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ibuttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ibutton'), ['controller' => 'Ibuttons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspections'), ['controller' => 'Inspections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspection'), ['controller' => 'Inspections', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issues'), ['controller' => 'Issues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issue'), ['controller' => 'Issues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Measurementunits'), ['controller' => 'Measurementunits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Measurementunit'), ['controller' => 'Measurementunits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ownerships'), ['controller' => 'Ownerships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ownership'), ['controller' => 'Ownerships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partcategories'), ['controller' => 'Partcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partcategory'), ['controller' => 'Partcategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passengergroups'), ['controller' => 'Passengergroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passengergroup'), ['controller' => 'Passengergroups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purposes'), ['controller' => 'Purposes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purpose'), ['controller' => 'Purposes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['controller' => 'Renewalreminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['controller' => 'Renewalreminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Renewalstypes'), ['controller' => 'Renewalstypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renewalstype'), ['controller' => 'Renewalstypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfids'), ['controller' => 'Rfids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid'), ['controller' => 'Rfids', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['controller' => 'Routes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['controller' => 'Routes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['controller' => 'Servicereminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['controller' => 'Servicereminders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicetasks'), ['controller' => 'Servicetasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicetask'), ['controller' => 'Servicetasks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['controller' => 'Subscriptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription'), ['controller' => 'Subscriptions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Symbols'), ['controller' => 'Symbols', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symbol'), ['controller' => 'Symbols', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Templatetypes'), ['controller' => 'Templatetypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Templatetype'), ['controller' => 'Templatetypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclecategories'), ['controller' => 'Vehiclecategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclecategory'), ['controller' => 'Vehiclecategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclestatuses'), ['controller' => 'Vehiclestatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclestatus'), ['controller' => 'Vehiclestatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicletypes'), ['controller' => 'Vehicletypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicletype'), ['controller' => 'Vehicletypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Worklorderlineitems'), ['controller' => 'Worklorderlineitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Worklorderlineitem'), ['controller' => 'Worklorderlineitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workorderdocuments'), ['controller' => 'Workorderdocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorderdocument'), ['controller' => 'Workorderdocuments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workorderstatuses'), ['controller' => 'Workorderstatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorderstatus'), ['controller' => 'Workorderstatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zonetypes'), ['controller' => 'Zonetypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zonetype'), ['controller' => 'Zonetypes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($customer->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact First Name') ?></th>
            <td><?= h($customer->contact_first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Tech Cont First Name') ?></th>
            <td><?= h($customer->tech_cont_first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert Email') ?></th>
            <td><?= h($customer->alert_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Phone') ?></th>
            <td><?= h($customer->contact_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Tech Cont Phone') ?></th>
            <td><?= h($customer->tech_cont_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Last Name') ?></th>
            <td><?= h($customer->contact_last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Tech Cont Last Name') ?></th>
            <td><?= h($customer->tech_cont_last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Email') ?></th>
            <td><?= h($customer->contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($customer->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($customer->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($customer->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip') ?></th>
            <td><?= h($customer->zip) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($customer->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($customer->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('No Of Lic') ?></th>
            <td><?= $this->Number->format($customer->no_of_lic) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Customer') ?></th>
            <td><?= $this->Number->format($customer->parent_customer) ?></td>
        </tr>
        <tr>
            <th><?= __('Timezone') ?></th>
            <td><?= $this->Number->format($customer->timezone) ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= $this->Number->format($customer->language) ?></td>
        </tr>
        <tr>
            <th><?= __('Mapregion Id') ?></th>
            <td><?= $this->Number->format($customer->mapregion_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Customertype Id') ?></th>
            <td><?= $this->Number->format($customer->customertype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initlat') ?></th>
            <td><?= $this->Number->format($customer->initlat) ?></td>
        </tr>
        <tr>
            <th><?= __('Initlong') ?></th>
            <td><?= $this->Number->format($customer->initlong) ?></td>
        </tr>
        <tr>
            <th><?= __('Updategroup') ?></th>
            <td><?= $this->Number->format($customer->updategroup) ?></td>
        </tr>
        <tr>
            <th><?= __('Weekly Off1') ?></th>
            <td><?= $this->Number->format($customer->weekly_off1) ?></td>
        </tr>
        <tr>
            <th><?= __('Weekly Off2') ?></th>
            <td><?= $this->Number->format($customer->weekly_off2) ?></td>
        </tr>
        <tr>
            <th><?= __('Srv Exp Date') ?></th>
            <td><?= h($customer->srv_exp_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Srv Str Date') ?></th>
            <td><?= h($customer->srv_str_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Smsenabled') ?></th>
            <td><?= $customer->smsenabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($customer->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Designation') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Mobile') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->name) ?></td>
                <td><?= h($addresses->designation) ?></td>
                <td><?= h($addresses->email) ?></td>
                <td><?= h($addresses->customer_id) ?></td>
                <td><?= h($addresses->mobile) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Contractors') ?></h4>
        <?php if (!empty($customer->contractors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Descrtption') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->contractors as $contractors): ?>
            <tr>
                <td><?= h($contractors->id) ?></td>
                <td><?= h($contractors->name) ?></td>
                <td><?= h($contractors->descrtption) ?></td>
                <td><?= h($contractors->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contractors', 'action' => 'view', $contractors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contractors', 'action' => 'edit', $contractors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contractors', 'action' => 'delete', $contractors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Departments') ?></h4>
        <?php if (!empty($customer->departments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->departments as $departments): ?>
            <tr>
                <td><?= h($departments->id) ?></td>
                <td><?= h($departments->name) ?></td>
                <td><?= h($departments->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Departments', 'action' => 'view', $departments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Departments', 'action' => 'edit', $departments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Departments', 'action' => 'delete', $departments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $departments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Devices') ?></h4>
        <?php if (!empty($customer->devices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Install Date') ?></th>
                <th><?= __('Installed By') ?></th>
                <th><?= __('Certified By') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Provider Id') ?></th>
                <th><?= __('Distance Type') ?></th>
                <th><?= __('Odometersupport') ?></th>
                <th><?= __('Initodometer') ?></th>
                <th><?= __('Devicemodel Id') ?></th>
                <th><?= __('Simcard Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->devices as $devices): ?>
            <tr>
                <td><?= h($devices->id) ?></td>
                <td><?= h($devices->code) ?></td>
                <td><?= h($devices->customer_id) ?></td>
                <td><?= h($devices->install_date) ?></td>
                <td><?= h($devices->installed_by) ?></td>
                <td><?= h($devices->certified_by) ?></td>
                <td><?= h($devices->comments) ?></td>
                <td><?= h($devices->provider_id) ?></td>
                <td><?= h($devices->distance_type) ?></td>
                <td><?= h($devices->odometersupport) ?></td>
                <td><?= h($devices->initodometer) ?></td>
                <td><?= h($devices->devicemodel_id) ?></td>
                <td><?= h($devices->simcard_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Distributionlists') ?></h4>
        <?php if (!empty($customer->distributionlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('System') ?></th>
                <th><?= __('Enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->distributionlists as $distributionlists): ?>
            <tr>
                <td><?= h($distributionlists->name) ?></td>
                <td><?= h($distributionlists->description) ?></td>
                <td><?= h($distributionlists->customer_id) ?></td>
                <td><?= h($distributionlists->id) ?></td>
                <td><?= h($distributionlists->system) ?></td>
                <td><?= h($distributionlists->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Distributionlists', 'action' => 'view', $distributionlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Distributionlists', 'action' => 'edit', $distributionlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Distributionlists', 'action' => 'delete', $distributionlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distributionlists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Drivers') ?></h4>
        <?php if (!empty($customer->drivers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Middlename') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Nationality') ?></th>
                <th><?= __('Idcardno') ?></th>
                <th><?= __('Licenceno') ?></th>
                <th><?= __('Licenceexpdate') ?></th>
                <th><?= __('Address Id') ?></th>
                <th><?= __('Nextofkin') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Ibutton Id') ?></th>
                <th><?= __('Drivingpassportno') ?></th>
                <th><?= __('Drivingpassportexp') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Drivinglicenseclass') ?></th>
                <th><?= __('Contractor Id') ?></th>
                <th><?= __('Station Id') ?></th>
                <th><?= __('Reporingtime') ?></th>
                <th><?= __('Offday1') ?></th>
                <th><?= __('Offday2') ?></th>
                <th><?= __('Supervisor Id') ?></th>
                <th><?= __('Isasupervisor') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->drivers as $drivers): ?>
            <tr>
                <td><?= h($drivers->id) ?></td>
                <td><?= h($drivers->firstname) ?></td>
                <td><?= h($drivers->middlename) ?></td>
                <td><?= h($drivers->lastname) ?></td>
                <td><?= h($drivers->dob) ?></td>
                <td><?= h($drivers->sex) ?></td>
                <td><?= h($drivers->nationality) ?></td>
                <td><?= h($drivers->idcardno) ?></td>
                <td><?= h($drivers->licenceno) ?></td>
                <td><?= h($drivers->licenceexpdate) ?></td>
                <td><?= h($drivers->address_id) ?></td>
                <td><?= h($drivers->nextofkin) ?></td>
                <td><?= h($drivers->comments) ?></td>
                <td><?= h($drivers->photo) ?></td>
                <td><?= h($drivers->ibutton_id) ?></td>
                <td><?= h($drivers->drivingpassportno) ?></td>
                <td><?= h($drivers->drivingpassportexp) ?></td>
                <td><?= h($drivers->customer_id) ?></td>
                <td><?= h($drivers->vehicle_id) ?></td>
                <td><?= h($drivers->drivinglicenseclass) ?></td>
                <td><?= h($drivers->contractor_id) ?></td>
                <td><?= h($drivers->station_id) ?></td>
                <td><?= h($drivers->reporingtime) ?></td>
                <td><?= h($drivers->offday1) ?></td>
                <td><?= h($drivers->offday2) ?></td>
                <td><?= h($drivers->supervisor_id) ?></td>
                <td><?= h($drivers->isasupervisor) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Drivers', 'action' => 'view', $drivers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Drivers', 'action' => 'edit', $drivers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Drivers', 'action' => 'delete', $drivers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fences') ?></h4>
        <?php if (!empty($customer->fences)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Fencedata') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Show On Map') ?></th>
                <th><?= __('Alerts On') ?></th>
                <th><?= __('Enter Alert') ?></th>
                <th><?= __('Enter In') ?></th>
                <th><?= __('Leave Alert') ?></th>
                <th><?= __('Leave Out') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Leave Out Time') ?></th>
                <th><?= __('Enter In Time') ?></th>
                <th><?= __('Zonetype Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->fences as $fences): ?>
            <tr>
                <td><?= h($fences->id) ?></td>
                <td><?= h($fences->name) ?></td>
                <td><?= h($fences->user_id) ?></td>
                <td><?= h($fences->fencedata) ?></td>
                <td><?= h($fences->group_id) ?></td>
                <td><?= h($fences->trackingobject_id) ?></td>
                <td><?= h($fences->show_on_map) ?></td>
                <td><?= h($fences->alerts_on) ?></td>
                <td><?= h($fences->enter_alert) ?></td>
                <td><?= h($fences->enter_in) ?></td>
                <td><?= h($fences->leave_alert) ?></td>
                <td><?= h($fences->leave_out) ?></td>
                <td><?= h($fences->customer_id) ?></td>
                <td><?= h($fences->leave_out_time) ?></td>
                <td><?= h($fences->enter_in_time) ?></td>
                <td><?= h($fences->zonetype_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fences', 'action' => 'view', $fences->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fences', 'action' => 'edit', $fences->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fences', 'action' => 'delete', $fences->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fences->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Gpsdata') ?></h4>
        <?php if (!empty($customer->gpsdata)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Imei') ?></th>
                <th><?= __('Gpstime') ?></th>
                <th><?= __('Msgdtime') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Speed') ?></th>
                <th><?= __('Heading') ?></th>
                <th><?= __('Altitude') ?></th>
                <th><?= __('Distance') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Odometer') ?></th>
                <th><?= __('Digitalvalues') ?></th>
                <th><?= __('Analogvalues') ?></th>
                <th><?= __('Acceleration') ?></th>
                <th><?= __('Deceleration') ?></th>
                <th><?= __('Extstatus') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Device Id') ?></th>
                <th><?= __('Location') ?></th>
                <th><?= __('Eventtype Id') ?></th>
                <th><?= __('Humidity') ?></th>
                <th><?= __('Temperature') ?></th>
                <th><?= __('Ibuttoncode') ?></th>
                <th><?= __('Supporttype') ?></th>
                <th><?= __('Servacc') ?></th>
                <th><?= __('Fuellevel') ?></th>
                <th><?= __('Batteryvoltage') ?></th>
                <th><?= __('Batterycurrent') ?></th>
                <th><?= __('Gsmsignal') ?></th>
                <th><?= __('Noofsatellite') ?></th>
                <th><?= __('Pcbtemp') ?></th>
                <th><?= __('Powersupply') ?></th>
                <th><?= __('Gpspwer') ?></th>
                <th><?= __('Fuelcounter') ?></th>
                <th><?= __('Canmessage') ?></th>
                <th><?= __('Extramessage') ?></th>
                <th><?= __('Tripstatus') ?></th>
                <th><?= __('Tripdistance') ?></th>
                <th><?= __('Activesimid') ?></th>
                <th><?= __('Additionalstat') ?></th>
                <th><?= __('Updatetime') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->gpsdata as $gpsdata): ?>
            <tr>
                <td><?= h($gpsdata->id) ?></td>
                <td><?= h($gpsdata->imei) ?></td>
                <td><?= h($gpsdata->gpstime) ?></td>
                <td><?= h($gpsdata->msgdtime) ?></td>
                <td><?= h($gpsdata->latitude) ?></td>
                <td><?= h($gpsdata->longitude) ?></td>
                <td><?= h($gpsdata->speed) ?></td>
                <td><?= h($gpsdata->heading) ?></td>
                <td><?= h($gpsdata->altitude) ?></td>
                <td><?= h($gpsdata->distance) ?></td>
                <td><?= h($gpsdata->status) ?></td>
                <td><?= h($gpsdata->odometer) ?></td>
                <td><?= h($gpsdata->digitalvalues) ?></td>
                <td><?= h($gpsdata->analogvalues) ?></td>
                <td><?= h($gpsdata->acceleration) ?></td>
                <td><?= h($gpsdata->deceleration) ?></td>
                <td><?= h($gpsdata->extstatus) ?></td>
                <td><?= h($gpsdata->trackingobject_id) ?></td>
                <td><?= h($gpsdata->customer_id) ?></td>
                <td><?= h($gpsdata->device_id) ?></td>
                <td><?= h($gpsdata->location) ?></td>
                <td><?= h($gpsdata->eventtype_id) ?></td>
                <td><?= h($gpsdata->humidity) ?></td>
                <td><?= h($gpsdata->temperature) ?></td>
                <td><?= h($gpsdata->ibuttoncode) ?></td>
                <td><?= h($gpsdata->supporttype) ?></td>
                <td><?= h($gpsdata->servacc) ?></td>
                <td><?= h($gpsdata->fuellevel) ?></td>
                <td><?= h($gpsdata->batteryvoltage) ?></td>
                <td><?= h($gpsdata->batterycurrent) ?></td>
                <td><?= h($gpsdata->gsmsignal) ?></td>
                <td><?= h($gpsdata->noofsatellite) ?></td>
                <td><?= h($gpsdata->pcbtemp) ?></td>
                <td><?= h($gpsdata->powersupply) ?></td>
                <td><?= h($gpsdata->gpspwer) ?></td>
                <td><?= h($gpsdata->fuelcounter) ?></td>
                <td><?= h($gpsdata->canmessage) ?></td>
                <td><?= h($gpsdata->extramessage) ?></td>
                <td><?= h($gpsdata->tripstatus) ?></td>
                <td><?= h($gpsdata->tripdistance) ?></td>
                <td><?= h($gpsdata->activesimid) ?></td>
                <td><?= h($gpsdata->additionalstat) ?></td>
                <td><?= h($gpsdata->updatetime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Gpsdata', 'action' => 'view', $gpsdata->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Gpsdata', 'action' => 'edit', $gpsdata->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Gpsdata', 'action' => 'delete', $gpsdata->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gpsdata->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ibuttons') ?></h4>
        <?php if (!empty($customer->ibuttons)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Driver Id') ?></th>
                <th><?= __('Privatekey') ?></th>
                <th><?= __('Dateofpurchase') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->ibuttons as $ibuttons): ?>
            <tr>
                <td><?= h($ibuttons->id) ?></td>
                <td><?= h($ibuttons->code) ?></td>
                <td><?= h($ibuttons->description) ?></td>
                <td><?= h($ibuttons->customer_id) ?></td>
                <td><?= h($ibuttons->driver_id) ?></td>
                <td><?= h($ibuttons->privatekey) ?></td>
                <td><?= h($ibuttons->dateofpurchase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ibuttons', 'action' => 'view', $ibuttons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ibuttons', 'action' => 'edit', $ibuttons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ibuttons', 'action' => 'delete', $ibuttons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ibuttons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Inspections') ?></h4>
        <?php if (!empty($customer->inspections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Descriptions') ?></th>
                <th><?= __('Inspectionfom Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->inspections as $inspections): ?>
            <tr>
                <td><?= h($inspections->id) ?></td>
                <td><?= h($inspections->name) ?></td>
                <td><?= h($inspections->descriptions) ?></td>
                <td><?= h($inspections->inspectionfom_id) ?></td>
                <td><?= h($inspections->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inspections', 'action' => 'view', $inspections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inspections', 'action' => 'edit', $inspections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inspections', 'action' => 'delete', $inspections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Issues') ?></h4>
        <?php if (!empty($customer->issues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Reportedon') ?></th>
                <th><?= __('Summary') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Odometer') ?></th>
                <th><?= __('Reportedby Id') ?></th>
                <th><?= __('Assignedto Id') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Duedate') ?></th>
                <th><?= __('Overdueodometer') ?></th>
                <th><?= __('Markasvoid') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Serviceentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->issues as $issues): ?>
            <tr>
                <td><?= h($issues->id) ?></td>
                <td><?= h($issues->vehicle_id) ?></td>
                <td><?= h($issues->reportedon) ?></td>
                <td><?= h($issues->summary) ?></td>
                <td><?= h($issues->description) ?></td>
                <td><?= h($issues->odometer) ?></td>
                <td><?= h($issues->reportedby_id) ?></td>
                <td><?= h($issues->assignedto_id) ?></td>
                <td><?= h($issues->tags) ?></td>
                <td><?= h($issues->duedate) ?></td>
                <td><?= h($issues->overdueodometer) ?></td>
                <td><?= h($issues->markasvoid) ?></td>
                <td><?= h($issues->customer_id) ?></td>
                <td><?= h($issues->workorder_id) ?></td>
                <td><?= h($issues->serviceentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Issues', 'action' => 'view', $issues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Issues', 'action' => 'edit', $issues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issues', 'action' => 'delete', $issues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Jobs') ?></h4>
        <?php if (!empty($customer->jobs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Jobdate') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Assigned By') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Jobtime') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Timepolicy Id') ?></th>
                <th><?= __('Template Id') ?></th>
                <th><?= __('Endcustomername') ?></th>
                <th><?= __('Endcustomermailid') ?></th>
                <th><?= __('Endcustomerphone') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Distance') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->jobs as $jobs): ?>
            <tr>
                <td><?= h($jobs->id) ?></td>
                <td><?= h($jobs->jobdate) ?></td>
                <td><?= h($jobs->trackingobject_id) ?></td>
                <td><?= h($jobs->assigned_by) ?></td>
                <td><?= h($jobs->title) ?></td>
                <td><?= h($jobs->description) ?></td>
                <td><?= h($jobs->jobtime) ?></td>
                <td><?= h($jobs->comments) ?></td>
                <td><?= h($jobs->customer_id) ?></td>
                <td><?= h($jobs->timepolicy_id) ?></td>
                <td><?= h($jobs->template_id) ?></td>
                <td><?= h($jobs->endcustomername) ?></td>
                <td><?= h($jobs->endcustomermailid) ?></td>
                <td><?= h($jobs->endcustomerphone) ?></td>
                <td><?= h($jobs->location_id) ?></td>
                <td><?= h($jobs->status) ?></td>
                <td><?= h($jobs->distance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Jobs', 'action' => 'view', $jobs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Jobs', 'action' => 'edit', $jobs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Jobs', 'action' => 'delete', $jobs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Locations') ?></h4>
        <?php if (!empty($customer->locations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Pointdata') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Accesslevel') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Reg Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->locations as $locations): ?>
            <tr>
                <td><?= h($locations->id) ?></td>
                <td><?= h($locations->pointdata) ?></td>
                <td><?= h($locations->name) ?></td>
                <td><?= h($locations->user_id) ?></td>
                <td><?= h($locations->customer_id) ?></td>
                <td><?= h($locations->accesslevel) ?></td>
                <td><?= h($locations->group_id) ?></td>
                <td><?= h($locations->reg_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Locations', 'action' => 'view', $locations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Locations', 'action' => 'edit', $locations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Locations', 'action' => 'delete', $locations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $locations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Manufacturers') ?></h4>
        <?php if (!empty($customer->manufacturers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->manufacturers as $manufacturers): ?>
            <tr>
                <td><?= h($manufacturers->id) ?></td>
                <td><?= h($manufacturers->name) ?></td>
                <td><?= h($manufacturers->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Manufacturers', 'action' => 'view', $manufacturers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Manufacturers', 'action' => 'edit', $manufacturers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Manufacturers', 'action' => 'delete', $manufacturers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $manufacturers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Measurementunits') ?></h4>
        <?php if (!empty($customer->measurementunits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->measurementunits as $measurementunits): ?>
            <tr>
                <td><?= h($measurementunits->id) ?></td>
                <td><?= h($measurementunits->name) ?></td>
                <td><?= h($measurementunits->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Measurementunits', 'action' => 'view', $measurementunits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Measurementunits', 'action' => 'edit', $measurementunits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Measurementunits', 'action' => 'delete', $measurementunits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measurementunits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ownerships') ?></h4>
        <?php if (!empty($customer->ownerships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->ownerships as $ownerships): ?>
            <tr>
                <td><?= h($ownerships->id) ?></td>
                <td><?= h($ownerships->name) ?></td>
                <td><?= h($ownerships->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ownerships', 'action' => 'view', $ownerships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ownerships', 'action' => 'edit', $ownerships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ownerships', 'action' => 'delete', $ownerships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownerships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Partcategories') ?></h4>
        <?php if (!empty($customer->partcategories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->partcategories as $partcategories): ?>
            <tr>
                <td><?= h($partcategories->id) ?></td>
                <td><?= h($partcategories->name) ?></td>
                <td><?= h($partcategories->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Partcategories', 'action' => 'view', $partcategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Partcategories', 'action' => 'edit', $partcategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Partcategories', 'action' => 'delete', $partcategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partcategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Passengergroups') ?></h4>
        <?php if (!empty($customer->passengergroups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('System') ?></th>
                <th><?= __('Enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->passengergroups as $passengergroups): ?>
            <tr>
                <td><?= h($passengergroups->id) ?></td>
                <td><?= h($passengergroups->name) ?></td>
                <td><?= h($passengergroups->description) ?></td>
                <td><?= h($passengergroups->customer_id) ?></td>
                <td><?= h($passengergroups->system) ?></td>
                <td><?= h($passengergroups->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passengergroups', 'action' => 'view', $passengergroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passengergroups', 'action' => 'edit', $passengergroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passengergroups', 'action' => 'delete', $passengergroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengergroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Passengers') ?></h4>
        <?php if (!empty($customer->passengers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Middle Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Age') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->passengers as $passengers): ?>
            <tr>
                <td><?= h($passengers->id) ?></td>
                <td><?= h($passengers->first_name) ?></td>
                <td><?= h($passengers->middle_name) ?></td>
                <td><?= h($passengers->last_name) ?></td>
                <td><?= h($passengers->active) ?></td>
                <td><?= h($passengers->sex) ?></td>
                <td><?= h($passengers->age) ?></td>
                <td><?= h($passengers->address) ?></td>
                <td><?= h($passengers->phone) ?></td>
                <td><?= h($passengers->mobile) ?></td>
                <td><?= h($passengers->comments) ?></td>
                <td><?= h($passengers->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passengers', 'action' => 'view', $passengers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passengers', 'action' => 'edit', $passengers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passengers', 'action' => 'delete', $passengers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Providers') ?></h4>
        <?php if (!empty($customer->providers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Modelno') ?></th>
                <th><?= __('Osver') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->providers as $providers): ?>
            <tr>
                <td><?= h($providers->id) ?></td>
                <td><?= h($providers->name) ?></td>
                <td><?= h($providers->description) ?></td>
                <td><?= h($providers->customer_id) ?></td>
                <td><?= h($providers->modelno) ?></td>
                <td><?= h($providers->osver) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Providers', 'action' => 'view', $providers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Providers', 'action' => 'edit', $providers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Providers', 'action' => 'delete', $providers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $providers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Purposes') ?></h4>
        <?php if (!empty($customer->purposes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->purposes as $purposes): ?>
            <tr>
                <td><?= h($purposes->id) ?></td>
                <td><?= h($purposes->name) ?></td>
                <td><?= h($purposes->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Purposes', 'action' => 'view', $purposes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Purposes', 'action' => 'edit', $purposes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purposes', 'action' => 'delete', $purposes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purposes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Renewalreminders') ?></h4>
        <?php if (!empty($customer->renewalreminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Renewalstype Id') ?></th>
                <th><?= __('Duedate') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->renewalreminders as $renewalreminders): ?>
            <tr>
                <td><?= h($renewalreminders->id) ?></td>
                <td><?= h($renewalreminders->renewalstype_id) ?></td>
                <td><?= h($renewalreminders->duedate) ?></td>
                <td><?= h($renewalreminders->timethreashold) ?></td>
                <td><?= h($renewalreminders->notificationrequired) ?></td>
                <td><?= h($renewalreminders->distributionlist_id) ?></td>
                <td><?= h($renewalreminders->group_id) ?></td>
                <td><?= h($renewalreminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Renewalreminders', 'action' => 'view', $renewalreminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Renewalreminders', 'action' => 'edit', $renewalreminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Renewalreminders', 'action' => 'delete', $renewalreminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Renewalstypes') ?></h4>
        <?php if (!empty($customer->renewalstypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->renewalstypes as $renewalstypes): ?>
            <tr>
                <td><?= h($renewalstypes->id) ?></td>
                <td><?= h($renewalstypes->name) ?></td>
                <td><?= h($renewalstypes->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Renewalstypes', 'action' => 'view', $renewalstypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Renewalstypes', 'action' => 'edit', $renewalstypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Renewalstypes', 'action' => 'delete', $renewalstypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalstypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Rfids') ?></h4>
        <?php if (!empty($customer->rfids)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Driver Id') ?></th>
                <th><?= __('Passenger Id') ?></th>
                <th><?= __('Privatekey') ?></th>
                <th><?= __('Dateofpurchase') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->rfids as $rfids): ?>
            <tr>
                <td><?= h($rfids->id) ?></td>
                <td><?= h($rfids->code) ?></td>
                <td><?= h($rfids->description) ?></td>
                <td><?= h($rfids->customer_id) ?></td>
                <td><?= h($rfids->driver_id) ?></td>
                <td><?= h($rfids->passenger_id) ?></td>
                <td><?= h($rfids->privatekey) ?></td>
                <td><?= h($rfids->dateofpurchase) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Rfids', 'action' => 'view', $rfids->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Rfids', 'action' => 'edit', $rfids->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Rfids', 'action' => 'delete', $rfids->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfids->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Routes') ?></h4>
        <?php if (!empty($customer->routes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Start Point') ?></th>
                <th><?= __('End Point') ?></th>
                <th><?= __('The Geom') ?></th>
                <th><?= __('Trackingobject Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Buffer Size') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Group Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->routes as $routes): ?>
            <tr>
                <td><?= h($routes->id) ?></td>
                <td><?= h($routes->start_point) ?></td>
                <td><?= h($routes->end_point) ?></td>
                <td><?= h($routes->the_geom) ?></td>
                <td><?= h($routes->trackingobject_id) ?></td>
                <td><?= h($routes->customer_id) ?></td>
                <td><?= h($routes->user_id) ?></td>
                <td><?= h($routes->buffer_size) ?></td>
                <td><?= h($routes->name) ?></td>
                <td><?= h($routes->group_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Routes', 'action' => 'view', $routes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Routes', 'action' => 'edit', $routes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Routes', 'action' => 'delete', $routes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $routes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($customer->schedules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Validfrom') ?></th>
                <th><?= __('Validtill') ?></th>
                <th><?= __('Startloc Id') ?></th>
                <th><?= __('Endloc Id') ?></th>
                <th><?= __('Route Id') ?></th>
                <th><?= __('Start Time') ?></th>
                <th><?= __('End Time') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Timepolicy Id') ?></th>
                <th><?= __('Default Driver Id') ?></th>
                <th><?= __('Default Veh Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Nodays') ?></th>
                <th><?= __('Brktime Bfr Nxt Trip') ?></th>
                <th><?= __('Default Paxgrpid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->schedules as $schedules): ?>
            <tr>
                <td><?= h($schedules->id) ?></td>
                <td><?= h($schedules->validfrom) ?></td>
                <td><?= h($schedules->validtill) ?></td>
                <td><?= h($schedules->startloc_id) ?></td>
                <td><?= h($schedules->endloc_id) ?></td>
                <td><?= h($schedules->route_id) ?></td>
                <td><?= h($schedules->start_time) ?></td>
                <td><?= h($schedules->end_time) ?></td>
                <td><?= h($schedules->customer_id) ?></td>
                <td><?= h($schedules->timepolicy_id) ?></td>
                <td><?= h($schedules->default_driver_id) ?></td>
                <td><?= h($schedules->default_veh_id) ?></td>
                <td><?= h($schedules->name) ?></td>
                <td><?= h($schedules->nodays) ?></td>
                <td><?= h($schedules->brktime_bfr_nxt_trip) ?></td>
                <td><?= h($schedules->default_paxgrpid) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schedules', 'action' => 'view', $schedules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schedules', 'action' => 'edit', $schedules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schedules', 'action' => 'delete', $schedules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicereminders') ?></h4>
        <?php if (!empty($customer->servicereminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicetask Id') ?></th>
                <th><?= __('Meterinterval') ?></th>
                <th><?= __('Daysinterval') ?></th>
                <th><?= __('Meterthreshold') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->servicereminders as $servicereminders): ?>
            <tr>
                <td><?= h($servicereminders->id) ?></td>
                <td><?= h($servicereminders->servicetask_id) ?></td>
                <td><?= h($servicereminders->meterinterval) ?></td>
                <td><?= h($servicereminders->daysinterval) ?></td>
                <td><?= h($servicereminders->meterthreshold) ?></td>
                <td><?= h($servicereminders->timethreashold) ?></td>
                <td><?= h($servicereminders->notificationrequired) ?></td>
                <td><?= h($servicereminders->distributionlist_id) ?></td>
                <td><?= h($servicereminders->group_id) ?></td>
                <td><?= h($servicereminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicereminders', 'action' => 'view', $servicereminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicereminders', 'action' => 'edit', $servicereminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicereminders', 'action' => 'delete', $servicereminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicereminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicetasks') ?></h4>
        <?php if (!empty($customer->servicetasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->servicetasks as $servicetasks): ?>
            <tr>
                <td><?= h($servicetasks->id) ?></td>
                <td><?= h($servicetasks->name) ?></td>
                <td><?= h($servicetasks->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicetasks', 'action' => 'view', $servicetasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicetasks', 'action' => 'edit', $servicetasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicetasks', 'action' => 'delete', $servicetasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicetasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stations') ?></h4>
        <?php if (!empty($customer->stations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->stations as $stations): ?>
            <tr>
                <td><?= h($stations->id) ?></td>
                <td><?= h($stations->name) ?></td>
                <td><?= h($stations->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Stations', 'action' => 'view', $stations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Stations', 'action' => 'edit', $stations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Stations', 'action' => 'delete', $stations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Subscriptions') ?></h4>
        <?php if (!empty($customer->subscriptions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Schedule Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Validfrom') ?></th>
                <th><?= __('Validtill') ?></th>
                <th><?= __('Location Id') ?></th>
                <th><?= __('Notification Id') ?></th>
                <th><?= __('Loctype') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->subscriptions as $subscriptions): ?>
            <tr>
                <td><?= h($subscriptions->id) ?></td>
                <td><?= h($subscriptions->schedule_id) ?></td>
                <td><?= h($subscriptions->customer_id) ?></td>
                <td><?= h($subscriptions->name) ?></td>
                <td><?= h($subscriptions->active) ?></td>
                <td><?= h($subscriptions->validfrom) ?></td>
                <td><?= h($subscriptions->validtill) ?></td>
                <td><?= h($subscriptions->location_id) ?></td>
                <td><?= h($subscriptions->notification_id) ?></td>
                <td><?= h($subscriptions->loctype) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Subscriptions', 'action' => 'view', $subscriptions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Subscriptions', 'action' => 'edit', $subscriptions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Subscriptions', 'action' => 'delete', $subscriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscriptions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Symbols') ?></h4>
        <?php if (!empty($customer->symbols)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Symbol') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->symbols as $symbols): ?>
            <tr>
                <td><?= h($symbols->id) ?></td>
                <td><?= h($symbols->name) ?></td>
                <td><?= h($symbols->symbol) ?></td>
                <td><?= h($symbols->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Symbols', 'action' => 'view', $symbols->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Symbols', 'action' => 'edit', $symbols->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Symbols', 'action' => 'delete', $symbols->id], ['confirm' => __('Are you sure you want to delete # {0}?', $symbols->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Templates') ?></h4>
        <?php if (!empty($customer->templates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Templatetype Id') ?></th>
                <th><?= __('Alertcategory Id') ?></th>
                <th><?= __('Template') ?></th>
                <th><?= __('Subject') ?></th>
                <th><?= __('Templatecat') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->templates as $templates): ?>
            <tr>
                <td><?= h($templates->id) ?></td>
                <td><?= h($templates->customer_id) ?></td>
                <td><?= h($templates->name) ?></td>
                <td><?= h($templates->description) ?></td>
                <td><?= h($templates->templatetype_id) ?></td>
                <td><?= h($templates->alertcategory_id) ?></td>
                <td><?= h($templates->template) ?></td>
                <td><?= h($templates->subject) ?></td>
                <td><?= h($templates->templatecat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Templates', 'action' => 'view', $templates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Templates', 'action' => 'edit', $templates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Templates', 'action' => 'delete', $templates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Templatetypes') ?></h4>
        <?php if (!empty($customer->templatetypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->templatetypes as $templatetypes): ?>
            <tr>
                <td><?= h($templatetypes->id) ?></td>
                <td><?= h($templatetypes->name) ?></td>
                <td><?= h($templatetypes->description) ?></td>
                <td><?= h($templatetypes->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Templatetypes', 'action' => 'view', $templatetypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Templatetypes', 'action' => 'edit', $templatetypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Templatetypes', 'action' => 'delete', $templatetypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templatetypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Timepolicies') ?></h4>
        <?php if (!empty($customer->timepolicies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Sunday') ?></th>
                <th><?= __('Monday') ?></th>
                <th><?= __('Tuesday') ?></th>
                <th><?= __('Wednesday') ?></th>
                <th><?= __('Thursday') ?></th>
                <th><?= __('Friday') ?></th>
                <th><?= __('Saturday') ?></th>
                <th><?= __('Sun Start Time') ?></th>
                <th><?= __('Sun End Time') ?></th>
                <th><?= __('Mon Start Time') ?></th>
                <th><?= __('Mon End Time') ?></th>
                <th><?= __('Tue Start Time') ?></th>
                <th><?= __('Tue End Time') ?></th>
                <th><?= __('Wed Start Time') ?></th>
                <th><?= __('Wed End Time') ?></th>
                <th><?= __('Thu Start Time') ?></th>
                <th><?= __('Thu End Time') ?></th>
                <th><?= __('Fri Start Time') ?></th>
                <th><?= __('Fri End Time') ?></th>
                <th><?= __('Sat Start Time') ?></th>
                <th><?= __('Sat End Time') ?></th>
                <th><?= __('Ev') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('System') ?></th>
                <th><?= __('Enabled') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->timepolicies as $timepolicies): ?>
            <tr>
                <td><?= h($timepolicies->name) ?></td>
                <td><?= h($timepolicies->sunday) ?></td>
                <td><?= h($timepolicies->monday) ?></td>
                <td><?= h($timepolicies->tuesday) ?></td>
                <td><?= h($timepolicies->wednesday) ?></td>
                <td><?= h($timepolicies->thursday) ?></td>
                <td><?= h($timepolicies->friday) ?></td>
                <td><?= h($timepolicies->saturday) ?></td>
                <td><?= h($timepolicies->sun_start_time) ?></td>
                <td><?= h($timepolicies->sun_end_time) ?></td>
                <td><?= h($timepolicies->mon_start_time) ?></td>
                <td><?= h($timepolicies->mon_end_time) ?></td>
                <td><?= h($timepolicies->tue_start_time) ?></td>
                <td><?= h($timepolicies->tue_end_time) ?></td>
                <td><?= h($timepolicies->wed_start_time) ?></td>
                <td><?= h($timepolicies->wed_end_time) ?></td>
                <td><?= h($timepolicies->thu_start_time) ?></td>
                <td><?= h($timepolicies->thu_end_time) ?></td>
                <td><?= h($timepolicies->fri_start_time) ?></td>
                <td><?= h($timepolicies->fri_end_time) ?></td>
                <td><?= h($timepolicies->sat_start_time) ?></td>
                <td><?= h($timepolicies->sat_end_time) ?></td>
                <td><?= h($timepolicies->ev) ?></td>
                <td><?= h($timepolicies->id) ?></td>
                <td><?= h($timepolicies->customer_id) ?></td>
                <td><?= h($timepolicies->system) ?></td>
                <td><?= h($timepolicies->enabled) ?></td>
                <td><?= h($timepolicies->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Timepolicies', 'action' => 'view', $timepolicies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Timepolicies', 'action' => 'edit', $timepolicies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Timepolicies', 'action' => 'delete', $timepolicies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timepolicies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trackingobjects') ?></h4>
        <?php if (!empty($customer->trackingobjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Assettype Id') ?></th>
                <th><?= __('Created Date') ?></th>
                <th><?= __('Modifield Date') ?></th>
                <th><?= __('Public Asset') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->trackingobjects as $trackingobjects): ?>
            <tr>
                <td><?= h($trackingobjects->id) ?></td>
                <td><?= h($trackingobjects->name) ?></td>
                <td><?= h($trackingobjects->assettype_id) ?></td>
                <td><?= h($trackingobjects->created_date) ?></td>
                <td><?= h($trackingobjects->modifield_date) ?></td>
                <td><?= h($trackingobjects->public_asset) ?></td>
                <td><?= h($trackingobjects->is_active) ?></td>
                <td><?= h($trackingobjects->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trackingobjects', 'action' => 'view', $trackingobjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trackingobjects', 'action' => 'edit', $trackingobjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trackingobjects', 'action' => 'delete', $trackingobjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Trips') ?></h4>
        <?php if (!empty($customer->trips)): ?>
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
                <th><?= __('Passengergroup Id') ?></th>
                <th><?= __('Autogen') ?></th>
                <th><?= __('Tripstatus Id') ?></th>
                <th><?= __('Last Location') ?></th>
                <th><?= __('Canceled') ?></th>
                <th><?= __('Active') ?></th>
                <th><?= __('Fromitinerary') ?></th>
                <th><?= __('Trackingcode') ?></th>
                <th><?= __('Adt') ?></th>
                <th><?= __('Aat') ?></th>
                <th><?= __('Edt') ?></th>
                <th><?= __('Eat') ?></th>
                <th><?= __('Vehiclecategory Id') ?></th>
                <th><?= __('Platform') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->trips as $trips): ?>
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
                <td><?= h($trips->passengergroup_id) ?></td>
                <td><?= h($trips->autogen) ?></td>
                <td><?= h($trips->tripstatus_id) ?></td>
                <td><?= h($trips->last_location) ?></td>
                <td><?= h($trips->canceled) ?></td>
                <td><?= h($trips->active) ?></td>
                <td><?= h($trips->fromitinerary) ?></td>
                <td><?= h($trips->trackingcode) ?></td>
                <td><?= h($trips->adt) ?></td>
                <td><?= h($trips->aat) ?></td>
                <td><?= h($trips->edt) ?></td>
                <td><?= h($trips->eat) ?></td>
                <td><?= h($trips->vehiclecategory_id) ?></td>
                <td><?= h($trips->platform) ?></td>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($customer->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Username') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Onlinestat') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->onlinestat) ?></td>
                <td><?= h($users->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehiclecategories') ?></h4>
        <?php if (!empty($customer->vehiclecategories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->vehiclecategories as $vehiclecategories): ?>
            <tr>
                <td><?= h($vehiclecategories->id) ?></td>
                <td><?= h($vehiclecategories->customer_id) ?></td>
                <td><?= h($vehiclecategories->name) ?></td>
                <td><?= h($vehiclecategories->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehiclecategories', 'action' => 'view', $vehiclecategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiclecategories', 'action' => 'edit', $vehiclecategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehiclecategories', 'action' => 'delete', $vehiclecategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclecategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehiclestatuses') ?></h4>
        <?php if (!empty($customer->vehiclestatuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->vehiclestatuses as $vehiclestatuses): ?>
            <tr>
                <td><?= h($vehiclestatuses->id) ?></td>
                <td><?= h($vehiclestatuses->name) ?></td>
                <td><?= h($vehiclestatuses->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehiclestatuses', 'action' => 'view', $vehiclestatuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiclestatuses', 'action' => 'edit', $vehiclestatuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehiclestatuses', 'action' => 'delete', $vehiclestatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclestatuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vehicletypes') ?></h4>
        <?php if (!empty($customer->vehicletypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->vehicletypes as $vehicletypes): ?>
            <tr>
                <td><?= h($vehicletypes->id) ?></td>
                <td><?= h($vehicletypes->name) ?></td>
                <td><?= h($vehicletypes->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicletypes', 'action' => 'view', $vehicletypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicletypes', 'action' => 'edit', $vehicletypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicletypes', 'action' => 'delete', $vehicletypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicletypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Vendors') ?></h4>
        <?php if (!empty($customer->vendors)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Website') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Addressline2') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Zippostal') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('Contactname') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Contactphone') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->vendors as $vendors): ?>
            <tr>
                <td><?= h($vendors->id) ?></td>
                <td><?= h($vendors->name) ?></td>
                <td><?= h($vendors->phone) ?></td>
                <td><?= h($vendors->website) ?></td>
                <td><?= h($vendors->address) ?></td>
                <td><?= h($vendors->addressline2) ?></td>
                <td><?= h($vendors->city) ?></td>
                <td><?= h($vendors->state) ?></td>
                <td><?= h($vendors->zippostal) ?></td>
                <td><?= h($vendors->country) ?></td>
                <td><?= h($vendors->contactname) ?></td>
                <td><?= h($vendors->email) ?></td>
                <td><?= h($vendors->contactphone) ?></td>
                <td><?= h($vendors->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vendors', 'action' => 'view', $vendors->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vendors', 'action' => 'edit', $vendors->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vendors', 'action' => 'delete', $vendors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendors->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Worklorderlineitems') ?></h4>
        <?php if (!empty($customer->worklorderlineitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Workordertype Id') ?></th>
                <th><?= __('Labour') ?></th>
                <th><?= __('Parts') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->worklorderlineitems as $worklorderlineitems): ?>
            <tr>
                <td><?= h($worklorderlineitems->id) ?></td>
                <td><?= h($worklorderlineitems->name) ?></td>
                <td><?= h($worklorderlineitems->workorder_id) ?></td>
                <td><?= h($worklorderlineitems->workordertype_id) ?></td>
                <td><?= h($worklorderlineitems->labour) ?></td>
                <td><?= h($worklorderlineitems->parts) ?></td>
                <td><?= h($worklorderlineitems->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Worklorderlineitems', 'action' => 'view', $worklorderlineitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Worklorderlineitems', 'action' => 'edit', $worklorderlineitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Worklorderlineitems', 'action' => 'delete', $worklorderlineitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $worklorderlineitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Workorderdocuments') ?></h4>
        <?php if (!empty($customer->workorderdocuments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->workorderdocuments as $workorderdocuments): ?>
            <tr>
                <td><?= h($workorderdocuments->id) ?></td>
                <td><?= h($workorderdocuments->workorder_id) ?></td>
                <td><?= h($workorderdocuments->name) ?></td>
                <td><?= h($workorderdocuments->data) ?></td>
                <td><?= h($workorderdocuments->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Workorderdocuments', 'action' => 'view', $workorderdocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Workorderdocuments', 'action' => 'edit', $workorderdocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workorderdocuments', 'action' => 'delete', $workorderdocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorderdocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Workorderstatuses') ?></h4>
        <?php if (!empty($customer->workorderstatuses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->workorderstatuses as $workorderstatuses): ?>
            <tr>
                <td><?= h($workorderstatuses->id) ?></td>
                <td><?= h($workorderstatuses->name) ?></td>
                <td><?= h($workorderstatuses->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Workorderstatuses', 'action' => 'view', $workorderstatuses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Workorderstatuses', 'action' => 'edit', $workorderstatuses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workorderstatuses', 'action' => 'delete', $workorderstatuses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorderstatuses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Zonetypes') ?></h4>
        <?php if (!empty($customer->zonetypes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($customer->zonetypes as $zonetypes): ?>
            <tr>
                <td><?= h($zonetypes->id) ?></td>
                <td><?= h($zonetypes->name) ?></td>
                <td><?= h($zonetypes->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Zonetypes', 'action' => 'view', $zonetypes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Zonetypes', 'action' => 'edit', $zonetypes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Zonetypes', 'action' => 'delete', $zonetypes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zonetypes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
