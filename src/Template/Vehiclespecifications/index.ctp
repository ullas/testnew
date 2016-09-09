<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclespecification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclespecifications index large-9 medium-8 columns content">
    <h3><?= __('Vehiclespecifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('width') ?></th>
                <th><?= $this->Paginator->sort('height') ?></th>
                <th><?= $this->Paginator->sort('length') ?></th>
                <th><?= $this->Paginator->sort('interiorvolume') ?></th>
                <th><?= $this->Paginator->sort('passengervolume') ?></th>
                <th><?= $this->Paginator->sort('cargovolume') ?></th>
                <th><?= $this->Paginator->sort('groudclearance') ?></th>
                <th><?= $this->Paginator->sort('bedlength') ?></th>
                <th><?= $this->Paginator->sort('curbweight') ?></th>
                <th><?= $this->Paginator->sort('grossweight') ?></th>
                <th><?= $this->Paginator->sort('towingcapacity') ?></th>
                <th><?= $this->Paginator->sort('epacity') ?></th>
                <th><?= $this->Paginator->sort('epahighway') ?></th>
                <th><?= $this->Paginator->sort('epacombined') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('maxpayload') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclespecifications as $vehiclespecification): ?>
            <tr>
                <td><?= $this->Number->format($vehiclespecification->id) ?></td>
                <td><?= $this->Number->format($vehiclespecification->width) ?></td>
                <td><?= $this->Number->format($vehiclespecification->height) ?></td>
                <td><?= $this->Number->format($vehiclespecification->length) ?></td>
                <td><?= $this->Number->format($vehiclespecification->interiorvolume) ?></td>
                <td><?= $this->Number->format($vehiclespecification->passengervolume) ?></td>
                <td><?= $this->Number->format($vehiclespecification->cargovolume) ?></td>
                <td><?= $this->Number->format($vehiclespecification->groudclearance) ?></td>
                <td><?= $this->Number->format($vehiclespecification->bedlength) ?></td>
                <td><?= $this->Number->format($vehiclespecification->curbweight) ?></td>
                <td><?= $this->Number->format($vehiclespecification->grossweight) ?></td>
                <td><?= $this->Number->format($vehiclespecification->towingcapacity) ?></td>
                <td><?= $this->Number->format($vehiclespecification->epacity) ?></td>
                <td><?= $this->Number->format($vehiclespecification->epahighway) ?></td>
                <td><?= $this->Number->format($vehiclespecification->epacombined) ?></td>
                <td><?= $vehiclespecification->has('vehicle') ? $this->Html->link($vehiclespecification->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclespecification->vehicle->id]) : '' ?></td>
                <td><?= $this->Number->format($vehiclespecification->maxpayload) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclespecification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclespecification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclespecification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclespecification->id)]) ?>
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
