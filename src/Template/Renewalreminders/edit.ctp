<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $renewalreminder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $renewalreminder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Renewalreminders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="renewalreminders form large-9 medium-8 columns content">
    <?= $this->Form->create($renewalreminder) ?>
    <fieldset>
        <legend><?= __('Edit Renewalreminder') ?></legend>
        <?php
            echo $this->Form->input('renewalstype_id');
            echo $this->Form->input('duedate');
            echo $this->Form->input('timethreashold');
            echo $this->Form->input('notificationrequired');
            echo $this->Form->input('distributionlist_id', ['options' => $distributionlists, 'empty' => true]);
            echo $this->Form->input('group_id', ['options' => $groups, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
