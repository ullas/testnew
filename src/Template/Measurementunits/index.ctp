<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Measurementunit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parts'), ['controller' => 'Parts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Part'), ['controller' => 'Parts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="measurementunits index large-9 medium-8 columns content">
    <h3><?= __('Measurementunits') ?></h3>
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
            <?php foreach ($measurementunits as $measurementunit): ?>
            <tr>
                <td><?= $this->Number->format($measurementunit->id) ?></td>
                <td><?= h($measurementunit->name) ?></td>
                <td><?= $measurementunit->has('customer') ? $this->Html->link($measurementunit->customer->name, ['controller' => 'Customers', 'action' => 'view', $measurementunit->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $measurementunit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $measurementunit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $measurementunit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measurementunit->id)]) ?>
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
