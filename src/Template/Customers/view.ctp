<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ownerships'), ['controller' => 'Ownerships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ownership'), ['controller' => 'Ownerships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purposes'), ['controller' => 'Purposes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purpose'), ['controller' => 'Purposes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Symbols'), ['controller' => 'Symbols', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Symbol'), ['controller' => 'Symbols', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
    </table>
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
                <th><?= __('Contact Id') ?></th>
                <th><?= __('Nextofkin') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Ibutton Id') ?></th>
                <th><?= __('Rfid Id') ?></th>
                <th><?= __('Drivingpassportno') ?></th>
                <th><?= __('Drivingpassportexp') ?></th>
                <th><?= __('Isibutton') ?></th>
                <th><?= __('Isrfid') ?></th>
                <th><?= __('Customer Id') ?></th>
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
                <td><?= h($drivers->contact_id) ?></td>
                <td><?= h($drivers->nextofkin) ?></td>
                <td><?= h($drivers->comments) ?></td>
                <td><?= h($drivers->photo) ?></td>
                <td><?= h($drivers->ibutton_id) ?></td>
                <td><?= h($drivers->rfid_id) ?></td>
                <td><?= h($drivers->drivingpassportno) ?></td>
                <td><?= h($drivers->drivingpassportexp) ?></td>
                <td><?= h($drivers->isibutton) ?></td>
                <td><?= h($drivers->isrfid) ?></td>
                <td><?= h($drivers->customer_id) ?></td>
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
</div>
