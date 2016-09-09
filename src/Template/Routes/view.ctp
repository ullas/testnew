<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Route'), ['action' => 'edit', $route->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Route'), ['action' => 'delete', $route->id], ['confirm' => __('Are you sure you want to delete # {0}?', $route->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Routes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Route'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="routes view large-9 medium-8 columns content">
    <h3><?= h($route->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $route->has('vehicle') ? $this->Html->link($route->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $route->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $route->has('customer') ? $this->Html->link($route->customer->name, ['controller' => 'Customers', 'action' => 'view', $route->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $route->has('user') ? $this->Html->link($route->user->username, ['controller' => 'Users', 'action' => 'view', $route->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($route->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($route->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assetgroup Id') ?></th>
            <td><?= $this->Number->format($route->assetgroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Buffer Size') ?></th>
            <td><?= $this->Number->format($route->buffer_size) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehiclegroup Id') ?></th>
            <td><?= $this->Number->format($route->vehiclegroup_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Peoplegroup Id') ?></th>
            <td><?= $this->Number->format($route->peoplegroup_id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Start Point') ?></h4>
        <?= $this->Text->autoParagraph(h($route->start_point)); ?>
    </div>
    <div class="row">
        <h4><?= __('End Point') ?></h4>
        <?= $this->Text->autoParagraph(h($route->end_point)); ?>
    </div>
    <div class="row">
        <h4><?= __('The Geom') ?></h4>
        <?= $this->Text->autoParagraph(h($route->the_geom)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($route->schedules)): ?>
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
            <?php foreach ($route->schedules as $schedules): ?>
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
</div>
