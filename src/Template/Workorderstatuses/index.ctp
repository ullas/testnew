<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workorderstatus'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorders'), ['controller' => 'Workorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorder'), ['controller' => 'Workorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workorderstatuses index large-9 medium-8 columns content">
    <h3><?= __('Workorderstatuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workorderstatuses as $workorderstatus): ?>
            <tr>
                <td><?= $this->Number->format($workorderstatus->id) ?></td>
                <td><?= h($workorderstatus->name) ?></td>
                <td><?= $workorderstatus->has('customer') ? $this->Html->link($workorderstatus->customer->name, ['controller' => 'Customers', 'action' => 'view', $workorderstatus->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workorderstatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workorderstatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workorderstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorderstatus->id)]) ?>
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
