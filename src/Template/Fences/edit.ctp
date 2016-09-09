<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fence->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fence->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fences form large-9 medium-8 columns content">
    <?= $this->Form->create($fence) ?>
    <fieldset>
        <legend><?= __('Edit Fence') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('fencedata');
            echo $this->Form->input('vehiclegroup_id');
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('show_on_map');
            echo $this->Form->input('alerts_on');
            echo $this->Form->input('enter_alert');
            echo $this->Form->input('enter_in');
            echo $this->Form->input('leave_alert');
            echo $this->Form->input('leave_out');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('leave_out_time');
            echo $this->Form->input('enter_in_time');
            echo $this->Form->input('zonetype_id');
            echo $this->Form->input('peoplegroup_id');
            echo $this->Form->input('assetgroup_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
