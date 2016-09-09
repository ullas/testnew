<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subscription'), ['action' => 'edit', $subscription->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subscription'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subscription'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subscriptions view large-9 medium-8 columns content">
    <h3><?= h($subscription->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Schedule') ?></th>
            <td><?= $subscription->has('schedule') ? $this->Html->link($subscription->schedule->name, ['controller' => 'Schedules', 'action' => 'view', $subscription->schedule->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $subscription->has('customer') ? $this->Html->link($subscription->customer->name, ['controller' => 'Customers', 'action' => 'view', $subscription->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($subscription->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $subscription->has('location') ? $this->Html->link($subscription->location->name, ['controller' => 'Locations', 'action' => 'view', $subscription->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Loctype') ?></th>
            <td><?= h($subscription->loctype) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($subscription->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Notification Id') ?></th>
            <td><?= $this->Number->format($subscription->notification_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Validfrom') ?></th>
            <td><?= h($subscription->validfrom) ?></td>
        </tr>
        <tr>
            <th><?= __('Validtill') ?></th>
            <td><?= h($subscription->validtill) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $subscription->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
