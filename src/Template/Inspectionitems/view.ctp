<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inspectionitem'), ['action' => 'edit', $inspectionitem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inspectionitem'), ['action' => 'delete', $inspectionitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionitems'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionitem'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionitemtypes'), ['controller' => 'Inspectionitemtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionitemtype'), ['controller' => 'Inspectionitemtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionforms'), ['controller' => 'Inspectionforms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionform'), ['controller' => 'Inspectionforms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inspectionitems view large-9 medium-8 columns content">
    <h3><?= h($inspectionitem->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Inspectionitemtype') ?></th>
            <td><?= $inspectionitem->has('inspectionitemtype') ? $this->Html->link($inspectionitem->inspectionitemtype->name, ['controller' => 'Inspectionitemtypes', 'action' => 'view', $inspectionitem->inspectionitemtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($inspectionitem->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($inspectionitem->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspectionitem->has('customer') ? $this->Html->link($inspectionitem->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionitem->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspectionitem->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Inspectionforms') ?></h4>
        <?php if (!empty($inspectionitem->inspectionforms)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inspectionitem->inspectionforms as $inspectionforms): ?>
            <tr>
                <td><?= h($inspectionforms->id) ?></td>
                <td><?= h($inspectionforms->name) ?></td>
                <td><?= h($inspectionforms->data) ?></td>
                <td><?= h($inspectionforms->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inspectionforms', 'action' => 'view', $inspectionforms->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inspectionforms', 'action' => 'edit', $inspectionforms->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inspectionforms', 'action' => 'delete', $inspectionforms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionforms->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
