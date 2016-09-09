<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicleengines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleengines form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicleengine) ?>
    <fieldset>
        <legend><?= __('Add Vehicleengine') ?></legend>
        <?php
            echo $this->Form->input('enginesummary');
            echo $this->Form->input('brand');
            echo $this->Form->input('aspiration');
            echo $this->Form->input('blocktype');
            echo $this->Form->input('bore');
            echo $this->Form->input('camtype');
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('compression');
            echo $this->Form->input('cylinders');
            echo $this->Form->input('displacement');
            echo $this->Form->input('fuel_induction');
            echo $this->Form->input('fuel_quality');
            echo $this->Form->input('max_hp');
            echo $this->Form->input('max_torque');
            echo $this->Form->input('redline_rpm');
            echo $this->Form->input('stroke');
            echo $this->Form->input('valves');
            echo $this->Form->input('transmission_summary');
            echo $this->Form->input('trasmission_brand');
            echo $this->Form->input('transmission_type');
            echo $this->Form->input('traasmission_gears');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
