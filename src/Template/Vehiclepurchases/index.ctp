<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclepurchase'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclepurchases index large-9 medium-8 columns content">
    <h3><?= __('Vehiclepurchases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('vendor_id') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('currency_id') ?></th>
                <th><?= $this->Paginator->sort('purchasedate') ?></th>
                <th><?= $this->Paginator->sort('purchasepodometer') ?></th>
                <th><?= $this->Paginator->sort('warrantyexpdate') ?></th>
                <th><?= $this->Paginator->sort('warrentyexpmeter') ?></th>
                <th><?= $this->Paginator->sort('comments') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclepurchases as $vehiclepurchase): ?>
            <tr>
                <td><?= $this->Number->format($vehiclepurchase->id) ?></td>
                <td><?= $vehiclepurchase->has('vendor') ? $this->Html->link($vehiclepurchase->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vehiclepurchase->vendor->id]) : '' ?></td>
                <td><?= $this->Number->format($vehiclepurchase->price) ?></td>
                <td><?= $this->Number->format($vehiclepurchase->currency_id) ?></td>
                <td><?= h($vehiclepurchase->purchasedate) ?></td>
                <td><?= $this->Number->format($vehiclepurchase->purchasepodometer) ?></td>
                <td><?= h($vehiclepurchase->warrantyexpdate) ?></td>
                <td><?= $this->Number->format($vehiclepurchase->warrentyexpmeter) ?></td>
                <td><?= h($vehiclepurchase->comments) ?></td>
                <td><?= $vehiclepurchase->has('vehicle') ? $this->Html->link($vehiclepurchase->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $vehiclepurchase->vehicle->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclepurchase->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclepurchase->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclepurchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclepurchase->id)]) ?>
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
