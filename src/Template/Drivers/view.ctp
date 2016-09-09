<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Driver'), ['action' => 'edit', $driver->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Driver'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contractors'), ['controller' => 'Contractors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contractor'), ['controller' => 'Contractors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Supervisors'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Supervisor'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ibuttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ibutton'), ['controller' => 'Ibuttons', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfids'), ['controller' => 'Rfids', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid'), ['controller' => 'Rfids', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivergroups'), ['controller' => 'Drivergroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Drivergroup'), ['controller' => 'Drivergroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="drivers view large-9 medium-8 columns content">
    <h3><?= h($driver->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($driver->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Middlename') ?></th>
            <td><?= h($driver->middlename) ?></td>
        </tr>
        <tr>
            <th><?= __('Lastname') ?></th>
            <td><?= h($driver->lastname) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality') ?></th>
            <td><?= h($driver->nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Idcardno') ?></th>
            <td><?= h($driver->idcardno) ?></td>
        </tr>
        <tr>
            <th><?= __('Licenceno') ?></th>
            <td><?= h($driver->licenceno) ?></td>
        </tr>
        <tr>
            <th><?= __('Licenceexpdate') ?></th>
            <td><?= h($driver->licenceexpdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= $driver->has('address') ? $this->Html->link($driver->address->name, ['controller' => 'Addresses', 'action' => 'view', $driver->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nextofkin') ?></th>
            <td><?= h($driver->nextofkin) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($driver->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Drivingpassportno') ?></th>
            <td><?= h($driver->drivingpassportno) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $driver->has('customer') ? $this->Html->link($driver->customer->name, ['controller' => 'Customers', 'action' => 'view', $driver->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Drivinglicenseclass') ?></th>
            <td><?= h($driver->drivinglicenseclass) ?></td>
        </tr>
        <tr>
            <th><?= __('Contractor') ?></th>
            <td><?= $driver->has('contractor') ? $this->Html->link($driver->contractor->name, ['controller' => 'Contractors', 'action' => 'view', $driver->contractor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $driver->has('station') ? $this->Html->link($driver->station->name, ['controller' => 'Stations', 'action' => 'view', $driver->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Supervisor') ?></th>
            <td><?= $driver->has('supervisor') ? $this->Html->link($driver->supervisor->id, ['controller' => 'Drivers', 'action' => 'view', $driver->supervisor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($driver->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sex') ?></th>
            <td><?= $this->Number->format($driver->sex) ?></td>
        </tr>
        <tr>
            <th><?= __('Ibutton Id') ?></th>
            <td><?= $this->Number->format($driver->ibutton_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle Id') ?></th>
            <td><?= $this->Number->format($driver->vehicle_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Offday1') ?></th>
            <td><?= $this->Number->format($driver->offday1) ?></td>
        </tr>
        <tr>
            <th><?= __('Offday2') ?></th>
            <td><?= $this->Number->format($driver->offday2) ?></td>
        </tr>
        <tr>
            <th><?= __('Dob') ?></th>
            <td><?= h($driver->dob) ?></td>
        </tr>
        <tr>
            <th><?= __('Drivingpassportexp') ?></th>
            <td><?= h($driver->drivingpassportexp) ?></td>
        </tr>
        <tr>
            <th><?= __('Reporingtime') ?></th>
            <td><?= h($driver->reporingtime) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Photo') ?></h4>
        <?= $this->Text->autoParagraph(h($driver->photo)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ibuttons') ?></h4>
        <?php if (!empty($driver->ibuttons)): ?>
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
            <?php foreach ($driver->ibuttons as $ibuttons): ?>
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
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($driver->vehicles)): ?>
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
            <?php foreach ($driver->vehicles as $vehicles): ?>
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
    <div class="related">
        <h4><?= __('Related Rfids') ?></h4>
        <?php if (!empty($driver->rfids)): ?>
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
            <?php foreach ($driver->rfids as $rfids): ?>
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
        <h4><?= __('Related Drivergroups') ?></h4>
        <?php if (!empty($driver->drivergroups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Defaultdriver Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($driver->drivergroups as $drivergroups): ?>
            <tr>
                <td><?= h($drivergroups->id) ?></td>
                <td><?= h($drivergroups->name) ?></td>
                <td><?= h($drivergroups->description) ?></td>
                <td><?= h($drivergroups->defaultdriver_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Drivergroups', 'action' => 'view', $drivergroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Drivergroups', 'action' => 'edit', $drivergroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Drivergroups', 'action' => 'delete', $drivergroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivergroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
