<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partcategory'), ['action' => 'edit', $partcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partcategory'), ['action' => 'delete', $partcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partcategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parts'), ['controller' => 'Parts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Part'), ['controller' => 'Parts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partcategories view large-9 medium-8 columns content">
    <h3><?= h($partcategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($partcategory->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $partcategory->has('customer') ? $this->Html->link($partcategory->customer->name, ['controller' => 'Customers', 'action' => 'view', $partcategory->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($partcategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Parts') ?></h4>
        <?php if (!empty($partcategory->parts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Partno') ?></th>
                <th><?= __('Partcategory Id') ?></th>
                <th><?= __('Manufacturer Id') ?></th>
                <th><?= __('Manufacturerpartno') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Measurementunit Id') ?></th>
                <th><?= __('Upc') ?></th>
                <th><?= __('Cost') ?></th>
                <th><?= __('Station Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($partcategory->parts as $parts): ?>
            <tr>
                <td><?= h($parts->id) ?></td>
                <td><?= h($parts->partno) ?></td>
                <td><?= h($parts->partcategory_id) ?></td>
                <td><?= h($parts->manufacturer_id) ?></td>
                <td><?= h($parts->manufacturerpartno) ?></td>
                <td><?= h($parts->description) ?></td>
                <td><?= h($parts->measurementunit_id) ?></td>
                <td><?= h($parts->upc) ?></td>
                <td><?= h($parts->cost) ?></td>
                <td><?= h($parts->station_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Parts', 'action' => 'view', $parts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Parts', 'action' => 'edit', $parts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Parts', 'action' => 'delete', $parts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $parts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
