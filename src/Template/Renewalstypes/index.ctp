<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Renewalstype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['controller' => 'Renewalreminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['controller' => 'Renewalreminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="renewalstypes index large-9 medium-8 columns content">
    <h3><?= __('Renewalstypes') ?></h3>
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
            <?php foreach ($renewalstypes as $renewalstype): ?>
            <tr>
                <td><?= $this->Number->format($renewalstype->id) ?></td>
                <td><?= h($renewalstype->name) ?></td>
                <td><?= $renewalstype->has('customer') ? $this->Html->link($renewalstype->customer->name, ['controller' => 'Customers', 'action' => 'view', $renewalstype->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $renewalstype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $renewalstype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $renewalstype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $renewalstype->id)]) ?>
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
