<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Inspection'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionfoms'), ['controller' => 'Inspectionfoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionfom'), ['controller' => 'Inspectionfoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspections index large-9 medium-8 columns content">
    <h3><?= __('Inspections') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('descriptions') ?></th>
                <th><?= $this->Paginator->sort('inspectionfom_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inspections as $inspection): ?>
            <tr>
                <td><?= $this->Number->format($inspection->id) ?></td>
                <td><?= h($inspection->name) ?></td>
                <td><?= h($inspection->descriptions) ?></td>
                <td><?= $inspection->has('inspectionfom') ? $this->Html->link($inspection->inspectionfom->name, ['controller' => 'Inspectionfoms', 'action' => 'view', $inspection->inspectionfom->id]) : '' ?></td>
                <td><?= $inspection->has('customer') ? $this->Html->link($inspection->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspection->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $inspection->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $inspection->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $inspection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspection->id)]) ?>
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
