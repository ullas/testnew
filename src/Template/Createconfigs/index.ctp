<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Createconfig'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="createconfigs index large-9 medium-8 columns content">
    <h3><?= __('Createconfigs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('table_name') ?></th>
                <th><?= $this->Paginator->sort('field_name') ?></th>
                <th><?= $this->Paginator->sort('datatype') ?></th>
                <th><?= $this->Paginator->sort('has_datefield') ?></th>
                <th><?= $this->Paginator->sort('has_select') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($createconfigs as $createconfig): ?>
            <tr>
                <td><?= $this->Number->format($createconfig->id) ?></td>
                <td><?= h($createconfig->table_name) ?></td>
                <td><?= h($createconfig->field_name) ?></td>
                <td><?= h($createconfig->datatype) ?></td>
                <td><?= h($createconfig->has_datefield) ?></td>
                <td><?= h($createconfig->has_select) ?></td>
                <td><?= $this->Number->format($createconfig->customer_id) ?></td>
                <td><?= h($createconfig->title) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $createconfig->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $createconfig->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $createconfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $createconfig->id)]) ?>
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
