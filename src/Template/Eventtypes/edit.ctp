<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $eventtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $eventtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Eventtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Gpsdata'), ['controller' => 'Gpsdata', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="eventtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($eventtype) ?>
    <fieldset>
        <legend><?= __('Edit Eventtype') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('provider');
            echo $this->Form->input('name');
            echo $this->Form->input('model');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
