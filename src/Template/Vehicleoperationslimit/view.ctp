<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicleoperationslimit'), ['action' => 'edit', $vehicleoperationslimit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicleoperationslimit'), ['action' => 'delete', $vehicleoperationslimit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleoperationslimit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicleoperationslimit'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicleoperationslimit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List I Buttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New I Button'), ['controller' => 'Ibuttons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicleoperationslimit view large-9 medium-8 columns content">
    <h3><?= h($vehicleoperationslimit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Odometer Offset') ?></th>
            <td><?= h($vehicleoperationslimit->odometer_offset) ?></td>
        </tr>
        <tr>
            <th><?= __('I Button') ?></th>
            <td><?= $vehicleoperationslimit->has('i_button') ? $this->Html->link($vehicleoperationslimit->i_button->id, ['controller' => 'Ibuttons', 'action' => 'view', $vehicleoperationslimit->i_button->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vehice Id') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->vehice_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Speed Limit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->speed_limit) ?></td>
        </tr>
        <tr>
            <th><?= __('Battery Voltage') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->battery_voltage) ?></td>
        </tr>
        <tr>
            <th><?= __('Accelarationlimit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->accelarationlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Breakinglimit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->breakinglimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Crashlimit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->crashlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Shutlimit') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->shutlimit) ?></td>
        </tr>
        <tr>
            <th><?= __('Continiousruntime') ?></th>
            <td><?= $this->Number->format($vehicleoperationslimit->continiousruntime) ?></td>
        </tr>
    </table>
</div>
