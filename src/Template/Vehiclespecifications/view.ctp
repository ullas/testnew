<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclespecification'), ['action' => 'edit', $vehiclespecification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclespecification'), ['action' => 'delete', $vehiclespecification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclespecification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclespecifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclespecification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclespecifications view large-9 medium-8 columns content">
    <h3><?= h($vehiclespecification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehiclespecification->has('vehicle') ? $this->Html->link($vehiclespecification->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclespecification->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclespecification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Width') ?></th>
            <td><?= $this->Number->format($vehiclespecification->width) ?></td>
        </tr>
        <tr>
            <th><?= __('Height') ?></th>
            <td><?= $this->Number->format($vehiclespecification->height) ?></td>
        </tr>
        <tr>
            <th><?= __('Length') ?></th>
            <td><?= $this->Number->format($vehiclespecification->length) ?></td>
        </tr>
        <tr>
            <th><?= __('Interiorvolume') ?></th>
            <td><?= $this->Number->format($vehiclespecification->interiorvolume) ?></td>
        </tr>
        <tr>
            <th><?= __('Passengervolume') ?></th>
            <td><?= $this->Number->format($vehiclespecification->passengervolume) ?></td>
        </tr>
        <tr>
            <th><?= __('Cargovolume') ?></th>
            <td><?= $this->Number->format($vehiclespecification->cargovolume) ?></td>
        </tr>
        <tr>
            <th><?= __('Groudclearance') ?></th>
            <td><?= $this->Number->format($vehiclespecification->groudclearance) ?></td>
        </tr>
        <tr>
            <th><?= __('Bedlength') ?></th>
            <td><?= $this->Number->format($vehiclespecification->bedlength) ?></td>
        </tr>
        <tr>
            <th><?= __('Curbweight') ?></th>
            <td><?= $this->Number->format($vehiclespecification->curbweight) ?></td>
        </tr>
        <tr>
            <th><?= __('Grossweight') ?></th>
            <td><?= $this->Number->format($vehiclespecification->grossweight) ?></td>
        </tr>
        <tr>
            <th><?= __('Towingcapacity') ?></th>
            <td><?= $this->Number->format($vehiclespecification->towingcapacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Epacity') ?></th>
            <td><?= $this->Number->format($vehiclespecification->epacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Epahighway') ?></th>
            <td><?= $this->Number->format($vehiclespecification->epahighway) ?></td>
        </tr>
        <tr>
            <th><?= __('Epacombined') ?></th>
            <td><?= $this->Number->format($vehiclespecification->epacombined) ?></td>
        </tr>
        <tr>
            <th><?= __('Maxpayload') ?></th>
            <td><?= $this->Number->format($vehiclespecification->maxpayload) ?></td>
        </tr>
    </table>
</div>
