<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workorderstatus'), ['action' => 'edit', $workorderstatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workorderstatus'), ['action' => 'delete', $workorderstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorderstatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workorderstatuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorderstatus'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workorders'), ['controller' => 'Workorders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workorder'), ['controller' => 'Workorders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workorderstatuses view large-9 medium-8 columns content">
    <h3><?= h($workorderstatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($workorderstatus->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $workorderstatus->has('customer') ? $this->Html->link($workorderstatus->customer->name, ['controller' => 'Customers', 'action' => 'view', $workorderstatus->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workorderstatus->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Workorders') ?></h4>
        <?php if (!empty($workorderstatus->workorders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Issuedate') ?></th>
                <th><?= __('Workorderstatus Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Startdate') ?></th>
                <th><?= __('Lables') ?></th>
                <th><?= __('Odometer') ?></th>
                <th><?= __('Void') ?></th>
                <th><?= __('Vendor Id') ?></th>
                <th><?= __('Completiondate') ?></th>
                <th><?= __('Labour') ?></th>
                <th><?= __('Parts') ?></th>
                <th><?= __('Dicount') ?></th>
                <th><?= __('Tax') ?></th>
                <th><?= __('Issuedby Id') ?></th>
                <th><?= __('Assignedby Id') ?></th>
                <th><?= __('Assignto Id') ?></th>
                <th><?= __('Invoicenumber') ?></th>
                <th><?= __('POnumber') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Ponumber') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workorderstatus->workorders as $workorders): ?>
            <tr>
                <td><?= h($workorders->id) ?></td>
                <td><?= h($workorders->issuedate) ?></td>
                <td><?= h($workorders->workorderstatus_id) ?></td>
                <td><?= h($workorders->vehicle_id) ?></td>
                <td><?= h($workorders->startdate) ?></td>
                <td><?= h($workorders->lables) ?></td>
                <td><?= h($workorders->odometer) ?></td>
                <td><?= h($workorders->void) ?></td>
                <td><?= h($workorders->vendor_id) ?></td>
                <td><?= h($workorders->completiondate) ?></td>
                <td><?= h($workorders->labour) ?></td>
                <td><?= h($workorders->parts) ?></td>
                <td><?= h($workorders->dicount) ?></td>
                <td><?= h($workorders->tax) ?></td>
                <td><?= h($workorders->issuedby_id) ?></td>
                <td><?= h($workorders->assignedby_id) ?></td>
                <td><?= h($workorders->assignto_id) ?></td>
                <td><?= h($workorders->invoicenumber) ?></td>
                <td><?= h($workorders->POnumber) ?></td>
                <td><?= h($workorders->description) ?></td>
                <td><?= h($workorders->ponumber) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Workorders', 'action' => 'view', $workorders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Workorders', 'action' => 'edit', $workorders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workorders', 'action' => 'delete', $workorders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workorders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
