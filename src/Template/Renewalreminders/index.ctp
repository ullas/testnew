<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="renewalreminders index large-9 medium-8 columns content">
    <h3><?= __('Renewalreminders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('renewalstype_id') ?></th>
                <th><?= $this->Paginator->sort('duedate') ?></th>
                <th><?= $this->Paginator->sort('timethreashold') ?></th>
                <th><?= $this->Paginator->sort('notificationrequired') ?></th>
                <th><?= $this->Paginator->sort('distributionlist_id') ?></th>
                <th><?= $this->Paginator->sort('group_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($renewalreminders as $renewalreminder): ?>
            <tr>
                <td><?= $this->Number->format($renewalreminder->id) ?></td>
                <td><?= $this->Number->format($renewalreminder->renewalstype_id) ?></td>
                <td><?= $this->Number->format($renewalreminder->duedate) ?></td>
                <td><?= $this->Number->format($renewalreminder->timethreashold) ?></td>
                <td><?= h($renewalreminder->notificationrequired) ?></td>
                <td><?= $renewalreminder->has('distributionlist') ? $this->Html->link($renewalreminder->distributionlist->name, ['controller' => 'Distributionlists', 'action' => 'view', $renewalreminder->distributionlist->id]) : '' ?></td>
                <td><?= $renewalreminder->has('group') ? $this->Html->link($renewalreminder->group->name, ['controller' => 'Groups', 'action' => 'view', $renewalreminder->group->id]) : '' ?></td>
                <td><?= $renewalreminder->has('customer') ? $this->Html->link($renewalreminder->customer->name, ['controller' => 'Customers', 'action' => 'view', $renewalreminder->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $renewalreminder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $renewalreminder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $renewalreminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminder->id)]) ?>
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
