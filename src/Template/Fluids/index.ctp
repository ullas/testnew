<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fluid'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fluids index large-9 medium-8 columns content">
    <h3><?= __('Fluids') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('fueltype') ?></th>
                <th><?= $this->Paginator->sort('fuelquality') ?></th>
                <th><?= $this->Paginator->sort('fueltank1_capacity') ?></th>
                <th><?= $this->Paginator->sort('fueltank2_capacity') ?></th>
                <th><?= $this->Paginator->sort('oil_capacity') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fluids as $fluid): ?>
            <tr>
                <td><?= $this->Number->format($fluid->id) ?></td>
                <td><?= $fluid->has('vehicle') ? $this->Html->link($fluid->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fluid->vehicle->id]) : '' ?></td>
                <td><?= $this->Number->format($fluid->fueltype) ?></td>
                <td><?= h($fluid->fuelquality) ?></td>
                <td><?= $this->Number->format($fluid->fueltank1_capacity) ?></td>
                <td><?= $this->Number->format($fluid->fueltank2_capacity) ?></td>
                <td><?= $this->Number->format($fluid->oil_capacity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fluid->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fluid->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fluid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fluid->id)]) ?>
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
