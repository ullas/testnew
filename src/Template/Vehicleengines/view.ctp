<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicleengine'), ['action' => 'edit', $vehicleengine->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicleengine'), ['action' => 'delete', $vehicleengine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleengine->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicleengines'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicleengine'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicleengines view large-9 medium-8 columns content">
    <h3><?= h($vehicleengine->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Enginesummary') ?></th>
            <td><?= h($vehicleengine->enginesummary) ?></td>
        </tr>
        <tr>
            <th><?= __('Brand') ?></th>
            <td><?= h($vehicleengine->brand) ?></td>
        </tr>
        <tr>
            <th><?= __('Aspiration') ?></th>
            <td><?= h($vehicleengine->aspiration) ?></td>
        </tr>
        <tr>
            <th><?= __('Blocktype') ?></th>
            <td><?= h($vehicleengine->blocktype) ?></td>
        </tr>
        <tr>
            <th><?= __('Bore') ?></th>
            <td><?= h($vehicleengine->bore) ?></td>
        </tr>
        <tr>
            <th><?= __('Camtype') ?></th>
            <td><?= h($vehicleengine->camtype) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehicleengine->has('vehicle') ? $this->Html->link($vehicleengine->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehicleengine->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fuel Induction') ?></th>
            <td><?= h($vehicleengine->fuel_induction) ?></td>
        </tr>
        <tr>
            <th><?= __('Fuel Quality') ?></th>
            <td><?= h($vehicleengine->fuel_quality) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Hp') ?></th>
            <td><?= h($vehicleengine->max_hp) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Torque') ?></th>
            <td><?= h($vehicleengine->max_torque) ?></td>
        </tr>
        <tr>
            <th><?= __('Redline Rpm') ?></th>
            <td><?= h($vehicleengine->redline_rpm) ?></td>
        </tr>
        <tr>
            <th><?= __('Stroke') ?></th>
            <td><?= h($vehicleengine->stroke) ?></td>
        </tr>
        <tr>
            <th><?= __('Transmission Summary') ?></th>
            <td><?= h($vehicleengine->transmission_summary) ?></td>
        </tr>
        <tr>
            <th><?= __('Trasmission Brand') ?></th>
            <td><?= h($vehicleengine->trasmission_brand) ?></td>
        </tr>
        <tr>
            <th><?= __('Transmission Type') ?></th>
            <td><?= h($vehicleengine->transmission_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Traasmission Gears') ?></th>
            <td><?= h($vehicleengine->traasmission_gears) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicleengine->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Compression') ?></th>
            <td><?= $this->Number->format($vehicleengine->compression) ?></td>
        </tr>
        <tr>
            <th><?= __('Cylinders') ?></th>
            <td><?= $this->Number->format($vehicleengine->cylinders) ?></td>
        </tr>
        <tr>
            <th><?= __('Displacement') ?></th>
            <td><?= $this->Number->format($vehicleengine->displacement) ?></td>
        </tr>
        <tr>
            <th><?= __('Valves') ?></th>
            <td><?= $this->Number->format($vehicleengine->valves) ?></td>
        </tr>
    </table>
</div>
