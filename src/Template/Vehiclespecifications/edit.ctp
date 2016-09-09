<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehiclespecification->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclespecification->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehiclespecifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclespecifications form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclespecification) ?>
    <fieldset>
        <legend><?= __('Edit Vehiclespecification') ?></legend>
        <?php
            echo $this->Form->input('width');
            echo $this->Form->input('height');
            echo $this->Form->input('length');
            echo $this->Form->input('interiorvolume');
            echo $this->Form->input('passengervolume');
            echo $this->Form->input('cargovolume');
            echo $this->Form->input('groudclearance');
            echo $this->Form->input('bedlength');
            echo $this->Form->input('curbweight');
            echo $this->Form->input('grossweight');
            echo $this->Form->input('towingcapacity');
            echo $this->Form->input('epacity');
            echo $this->Form->input('epahighway');
            echo $this->Form->input('epacombined');
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('maxpayload');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
