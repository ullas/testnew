<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $passenger->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passengers form large-9 medium-8 columns content">
    <?= $this->Form->create($passenger) ?>
    <fieldset>
        <legend><?= __('Edit Passenger') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('active');
            echo $this->Form->input('sex');
            echo $this->Form->input('age');
            echo $this->Form->input('address');
            echo $this->Form->input('phone');
            echo $this->Form->input('mobile');
            echo $this->Form->input('comments');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
