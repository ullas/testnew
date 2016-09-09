<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subscription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subscriptions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subscriptions form large-9 medium-8 columns content">
    <?= $this->Form->create($subscription) ?>
    <fieldset>
        <legend><?= __('Edit Subscription') ?></legend>
        <?php
            echo $this->Form->input('schedule_id', ['options' => $schedules, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('active');
            echo $this->Form->input('validfrom', ['empty' => true]);
            echo $this->Form->input('validtill', ['empty' => true]);
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('notification_id');
            echo $this->Form->input('loctype');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
