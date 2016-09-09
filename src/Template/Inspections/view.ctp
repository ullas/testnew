<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Inspection'), ['action' => 'edit', $inspection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Inspection'), ['action' => 'delete', $inspection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $inspection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Inspections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspection'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Inspectionfoms'), ['controller' => 'Inspectionfoms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Inspectionfom'), ['controller' => 'Inspectionfoms', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="inspections view large-9 medium-8 columns content">
    <h3><?= h($inspection->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($inspection->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Descriptions') ?></th>
            <td><?= h($inspection->descriptions) ?></td>
        </tr>
        <tr>
            <th><?= __('Inspectionfom') ?></th>
            <td><?= $inspection->has('inspectionfom') ? $this->Html->link($inspection->inspectionfom->name, ['controller' => 'Inspectionfoms', 'action' => 'view', $inspection->inspectionfom->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $inspection->has('customer') ? $this->Html->link($inspection->customer->name, ['controller' => 'Customers', 'action' => 'view', $inspection->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($inspection->id) ?></td>
        </tr>
    </table>
</div>
