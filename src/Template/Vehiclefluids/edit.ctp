<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehiclefluid->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclefluid->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehiclefluids'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclefluids form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclefluid) ?>
    <fieldset>
        <legend><?= __('Edit Vehiclefluid') ?></legend>
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('fueltype');
            echo $this->Form->input('fuelquality');
            echo $this->Form->input('fueltank1_capacity');
            echo $this->Form->input('fueltank2_capacity');
            echo $this->Form->input('oil_capacity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
