<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclecategory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclecategories index large-9 medium-8 columns content">
    <h3><?= __('Vehiclecategories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclecategories as $vehiclecategory): ?>
            <tr>
                <td><?= $this->Number->format($vehiclecategory->id) ?></td>
                <td><?= $vehiclecategory->has('customer') ? $this->Html->link($vehiclecategory->customer->name, ['controller' => 'Customers', 'action' => 'view', $vehiclecategory->customer->id]) : '' ?></td>
                <td><?= h($vehiclecategory->name) ?></td>
                <td><?= h($vehiclecategory->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclecategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclecategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclecategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclecategory->id)]) ?>
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
