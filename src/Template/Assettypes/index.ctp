<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Assettype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assettypes index large-9 medium-8 columns content">
    <h3><?= __('Assettypes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($assettypes as $assettype): ?>
            <tr>
                <td><?= $this->Number->format($assettype->id) ?></td>
                <td><?= h($assettype->name) ?></td>
                <td><?= h($assettype->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $assettype->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assettype->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assettype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assettype->id)]) ?>
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
