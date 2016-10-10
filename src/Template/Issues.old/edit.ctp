<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $issue->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Issuedocuments'), ['controller' => 'Issuedocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issuedocument'), ['controller' => 'Issuedocuments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="issues form large-9 medium-8 columns content">
    <?= $this->Form->create($issue) ?>
    <fieldset>
        <legend><?= __('Edit Issue') ?></legend>
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('reportedon', ['empty' => true]);
            echo $this->Form->input('summary');
            echo $this->Form->input('description');
            echo $this->Form->input('odometer');
            echo $this->Form->input('reportedby_id');
            echo $this->Form->input('assignedto_id');
            echo $this->Form->input('tags');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
