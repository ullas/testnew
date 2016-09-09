<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Servicedocument'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['controller' => 'Servicesentries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['controller' => 'Servicesentries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicedocuments index large-9 medium-8 columns content">
    <h3><?= __('Servicedocuments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('servicesentry_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicedocuments as $servicedocument): ?>
            <tr>
                <td><?= $this->Number->format($servicedocument->id) ?></td>
                <td><?= $servicedocument->has('servicesentry') ? $this->Html->link($servicedocument->servicesentry->id, ['controller' => 'Servicesentries', 'action' => 'view', $servicedocument->servicesentry->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servicedocument->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servicedocument->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servicedocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicedocument->id)]) ?>
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
