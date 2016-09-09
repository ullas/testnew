<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $part->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $part->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Parts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Partcategories'), ['controller' => 'Partcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partcategory'), ['controller' => 'Partcategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Manufacturers'), ['controller' => 'Manufacturers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Manufacturer'), ['controller' => 'Manufacturers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Measurementunits'), ['controller' => 'Measurementunits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Measurementunit'), ['controller' => 'Measurementunits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stations'), ['controller' => 'Stations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Station'), ['controller' => 'Stations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="parts form large-9 medium-8 columns content">
    <?= $this->Form->create($part) ?>
    <fieldset>
        <legend><?= __('Edit Part') ?></legend>
        <?php
            echo $this->Form->input('partno');
            echo $this->Form->input('partcategory_id', ['options' => $partcategories, 'empty' => true]);
            echo $this->Form->input('manufacturer_id', ['options' => $manufacturers, 'empty' => true]);
            echo $this->Form->input('manufacturerpartno');
            echo $this->Form->input('description');
            echo $this->Form->input('measurementunit_id', ['options' => $measurementunits, 'empty' => true]);
            echo $this->Form->input('upc');
            echo $this->Form->input('cost');
            echo $this->Form->input('station_id', ['options' => $stations, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
