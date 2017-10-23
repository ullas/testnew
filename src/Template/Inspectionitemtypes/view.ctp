<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inspectionitemtype'), ['action' => 'edit', $inspectionitemtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inspectionitemtype'), ['action' => 'delete', $inspectionitemtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitemtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionitemtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionitemtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionitems'), ['controller' => 'Inspectionitems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionitem'), ['controller' => 'Inspectionitems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inspectionitemtypes view large-9 medium-8 columns content">
    <h3><?= h($inspectionitemtype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($inspectionitemtype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($inspectionitemtype->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspectionitemtype->has('customer') ? $this->Html->link($inspectionitemtype->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspectionitemtype->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspectionitemtype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Inspectionitems') ?></h4>
        <?php if (!empty($inspectionitemtype->inspectionitems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Inspectionitemtype Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($inspectionitemtype->inspectionitems as $inspectionitems): ?>
            <tr>
                <td><?= h($inspectionitems->id) ?></td>
                <td><?= h($inspectionitems->inspectionitemtype_id) ?></td>
                <td><?= h($inspectionitems->name) ?></td>
                <td><?= h($inspectionitems->description) ?></td>
                <td><?= h($inspectionitems->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Inspectionitems', 'action' => 'view', $inspectionitems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Inspectionitems', 'action' => 'edit', $inspectionitems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Inspectionitems', 'action' => 'delete', $inspectionitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
