<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclewheelstyre'), ['action' => 'edit', $vehiclewheelstyre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclewheelstyre'), ['action' => 'delete', $vehiclewheelstyre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclewheelstyre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclewheelstyres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclewheelstyre'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclewheelstyres view large-9 medium-8 columns content">
    <h3><?= h($vehiclewheelstyre->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehiclewheelstyre->has('vehicle') ? $this->Html->link($vehiclewheelstyre->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclewheelstyre->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Drivetype') ?></th>
            <td><?= h($vehiclewheelstyre->drivetype) ?></td>
        </tr>
        <tr>
            <th><?= __('Breaksystem') ?></th>
            <td><?= h($vehiclewheelstyre->breaksystem) ?></td>
        </tr>
        <tr>
            <th><?= __('Fronttyretype') ?></th>
            <td><?= h($vehiclewheelstyre->fronttyretype) ?></td>
        </tr>
        <tr>
            <th><?= __('Reartyretype') ?></th>
            <td><?= h($vehiclewheelstyre->reartyretype) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fronttrackwidth') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->fronttrackwidth) ?></td>
        </tr>
        <tr>
            <th><?= __('Reartrackwidth') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->reartrackwidth) ?></td>
        </tr>
        <tr>
            <th><?= __('Wheelbase') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->wheelbase) ?></td>
        </tr>
        <tr>
            <th><?= __('Frontwheeldia') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->frontwheeldia) ?></td>
        </tr>
        <tr>
            <th><?= __('Rearwheeldia') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->rearwheeldia) ?></td>
        </tr>
        <tr>
            <th><?= __('Rearaxil') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->rearaxil) ?></td>
        </tr>
        <tr>
            <th><?= __('Fronttyrepsi') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->fronttyrepsi) ?></td>
        </tr>
        <tr>
            <th><?= __('Reartyrepsi') ?></th>
            <td><?= $this->Number->format($vehiclewheelstyre->reartyrepsi) ?></td>
        </tr>
    </table>
</div>
