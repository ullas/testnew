<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inspectionitem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionitem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inspectionitems'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionitemtypes'), ['controller' => 'Inspectionitemtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionitemtype'), ['controller' => 'Inspectionitemtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspectionforms'), ['controller' => 'Inspectionforms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspectionform'), ['controller' => 'Inspectionforms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspectionitems form large-9 medium-8 columns content">
    <?= $this->Form->create($inspectionitem) ?>
    <fieldset>
        <legend><?= __('Edit Inspectionitem') ?></legend>
        <?php
            echo $this->Form->input('inspectionitemtype_id', ['options' => $inspectionitemtypes, 'empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('inspectionforms._ids', ['options' => $inspectionforms]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
