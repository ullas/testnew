<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Workorderstatuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorders'), ['controller' => 'Workorders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorder'), ['controller' => 'Workorders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workorderstatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($workorderstatus) ?>
    <fieldset>
        <legend><?= __('Add Workorderstatus') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
