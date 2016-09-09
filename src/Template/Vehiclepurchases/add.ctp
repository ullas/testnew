<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehiclepurchases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclepurchases form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclepurchase) ?>
    <fieldset>
        <legend><?= __('Add Vehiclepurchase') ?></legend>
        <?php
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->input('price');
            echo $this->Form->input('currency_id');
            echo $this->Form->input('purchasedate', ['empty' => true]);
            echo $this->Form->input('purchasepodometer');
            echo $this->Form->input('warrantyexpdate', ['empty' => true]);
            echo $this->Form->input('warrentyexpmeter');
            echo $this->Form->input('comments');
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
