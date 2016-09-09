<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs form large-9 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Edit Job') ?></legend>
        <?php
            echo $this->Form->input('jobdate', ['empty' => true]);
            echo $this->Form->input('trackingobject_id', ['options' => $trackingobjects, 'empty' => true]);
            echo $this->Form->input('assigned_by');
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('jobtime', ['empty' => true]);
            echo $this->Form->input('comments');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('timepolicy_id', ['options' => $timepolicies, 'empty' => true]);
            echo $this->Form->input('template_id');
            echo $this->Form->input('endcustomername');
            echo $this->Form->input('endcustomermailid');
            echo $this->Form->input('endcustomerphone');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('distance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
