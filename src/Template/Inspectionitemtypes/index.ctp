<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inspectionitemtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionitems'), ['controller' => 'Inspectionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionitem'), ['controller' => 'Inspectionitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspectionitemtypes index large-9 medium-8 columns content">
    <h3><?= __('Inspectionitemtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inspectionitemtypes as $inspectionitemtype): ?>
            <tr>
                <td><?= $this->Number->format($inspectionitemtype->id) ?></td>
                <td><?= h($inspectionitemtype->name) ?></td>
                <td><?= h($inspectionitemtype->description) ?></td>
                <td><?= $inspectionitemtype->has('customer') ? $this->Html->link($inspectionitemtype->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionitemtype->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inspectionitemtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inspectionitemtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspectionitemtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitemtype->id)]) ?>
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
