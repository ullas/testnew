<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Timepolicy'), ['action' => 'edit', $timepolicy->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Timepolicy'), ['action' => 'delete', $timepolicy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timepolicy->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timepolicies view large-9 medium-8 columns content">
    <h3><?= h($timepolicy->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timepolicy->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $timepolicy->has('customer') ? $this->Html->link($timepolicy->customer->name, ['controller' => 'Customers', 'action' => 'view', $timepolicy->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($timepolicy->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timepolicy->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sun Start Time') ?></th>
            <td><?= h($timepolicy->sun_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sun End Time') ?></th>
            <td><?= h($timepolicy->sun_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Mon Start Time') ?></th>
            <td><?= h($timepolicy->mon_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Mon End Time') ?></th>
            <td><?= h($timepolicy->mon_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Tue Start Time') ?></th>
            <td><?= h($timepolicy->tue_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Tue End Time') ?></th>
            <td><?= h($timepolicy->tue_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Wed Start Time') ?></th>
            <td><?= h($timepolicy->wed_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Wed End Time') ?></th>
            <td><?= h($timepolicy->wed_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Thu Start Time') ?></th>
            <td><?= h($timepolicy->thu_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Thu End Time') ?></th>
            <td><?= h($timepolicy->thu_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Fri Start Time') ?></th>
            <td><?= h($timepolicy->fri_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Fri End Time') ?></th>
            <td><?= h($timepolicy->fri_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat Start Time') ?></th>
            <td><?= h($timepolicy->sat_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat End Time') ?></th>
            <td><?= h($timepolicy->sat_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sunday') ?></th>
            <td><?= $timepolicy->sunday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Monday') ?></th>
            <td><?= $timepolicy->monday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Tuesday') ?></th>
            <td><?= $timepolicy->tuesday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Wednesday') ?></th>
            <td><?= $timepolicy->wednesday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Thursday') ?></th>
            <td><?= $timepolicy->thursday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Friday') ?></th>
            <td><?= $timepolicy->friday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Saturday') ?></th>
            <td><?= $timepolicy->saturday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Ev') ?></th>
            <td><?= $timepolicy->ev ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('System') ?></th>
            <td><?= $timepolicy->system ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Enabled') ?></th>
            <td><?= $timepolicy->enabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($timepolicy->schedules)): ?>
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
            <?php foreach ($timepolicy->schedules as $schedules): ?>
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
        <h4><?= __('Related Trips') ?></h4>
        <?php if (!empty($timepolicy->trips)): ?>
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
                <th><?= __('Paxgroup Id') ?></th>
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
                <th><?= __('Vehiclecat Id') ?></th>
                <th><?= __('Platform') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($timepolicy->trips as $trips): ?>
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
                <td><?= h($trips->paxgroup_id) ?></td>
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
                <td><?= h($trips->vehiclecat_id) ?></td>
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
</div>
