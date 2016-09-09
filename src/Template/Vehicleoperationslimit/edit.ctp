<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicleoperationslimit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleoperationslimit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicleoperationslimit'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List I Buttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New I Button'), ['controller' => 'Ibuttons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleoperationslimit form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicleoperationslimit) ?>
    <fieldset>
        <legend><?= __('Edit Vehicleoperationslimit') ?></legend>
        <?php
            echo $this->Form->input('vehice_id');
            echo $this->Form->input('speed_limit');
            echo $this->Form->input('battery_voltage');
            echo $this->Form->input('accelarationlimit');
            echo $this->Form->input('breakinglimit');
            echo $this->Form->input('crashlimit');
            echo $this->Form->input('shutlimit');
            echo $this->Form->input('continiousruntime');
            echo $this->Form->input('odometer_offset');
            echo $this->Form->input('iButton_id', ['options' => $iButtons, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
