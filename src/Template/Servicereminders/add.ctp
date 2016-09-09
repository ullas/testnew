<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicereminders form large-9 medium-8 columns content">
    <?= $this->Form->create($servicereminder) ?>
    <fieldset>
        <legend><?= __('Add Servicereminder') ?></legend>
        <?php
            echo $this->Form->input('servicetask_id');
            echo $this->Form->input('meterinterval');
            echo $this->Form->input('daysinterval');
            echo $this->Form->input('meterthreshold');
            echo $this->Form->input('timethreashold');
            echo $this->Form->input('notificationrequired');
            echo $this->Form->input('distributionlist_id', ['options' => $distributionlists, 'empty' => true]);
            echo $this->Form->input('group_id', ['options' => $groups, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
