<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Renewalstypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['controller' => 'Renewalreminders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Renewalreminder'), ['controller' => 'Renewalreminders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="renewalstypes form large-9 medium-8 columns content">
    <?= $this->Form->create($renewalstype) ?>
    <fieldset>
        <legend><?= __('Add Renewalstype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
