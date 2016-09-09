<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passenger'), ['action' => 'edit', $passenger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passenger'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passengers view large-9 medium-8 columns content">
    <h3><?= h($passenger->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($passenger->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name') ?></th>
            <td><?= h($passenger->middle_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($passenger->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sex') ?></th>
            <td><?= h($passenger->sex) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($passenger->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($passenger->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($passenger->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($passenger->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $passenger->has('customer') ? $this->Html->link($passenger->customer->name, ['controller' => 'Customers', 'action' => 'view', $passenger->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($passenger->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Age') ?></th>
            <td><?= $this->Number->format($passenger->age) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $passenger->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
