<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inspectionitem'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionitemtypes'), ['controller' => 'Inspectionitemtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionitemtype'), ['controller' => 'Inspectionitemtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionforms'), ['controller' => 'Inspectionforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionform'), ['controller' => 'Inspectionforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspectionitems index large-9 medium-8 columns content">
    <h3><?= __('Inspectionitems') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('inspectionitemtype_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inspectionitems as $inspectionitem): ?>
            <tr>
                <td><?= $this->Number->format($inspectionitem->id) ?></td>
                <td><?= $inspectionitem->has('inspectionitemtype') ? $this->Html->link($inspectionitem->inspectionitemtype->name, ['controller' => 'Inspectionitemtypes', 'action' => 'view', $inspectionitem->inspectionitemtype->id]) : '' ?></td>
                <td><?= h($inspectionitem->name) ?></td>
                <td><?= h($inspectionitem->description) ?></td>
                <td><?= $inspectionitem->has('customer') ? $this->Html->link($inspectionitem->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionitem->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inspectionitem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inspectionitem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspectionitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitem->id)]) ?>
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
