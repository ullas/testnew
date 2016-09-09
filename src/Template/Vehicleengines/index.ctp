<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicleengine'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleengines index large-9 medium-8 columns content">
    <h3><?= __('Vehicleengines') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('enginesummary') ?></th>
                <th><?= $this->Paginator->sort('brand') ?></th>
                <th><?= $this->Paginator->sort('aspiration') ?></th>
                <th><?= $this->Paginator->sort('blocktype') ?></th>
                <th><?= $this->Paginator->sort('bore') ?></th>
                <th><?= $this->Paginator->sort('camtype') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('compression') ?></th>
                <th><?= $this->Paginator->sort('cylinders') ?></th>
                <th><?= $this->Paginator->sort('displacement') ?></th>
                <th><?= $this->Paginator->sort('fuel_induction') ?></th>
                <th><?= $this->Paginator->sort('fuel_quality') ?></th>
                <th><?= $this->Paginator->sort('max_hp') ?></th>
                <th><?= $this->Paginator->sort('max_torque') ?></th>
                <th><?= $this->Paginator->sort('redline_rpm') ?></th>
                <th><?= $this->Paginator->sort('stroke') ?></th>
                <th><?= $this->Paginator->sort('valves') ?></th>
                <th><?= $this->Paginator->sort('transmission_summary') ?></th>
                <th><?= $this->Paginator->sort('trasmission_brand') ?></th>
                <th><?= $this->Paginator->sort('transmission_type') ?></th>
                <th><?= $this->Paginator->sort('traasmission_gears') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicleengines as $vehicleengine): ?>
            <tr>
                <td><?= $this->Number->format($vehicleengine->id) ?></td>
                <td><?= h($vehicleengine->enginesummary) ?></td>
                <td><?= h($vehicleengine->brand) ?></td>
                <td><?= h($vehicleengine->aspiration) ?></td>
                <td><?= h($vehicleengine->blocktype) ?></td>
                <td><?= h($vehicleengine->bore) ?></td>
                <td><?= h($vehicleengine->camtype) ?></td>
                <td><?= $vehicleengine->has('vehicle') ? $this->Html->link($vehicleengine->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehicleengine->vehicle->id]) : '' ?></td>
                <td><?= $this->Number->format($vehicleengine->compression) ?></td>
                <td><?= $this->Number->format($vehicleengine->cylinders) ?></td>
                <td><?= $this->Number->format($vehicleengine->displacement) ?></td>
                <td><?= h($vehicleengine->fuel_induction) ?></td>
                <td><?= h($vehicleengine->fuel_quality) ?></td>
                <td><?= h($vehicleengine->max_hp) ?></td>
                <td><?= h($vehicleengine->max_torque) ?></td>
                <td><?= h($vehicleengine->redline_rpm) ?></td>
                <td><?= h($vehicleengine->stroke) ?></td>
                <td><?= $this->Number->format($vehicleengine->valves) ?></td>
                <td><?= h($vehicleengine->transmission_summary) ?></td>
                <td><?= h($vehicleengine->trasmission_brand) ?></td>
                <td><?= h($vehicleengine->transmission_type) ?></td>
                <td><?= h($vehicleengine->traasmission_gears) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicleengine->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicleengine->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicleengine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleengine->id)]) ?>
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
