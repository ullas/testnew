<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servicesentry->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servicesentry->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicecompleted'), ['controller' => 'Servicecompleted', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicecompleted'), ['controller' => 'Servicecompleted', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicedocuments'), ['controller' => 'Servicedocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicedocument'), ['controller' => 'Servicedocuments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicesentries form large-9 medium-8 columns content">
    <?= $this->Form->create($servicesentry) ?>
    <fieldset>
        <legend><?= __('Edit Servicesentry') ?></legend>
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('odometer');
            echo $this->Form->input('refer');
            echo $this->Form->input('labour');
            echo $this->Form->input('parts');
            echo $this->Form->input('tax');
            echo $this->Form->input('markasvoid');
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->input('comments');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
