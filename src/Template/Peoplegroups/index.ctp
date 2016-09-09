<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Peoplegroup'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="peoplegroups index large-9 medium-8 columns content">
    <h3><?= __('Peoplegroups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('defaultperson_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peoplegroups as $peoplegroup): ?>
            <tr>
                <td><?= $this->Number->format($peoplegroup->id) ?></td>
                <td><?= h($peoplegroup->name) ?></td>
                <td><?= h($peoplegroup->description) ?></td>
                <td><?= $this->Number->format($peoplegroup->defaultperson_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peoplegroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peoplegroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peoplegroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peoplegroup->id)]) ?>
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
