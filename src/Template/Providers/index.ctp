<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providers index large-9 medium-8 columns content">
    <h3><?= __('Providers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('modelno') ?></th>
                <th><?= $this->Paginator->sort('osver') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($providers as $provider): ?>
            <tr>
                <td><?= $this->Number->format($provider->id) ?></td>
                <td><?= h($provider->name) ?></td>
                <td><?= h($provider->description) ?></td>
                <td><?= $provider->has('customer') ? $this->Html->link($provider->customer->name, ['controller' => 'Customers', 'action' => 'view', $provider->customer->id]) : '' ?></td>
                <td><?= h($provider->modelno) ?></td>
                <td><?= h($provider->osver) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $provider->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $provider->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $provider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provider->id)]) ?>
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
