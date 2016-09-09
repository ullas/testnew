<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $schedule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Edit Schedule') ?></legend>
        <?php
            echo $this->Form->input('validfrom', ['empty' => true]);
            echo $this->Form->input('validtill', ['empty' => true]);
            echo $this->Form->input('startloc_id');
            echo $this->Form->input('endloc_id');
            echo $this->Form->input('route_id');
            echo $this->Form->input('start_time', ['empty' => true]);
            echo $this->Form->input('end_time', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('timepolicy_id');
            echo $this->Form->input('default_driver_id');
            echo $this->Form->input('default_veh_id');
            echo $this->Form->input('name');
            echo $this->Form->input('nodays');
            echo $this->Form->input('brktime_bfr_nxt_trip');
            echo $this->Form->input('default_paxgrpid');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
