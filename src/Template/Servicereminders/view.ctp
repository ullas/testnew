<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicereminder'), ['action' => 'edit', $servicereminder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicereminder'), ['action' => 'delete', $servicereminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicereminder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicereminders view large-9 medium-8 columns content">
    <h3><?= h($servicereminder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Distributionlist') ?></th>
            <td><?= $servicereminder->has('distributionlist') ? $this->Html->link($servicereminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $servicereminder->distributionlist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $servicereminder->has('group') ? $this->Html->link($servicereminder->group->name, ['controller' => 'Groups', 'action' => 'view', $servicereminder->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $servicereminder->has('customer') ? $this->Html->link($servicereminder->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicereminder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicereminder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Servicetask Id') ?></th>
            <td><?= $this->Number->format($servicereminder->servicetask_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Meterinterval') ?></th>
            <td><?= $this->Number->format($servicereminder->meterinterval) ?></td>
        </tr>
        <tr>
            <th><?= __('Daysinterval') ?></th>
            <td><?= $this->Number->format($servicereminder->daysinterval) ?></td>
        </tr>
        <tr>
            <th><?= __('Meterthreshold') ?></th>
            <td><?= $this->Number->format($servicereminder->meterthreshold) ?></td>
        </tr>
        <tr>
            <th><?= __('Timethreashold') ?></th>
            <td><?= $this->Number->format($servicereminder->timethreashold) ?></td>
        </tr>
        <tr>
            <th><?= __('Notificationrequired') ?></th>
            <td><?= $servicereminder->notificationrequired ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
