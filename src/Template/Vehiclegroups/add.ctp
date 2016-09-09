<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehiclegroups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Defaultvehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Defaultvehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclegroups form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclegroup) ?>
    <fieldset>
        <legend><?= __('Add Vehiclegroup') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('defaultvehicle_id', ['options' => $defaultvehicles, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
