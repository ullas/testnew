<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclegroup'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Defaultvehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defaultvehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclegroups index large-9 medium-8 columns content">
    <h3><?= __('Vehiclegroups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('defaultvehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclegroups as $vehiclegroup): ?>
            <tr>
                <td><?= $this->Number->format($vehiclegroup->id) ?></td>
                <td><?= h($vehiclegroup->name) ?></td>
                <td><?= h($vehiclegroup->description) ?></td>
                <td><?= $vehiclegroup->has('defaultvehicle') ? $this->Html->link($vehiclegroup->defaultvehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $vehiclegroup->defaultvehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclegroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclegroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclegroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclegroup->id)]) ?>
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
