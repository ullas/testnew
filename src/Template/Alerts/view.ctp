<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Alert'), ['action' => 'edit', $alert->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Alert'), ['action' => 'delete', $alert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alert->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Alerts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alert'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="alerts view large-9 medium-8 columns content">
    <h3><?= h($alert->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Alert') ?></th>
            <td><?= h($alert->alert) ?></td>
        </tr>
        <tr>
            <th><?= __('Trackingobject') ?></th>
            <td><?= $alert->has('trackingobject') ? $this->Html->link($alert->trackingobject->name, ['controller' => 'Trackingobjects', 'action' => 'view', $alert->trackingobject->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ack By') ?></th>
            <td><?= h($alert->ack_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($alert->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $alert->has('customer') ? $this->Html->link($alert->customer->name, ['controller' => 'Customers', 'action' => 'view', $alert->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Extinfo') ?></th>
            <td><?= h($alert->extinfo) ?></td>
        </tr>
        <tr>
            <th><?= __('Driver') ?></th>
            <td><?= $alert->has('driver') ? $this->Html->link($alert->driver->firstname, ['controller' => 'Drivers', 'action' => 'view', $alert->driver->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Driver Key') ?></th>
            <td><?= h($alert->driver_key) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($alert->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($alert->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($alert->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert Type') ?></th>
            <td><?= $this->Number->format($alert->alert_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Priority') ?></th>
            <td><?= $this->Number->format($alert->priority) ?></td>
        </tr>
        <tr>
            <th><?= __('Send Option') ?></th>
            <td><?= $this->Number->format($alert->send_option) ?></td>
        </tr>
        <tr>
            <th><?= __('Alertcategories Id') ?></th>
            <td><?= $this->Number->format($alert->alertcategories_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Velocity') ?></th>
            <td><?= $this->Number->format($alert->velocity) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification Send') ?></th>
            <td><?= $this->Number->format($alert->notification_send) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($alert->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Frid') ?></th>
            <td><?= $this->Number->format($alert->frid) ?></td>
        </tr>
        <tr>
            <th><?= __('Duration') ?></th>
            <td><?= $this->Number->format($alert->duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert Dtime') ?></th>
            <td><?= h($alert->alert_dtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Ack Dtime') ?></th>
            <td><?= h($alert->ack_dtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Endtime') ?></th>
            <td><?= h($alert->endtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Ack') ?></th>
            <td><?= $alert->ack ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
