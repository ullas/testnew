<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assettypes'), ['controller' => 'Assettypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assettype'), ['controller' => 'Assettypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trackingobjects form large-9 medium-8 columns content">
    <?= $this->Form->create($trackingobject) ?>
    <fieldset>
        <legend><?= __('Add Trackingobject') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('assettype_id', ['options' => $assettypes, 'empty' => true]);
            echo $this->Form->input('created_date');
            echo $this->Form->input('modifield_date');
            echo $this->Form->input('public_asset');
            echo $this->Form->input('is_active');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('groups._ids', ['options' => $groups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
