<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclefluid'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclefluids index large-9 medium-8 columns content">
    <h3><?= __('Vehiclefluids') ?></h3>
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
            <?php foreach ($vehiclefluids as $vehiclefluid): ?>
            <tr>
                <td><?= $this->Number->format($vehiclefluid->id) ?></td>
                <td><?= $vehiclefluid->has('vehicle') ? $this->Html->link($vehiclefluid->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclefluid->vehicle->id]) : '' ?></td>
                <td><?= $this->Number->format($vehiclefluid->fueltype) ?></td>
                <td><?= h($vehiclefluid->fuelquality) ?></td>
                <td><?= $this->Number->format($vehiclefluid->fueltank1_capacity) ?></td>
                <td><?= $this->Number->format($vehiclefluid->fueltank2_capacity) ?></td>
                <td><?= $this->Number->format($vehiclefluid->oil_capacity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclefluid->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclefluid->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclefluid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclefluid->id)]) ?>
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
