<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $inspectionform->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $inspectionform->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Inspectionforms'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Inspections'), ['controller' => 'Inspections', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Inspection'), ['controller' => 'Inspections', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="inspectionforms form large-9 medium-8 columns content">
    <?= $this->Form->create($inspectionform) ?>
    <fieldset>
        <legend><?= __('Edit Inspectionform') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('data');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
