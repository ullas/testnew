<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicereminders index large-9 medium-8 columns content">
    <h3><?= __('Servicereminders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('servicetask_id') ?></th>
                <th><?= $this->Paginator->sort('meterinterval') ?></th>
                <th><?= $this->Paginator->sort('daysinterval') ?></th>
                <th><?= $this->Paginator->sort('meterthreshold') ?></th>
                <th><?= $this->Paginator->sort('timethreashold') ?></th>
                <th><?= $this->Paginator->sort('notificationrequired') ?></th>
                <th><?= $this->Paginator->sort('distributionlist_id') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicereminders as $servicereminder): ?>
            <tr>
                <td><?= $this->Number->format($servicereminder->id) ?></td>
                <td><?= $this->Number->format($servicereminder->servicetask_id) ?></td>
                <td><?= $this->Number->format($servicereminder->meterinterval) ?></td>
                <td><?= $this->Number->format($servicereminder->daysinterval) ?></td>
                <td><?= $this->Number->format($servicereminder->meterthreshold) ?></td>
                <td><?= $this->Number->format($servicereminder->timethreashold) ?></td>
                <td><?= h($servicereminder->notificationrequired) ?></td>
                <td><?= $servicereminder->has('distributionlist') ? $this->Html->link($servicereminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $servicereminder->distributionlist->id]) : '' ?></td>
                <td><?= $servicereminder->has('group') ? $this->Html->link($servicereminder->group->name, ['controller' => 'Groups', 'action' => 'view', $servicereminder->group->id]) : '' ?></td>
                <td><?= $servicereminder->has('customer') ? $this->Html->link($servicereminder->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicereminder->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicereminder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicereminder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicereminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicereminder->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
