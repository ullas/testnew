<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fuelentry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fuelentry->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fuelentries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fueldouments'), ['controller' => 'Fueldouments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fueldoument'), ['controller' => 'Fueldouments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fuelphotos'), ['controller' => 'Fuelphotos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fuelphoto'), ['controller' => 'Fuelphotos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fuelentries form large-9 medium-8 columns content">
    <?= $this->Form->create($fuelentry) ?>
    <fieldset>
        <legend><?= __('Edit Fuelentry') ?></legend>
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('date', ['empty' => true]);
            echo $this->Form->input('odometer');
            echo $this->Form->input('priceperusnit');
            echo $this->Form->input('fueltype');
            echo $this->Form->input('vendor_id');
            echo $this->Form->input('ref');
            echo $this->Form->input('partialfill');
            echo $this->Form->input('markaspersonal');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
