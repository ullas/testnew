<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicleleases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleleases form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclelease) ?>
    <fieldset>
        <legend><?= __('Add Vehiclelease') ?></legend>
        <?php
            echo $this->Form->input('maonthypayment');
            echo $this->Form->input('startdate', ['empty' => true]);
            echo $this->Form->input('enddate', ['empty' => true]);
            echo $this->Form->input('amountfinanced');
            echo $this->Form->input('interestrate');
            echo $this->Form->input('residualvalue');
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->input('accountnumber');
            echo $this->Form->input('ifsccode');
            echo $this->Form->input('swiftcode');
            echo $this->Form->input('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
