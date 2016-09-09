<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Renewalreminder'), ['action' => 'edit', $renewalreminder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Renewalreminder'), ['action' => 'delete', $renewalreminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="renewalreminders view large-9 medium-8 columns content">
    <h3><?= h($renewalreminder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Distributionlist') ?></th>
            <td><?= $renewalreminder->has('distributionlist') ? $this->Html->link($renewalreminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $renewalreminder->distributionlist->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $renewalreminder->has('group') ? $this->Html->link($renewalreminder->group->name, ['controller' => 'Groups', 'action' => 'view', $renewalreminder->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $renewalreminder->has('customer') ? $this->Html->link($renewalreminder->customer->name, ['controller' => 'Customers', 'action' => 'view', $renewalreminder->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($renewalreminder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Renewalstype Id') ?></th>
            <td><?= $this->Number->format($renewalreminder->renewalstype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Duedate') ?></th>
            <td><?= $this->Number->format($renewalreminder->duedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Timethreashold') ?></th>
            <td><?= $this->Number->format($renewalreminder->timethreashold) ?></td>
        </tr>
        <tr>
            <th><?= __('Notificationrequired') ?></th>
            <td><?= $renewalreminder->notificationrequired ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
