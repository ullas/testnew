<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workorder'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Issues'), ['controller' => 'Issues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issue'), ['controller' => 'Issues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Worklorderlineitems'), ['controller' => 'Worklorderlineitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Worklorderlineitem'), ['controller' => 'Worklorderlineitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorderdocuments'), ['controller' => 'Workorderdocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorderdocument'), ['controller' => 'Workorderdocuments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workorders index large-9 medium-8 columns content">
    <h3><?= __('Workorders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('issuedate') ?></th>
                <th><?= $this->Paginator->sort('workorderstatus_id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('startdate') ?></th>
                <th><?= $this->Paginator->sort('lables') ?></th>
                <th><?= $this->Paginator->sort('odometer') ?></th>
                <th><?= $this->Paginator->sort('void') ?></th>
                <th><?= $this->Paginator->sort('vendor_id') ?></th>
                <th><?= $this->Paginator->sort('completiondate') ?></th>
                <th><?= $this->Paginator->sort('labour') ?></th>
                <th><?= $this->Paginator->sort('parts') ?></th>
                <th><?= $this->Paginator->sort('dicount') ?></th>
                <th><?= $this->Paginator->sort('tax') ?></th>
                <th><?= $this->Paginator->sort('issuedby_id') ?></th>
                <th><?= $this->Paginator->sort('assignedby_id') ?></th>
                <th><?= $this->Paginator->sort('assignto_id') ?></th>
                <th><?= $this->Paginator->sort('invoicenumber') ?></th>
                <th><?= $this->Paginator->sort('POnumber') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workorders as $workorder): ?>
            <tr>
                <td><?= $this->Number->format($workorder->id) ?></td>
                <td><?= h($workorder->issuedate) ?></td>
                <td><?= $this->Number->format($workorder->workorderstatus_id) ?></td>
                <td><?= $workorder->has('vehicle') ? $this->Html->link($workorder->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $workorder->vehicle->id]) : '' ?></td>
                <td><?= h($workorder->startdate) ?></td>
                <td><?= h($workorder->lables) ?></td>
                <td><?= $this->Number->format($workorder->odometer) ?></td>
                <td><?= h($workorder->void) ?></td>
                <td><?= $workorder->has('vendor') ? $this->Html->link($workorder->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $workorder->vendor->id]) : '' ?></td>
                <td><?= h($workorder->completiondate) ?></td>
                <td><?= $this->Number->format($workorder->labour) ?></td>
                <td><?= $this->Number->format($workorder->parts) ?></td>
                <td><?= $this->Number->format($workorder->dicount) ?></td>
                <td><?= $this->Number->format($workorder->tax) ?></td>
                <td><?= $this->Number->format($workorder->issuedby_id) ?></td>
                <td><?= $this->Number->format($workorder->assignedby_id) ?></td>
                <td><?= $this->Number->format($workorder->assignto_id) ?></td>
                <td><?= h($workorder->invoicenumber) ?></td>
                <td><?= h($workorder->POnumber) ?></td>
                <td><?= h($workorder->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workorder->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workorder->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorder->id)]) ?>
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
