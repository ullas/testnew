<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicetask'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['controller' => 'Servicereminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['controller' => 'Servicereminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicetasks index large-9 medium-8 columns content">
    <h3><?= __('Servicetasks') ?></h3>
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
            <?php foreach ($servicetasks as $servicetask): ?>
            <tr>
                <td><?= $this->Number->format($servicetask->id) ?></td>
                <td><?= h($servicetask->name) ?></td>
                <td><?= $servicetask->has('customer') ? $this->Html->link($servicetask->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicetask->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicetask->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicetask->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicetask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicetask->id)]) ?>
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
