<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclepurchase'), ['action' => 'edit', $vehiclepurchase->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclepurchase'), ['action' => 'delete', $vehiclepurchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclepurchase->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclepurchases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclepurchase'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehiclepurchases view large-9 medium-8 columns content">
    <h3><?= h($vehiclepurchase->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $vehiclepurchase->has('vendor') ? $this->Html->link($vehiclepurchase->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vehiclepurchase->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($vehiclepurchase->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $vehiclepurchase->has('vehicle') ? $this->Html->link($vehiclepurchase->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $vehiclepurchase->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclepurchase->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($vehiclepurchase->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency Id') ?></th>
            <td><?= $this->Number->format($vehiclepurchase->currency_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Purchasepodometer') ?></th>
            <td><?= $this->Number->format($vehiclepurchase->purchasepodometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Warrentyexpmeter') ?></th>
            <td><?= $this->Number->format($vehiclepurchase->warrentyexpmeter) ?></td>
        </tr>
        <tr>
            <th><?= __('Purchasedate') ?></th>
            <td><?= h($vehiclepurchase->purchasedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Warrantyexpdate') ?></th>
            <td><?= h($vehiclepurchase->warrantyexpdate) ?></td>
        </tr>
    </table>
</div>
