<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $servicetask->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $servicetask->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Servicetasks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['controller' => 'Servicereminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['controller' => 'Servicereminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicetasks form large-9 medium-8 columns content">
    <?= $this->Form->create($servicetask) ?>
    <fieldset>
        <legend><?= __('Edit Servicetask') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
