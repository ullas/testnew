<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Eventtype'), ['action' => 'edit', $eventtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Eventtype'), ['action' => 'delete', $eventtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Eventtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventtypes view large-9 medium-8 columns content">
    <h3><?= h($eventtype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($eventtype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($eventtype->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventtype->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= $this->Number->format($eventtype->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Provider') ?></th>
            <td><?= $this->Number->format($eventtype->provider) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Gpsdata') ?></h4>
        <?php if (!empty($eventtype->gpsdata)): ?>
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
            <?php foreach ($eventtype->gpsdata as $gpsdata): ?>
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
</div>
