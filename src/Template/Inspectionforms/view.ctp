<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inspectionform'), ['action' => 'edit', $inspectionform->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inspectionform'), ['action' => 'delete', $inspectionform->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionform->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionforms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionform'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspections'), ['controller' => 'Inspections', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspection'), ['controller' => 'Inspections', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inspectionforms view large-9 medium-8 columns content">
    <h3><?= h($inspectionform->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($inspectionform->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspectionform->has('customer') ? $this->Html->link($inspectionform->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionform->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspectionform->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($inspectionform->data)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Inspections') ?></h4>
        <?php if (!empty($inspectionform->inspections)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Descriptions') ?></th>
                <th><?= __('Inspectionform Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Inspectionstatus Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inspectionform->inspections as $inspections): ?>
            <tr>
                <td><?= h($inspections->id) ?></td>
                <td><?= h($inspections->name) ?></td>
                <td><?= h($inspections->descriptions) ?></td>
                <td><?= h($inspections->inspectionform_id) ?></td>
                <td><?= h($inspections->customer_id) ?></td>
                <td><?= h($inspections->date) ?></td>
                <td><?= h($inspections->inspectionstatus_id) ?></td>
                <td><?= h($inspections->vehicle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inspections', 'action' => 'view', $inspections->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inspections', 'action' => 'edit', $inspections->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inspections', 'action' => 'delete', $inspections->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspections->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
