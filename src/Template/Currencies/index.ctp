<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehiclepurchases'), ['controller' => 'Vehiclepurchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiclepurchase'), ['controller' => 'Vehiclepurchases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="currencies index large-9 medium-8 columns content">
    <h3><?= __('Currencies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('abbrev') ?></th>
                <th><?= $this->Paginator->sort('symbol') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($currencies as $currency): ?>
            <tr>
                <td><?= $this->Number->format($currency->id) ?></td>
                <td><?= h($currency->name) ?></td>
                <td><?= h($currency->abbrev) ?></td>
                <td><?= h($currency->symbol) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $currency->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $currency->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]) ?>
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
