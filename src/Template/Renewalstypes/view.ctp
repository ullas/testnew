<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Renewalstype'), ['action' => 'edit', $renewalstype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Renewalstype'), ['action' => 'delete', $renewalstype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalstype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Renewalstypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renewalstype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['controller' => 'Renewalreminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['controller' => 'Renewalreminders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="renewalstypes view large-9 medium-8 columns content">
    <h3><?= h($renewalstype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($renewalstype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $renewalstype->has('customer') ? $this->Html->link($renewalstype->customer->name, ['controller' => 'Customers', 'action' => 'view', $renewalstype->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($renewalstype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Renewalreminders') ?></h4>
        <?php if (!empty($renewalstype->renewalreminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Renewalstype Id') ?></th>
                <th><?= __('Duedate') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($renewalstype->renewalreminders as $renewalreminders): ?>
            <tr>
                <td><?= h($renewalreminders->id) ?></td>
                <td><?= h($renewalreminders->renewalstype_id) ?></td>
                <td><?= h($renewalreminders->duedate) ?></td>
                <td><?= h($renewalreminders->timethreashold) ?></td>
                <td><?= h($renewalreminders->notificationrequired) ?></td>
                <td><?= h($renewalreminders->distributionlist_id) ?></td>
                <td><?= h($renewalreminders->group_id) ?></td>
                <td><?= h($renewalreminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Renewalreminders', 'action' => 'view', $renewalreminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Renewalreminders', 'action' => 'edit', $renewalreminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Renewalreminders', 'action' => 'delete', $renewalreminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
