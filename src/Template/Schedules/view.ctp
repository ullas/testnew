<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $schedule->has('customer') ? $this->Html->link($schedule->customer->name, ['controller' => 'Customers', 'action' => 'view', $schedule->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($schedule->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Startloc Id') ?></th>
            <td><?= $this->Number->format($schedule->startloc_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Endloc Id') ?></th>
            <td><?= $this->Number->format($schedule->endloc_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Route Id') ?></th>
            <td><?= $this->Number->format($schedule->route_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy Id') ?></th>
            <td><?= $this->Number->format($schedule->timepolicy_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Driver Id') ?></th>
            <td><?= $this->Number->format($schedule->default_driver_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Veh Id') ?></th>
            <td><?= $this->Number->format($schedule->default_veh_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Nodays') ?></th>
            <td><?= $this->Number->format($schedule->nodays) ?></td>
        </tr>
        <tr>
            <th><?= __('Brktime Bfr Nxt Trip') ?></th>
            <td><?= $this->Number->format($schedule->brktime_bfr_nxt_trip) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Paxgrpid') ?></th>
            <td><?= $this->Number->format($schedule->default_paxgrpid) ?></td>
        </tr>
        <tr>
            <th><?= __('Validfrom') ?></th>
            <td><?= h($schedule->validfrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Validtill') ?></th>
            <td><?= h($schedule->validtill) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($schedule->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($schedule->end_time) ?></td>
        </tr>
    </table>
</div>
