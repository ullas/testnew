<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicecompleted'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['controller' => 'Servicesentries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['controller' => 'Servicesentries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicecompleted index large-9 medium-8 columns content">
    <h3><?= __('Servicecompleted') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('servicesentry_id') ?></th>
                <th><?= $this->Paginator->sort('servicescompleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicecompleted as $servicecompleted): ?>
            <tr>
                <td><?= $this->Number->format($servicecompleted->id) ?></td>
                <td><?= $servicecompleted->has('servicesentry') ? $this->Html->link($servicecompleted->servicesentry->id, ['controller' => 'Servicesentries', 'action' => 'view', $servicecompleted->servicesentry->id]) : '' ?></td>
                <td><?= h($servicecompleted->servicescompleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicecompleted->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicecompleted->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicecompleted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicecompleted->id)]) ?>
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
