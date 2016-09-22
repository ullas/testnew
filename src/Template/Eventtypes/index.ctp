<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Eventtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventtypes index large-9 medium-8 columns content">
    <h3><?= __('Eventtypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('provider') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('model') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventtypes as $eventtype): ?>
            <tr>
                <td><?= $this->Number->format($eventtype->id) ?></td>
                <td><?= $this->Number->format($eventtype->code) ?></td>
                <td><?= $this->Number->format($eventtype->provider) ?></td>
                <td><?= h($eventtype->name) ?></td>
                <td><?= h($eventtype->model) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventtype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventtype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventtype->id)]) ?>
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
