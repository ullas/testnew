<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Part'), ['action' => 'edit', $part->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Part'), ['action' => 'delete', $part->id], ['confirm' => __('Are you sure you want to delete # {0}?', $part->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Parts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Part'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partcategories'), ['controller' => 'Partcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partcategory'), ['controller' => 'Partcategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Measurementunits'), ['controller' => 'Measurementunits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Measurementunit'), ['controller' => 'Measurementunits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="parts view large-9 medium-8 columns content">
    <h3><?= h($part->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Partno') ?></th>
            <td><?= h($part->partno) ?></td>
        </tr>
        <tr>
            <th><?= __('Partcategory') ?></th>
            <td><?= $part->has('partcategory') ? $this->Html->link($part->partcategory->name, ['controller' => 'Partcategories', 'action' => 'view', $part->partcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Manufacturer') ?></th>
            <td><?= $part->has('manufacturer') ? $this->Html->link($part->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $part->manufacturer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Manufacturerpartno') ?></th>
            <td><?= h($part->manufacturerpartno) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($part->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Measurementunit') ?></th>
            <td><?= $part->has('measurementunit') ? $this->Html->link($part->measurementunit->name, ['controller' => 'Measurementunits', 'action' => 'view', $part->measurementunit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $part->has('station') ? $this->Html->link($part->station->name, ['controller' => 'Stations', 'action' => 'view', $part->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($part->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Upc') ?></th>
            <td><?= $this->Number->format($part->upc) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost') ?></th>
            <td><?= $this->Number->format($part->cost) ?></td>
        </tr>
    </table>
</div>
