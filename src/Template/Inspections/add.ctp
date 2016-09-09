<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Inspections'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionfoms'), ['controller' => 'Inspectionfoms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionfom'), ['controller' => 'Inspectionfoms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspections form large-9 medium-8 columns content">
    <?= $this->Form->create($inspection) ?>
    <fieldset>
        <legend><?= __('Add Inspection') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('descriptions');
            echo $this->Form->input('inspectionfom_id', ['options' => $inspectionfoms, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
