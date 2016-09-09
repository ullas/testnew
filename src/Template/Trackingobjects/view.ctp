<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trackingobject'), ['action' => 'edit', $trackingobject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trackingobject'), ['action' => 'delete', $trackingobject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assettypes'), ['controller' => 'Assettypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assettype'), ['controller' => 'Assettypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trackingobjects view large-9 medium-8 columns content">
    <h3><?= h($trackingobject->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($trackingobject->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Assettype') ?></th>
            <td><?= $trackingobject->has('assettype') ? $this->Html->link($trackingobject->assettype->name, ['controller' => 'Assettypes', 'action' => 'view', $trackingobject->assettype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($trackingobject->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($trackingobject->customer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created Date') ?></th>
            <td><?= h($trackingobject->created_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Modifield Date') ?></th>
            <td><?= h($trackingobject->modifield_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Public Asset') ?></th>
            <td><?= $trackingobject->public_asset ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $trackingobject->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Gpsdata') ?></h4>
        <?php if (!empty($trackingobject->gpsdata)): ?>
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
            <?php foreach ($trackingobject->gpsdata as $gpsdata): ?>
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
        <h4><?= __('Related Vehicles') ?></h4>
        <?php if (!empty($trackingobject->vehicles)): ?>
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
                <th><?= __('Status') ?></th>
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
                <th><?= __('Purpose Id') ?></th>
                <th><?= __('Regstate') ?></th>
                <th><?= __('Color') ?></th>
                <th><?= __('Bodytype') ?></th>
                <th><?= __('Bodysubtype') ?></th>
                <th><?= __('MSRP') ?></th>
                <th><?= __('Photo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trackingobject->vehicles as $vehicles): ?>
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
                <td><?= h($vehicles->status) ?></td>
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
                <td><?= h($vehicles->purpose_id) ?></td>
                <td><?= h($vehicles->regstate) ?></td>
                <td><?= h($vehicles->color) ?></td>
                <td><?= h($vehicles->bodytype) ?></td>
                <td><?= h($vehicles->bodysubtype) ?></td>
                <td><?= h($vehicles->MSRP) ?></td>
                <td><?= h($vehicles->photo) ?></td>
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
