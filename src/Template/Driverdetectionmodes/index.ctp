<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Driverdetectionmode'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="driverdetectionmodes index large-9 medium-8 columns content">
    <h3><?= __('Driverdetectionmodes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($driverdetectionmodes as $driverdetectionmode): ?>
            <tr>
                <td><?= $this->Number->format($driverdetectionmode->id) ?></td>
                <td><?= h($driverdetectionmode->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $driverdetectionmode->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driverdetectionmode->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driverdetectionmode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driverdetectionmode->id)]) ?>
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
