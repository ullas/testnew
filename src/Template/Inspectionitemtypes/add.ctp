<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Inspectionitemtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionitems'), ['controller' => 'Inspectionitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionitem'), ['controller' => 'Inspectionitems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspectionitemtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($inspectionitemtype) ?>
    <fieldset>
        <legend><?= __('Add Inspectionitemtype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
