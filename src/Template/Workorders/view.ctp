<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workorder'), ['action' => 'edit', $workorder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workorder'), ['action' => 'delete', $workorder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workorders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issues'), ['controller' => 'Issues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issue'), ['controller' => 'Issues', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Worklorderlineitems'), ['controller' => 'Worklorderlineitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Worklorderlineitem'), ['controller' => 'Worklorderlineitems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workorderdocuments'), ['controller' => 'Workorderdocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorderdocument'), ['controller' => 'Workorderdocuments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workorders view large-9 medium-8 columns content">
    <h3><?= h($workorder->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $workorder->has('vehicle') ? $this->Html->link($workorder->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $workorder->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lables') ?></th>
            <td><?= h($workorder->lables) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $workorder->has('vendor') ? $this->Html->link($workorder->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $workorder->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Invoicenumber') ?></th>
            <td><?= h($workorder->invoicenumber) ?></td>
        </tr>
        <tr>
            <th><?= __('POnumber') ?></th>
            <td><?= h($workorder->POnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($workorder->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workorder->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Workorderstatus Id') ?></th>
            <td><?= $this->Number->format($workorder->workorderstatus_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($workorder->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $this->Number->format($workorder->labour) ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= $this->Number->format($workorder->parts) ?></td>
        </tr>
        <tr>
            <th><?= __('Dicount') ?></th>
            <td><?= $this->Number->format($workorder->dicount) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $this->Number->format($workorder->tax) ?></td>
        </tr>
        <tr>
            <th><?= __('Issuedby Id') ?></th>
            <td><?= $this->Number->format($workorder->issuedby_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignedby Id') ?></th>
            <td><?= $this->Number->format($workorder->assignedby_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignto Id') ?></th>
            <td><?= $this->Number->format($workorder->assignto_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Issuedate') ?></th>
            <td><?= h($workorder->issuedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Startdate') ?></th>
            <td><?= h($workorder->startdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Completiondate') ?></th>
            <td><?= h($workorder->completiondate) ?></td>
        </tr>
        <tr>
            <th><?= __('Void') ?></th>
            <td><?= $workorder->void ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Issues') ?></h4>
        <?php if (!empty($workorder->issues)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Reportedon') ?></th>
                <th><?= __('Summary') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Odometer') ?></th>
                <th><?= __('Reportedby Id') ?></th>
                <th><?= __('Assignedto Id') ?></th>
                <th><?= __('Tags') ?></th>
                <th><?= __('Duedate') ?></th>
                <th><?= __('Overdueodometer') ?></th>
                <th><?= __('Markasvoid') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Serviceentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workorder->issues as $issues): ?>
            <tr>
                <td><?= h($issues->id) ?></td>
                <td><?= h($issues->vehicle_id) ?></td>
                <td><?= h($issues->reportedon) ?></td>
                <td><?= h($issues->summary) ?></td>
                <td><?= h($issues->description) ?></td>
                <td><?= h($issues->odometer) ?></td>
                <td><?= h($issues->reportedby_id) ?></td>
                <td><?= h($issues->assignedto_id) ?></td>
                <td><?= h($issues->tags) ?></td>
                <td><?= h($issues->duedate) ?></td>
                <td><?= h($issues->overdueodometer) ?></td>
                <td><?= h($issues->markasvoid) ?></td>
                <td><?= h($issues->customer_id) ?></td>
                <td><?= h($issues->workorder_id) ?></td>
                <td><?= h($issues->serviceentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Issues', 'action' => 'view', $issues->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Issues', 'action' => 'edit', $issues->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issues', 'action' => 'delete', $issues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issues->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Worklorderlineitems') ?></h4>
        <?php if (!empty($workorder->worklorderlineitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Workordertype Id') ?></th>
                <th><?= __('Labour') ?></th>
                <th><?= __('Parts') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workorder->worklorderlineitems as $worklorderlineitems): ?>
            <tr>
                <td><?= h($worklorderlineitems->id) ?></td>
                <td><?= h($worklorderlineitems->name) ?></td>
                <td><?= h($worklorderlineitems->workorder_id) ?></td>
                <td><?= h($worklorderlineitems->workordertype_id) ?></td>
                <td><?= h($worklorderlineitems->labour) ?></td>
                <td><?= h($worklorderlineitems->parts) ?></td>
                <td><?= h($worklorderlineitems->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Worklorderlineitems', 'action' => 'view', $worklorderlineitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Worklorderlineitems', 'action' => 'edit', $worklorderlineitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Worklorderlineitems', 'action' => 'delete', $worklorderlineitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $worklorderlineitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Workorderdocuments') ?></h4>
        <?php if (!empty($workorder->workorderdocuments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Workorder Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workorder->workorderdocuments as $workorderdocuments): ?>
            <tr>
                <td><?= h($workorderdocuments->id) ?></td>
                <td><?= h($workorderdocuments->workorder_id) ?></td>
                <td><?= h($workorderdocuments->name) ?></td>
                <td><?= h($workorderdocuments->data) ?></td>
                <td><?= h($workorderdocuments->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Workorderdocuments', 'action' => 'view', $workorderdocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Workorderdocuments', 'action' => 'edit', $workorderdocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workorderdocuments', 'action' => 'delete', $workorderdocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorderdocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
