<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timepolicy->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timepolicy->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timepolicies form large-9 medium-8 columns content">
    <?= $this->Form->create($timepolicy) ?>
    <fieldset>
        <legend><?= __('Edit Timepolicy') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('sunday');
            echo $this->Form->input('monday');
            echo $this->Form->input('tuesday');
            echo $this->Form->input('wednesday');
            echo $this->Form->input('thursday');
            echo $this->Form->input('friday');
            echo $this->Form->input('saturday');
            echo $this->Form->input('sun_start_time', ['empty' => true]);
            echo $this->Form->input('sun_end_time', ['empty' => true]);
            echo $this->Form->input('mon_start_time', ['empty' => true]);
            echo $this->Form->input('mon_end_time', ['empty' => true]);
            echo $this->Form->input('tue_start_time', ['empty' => true]);
            echo $this->Form->input('tue_end_time', ['empty' => true]);
            echo $this->Form->input('wed_start_time', ['empty' => true]);
            echo $this->Form->input('wed_end_time', ['empty' => true]);
            echo $this->Form->input('thu_start_time', ['empty' => true]);
            echo $this->Form->input('thu_end_time', ['empty' => true]);
            echo $this->Form->input('fri_start_time', ['empty' => true]);
            echo $this->Form->input('fri_end_time', ['empty' => true]);
            echo $this->Form->input('sat_start_time', ['empty' => true]);
            echo $this->Form->input('sat_end_time', ['empty' => true]);
            echo $this->Form->input('ev');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('system');
            echo $this->Form->input('enabled');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
