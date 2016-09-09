<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ibutton->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ibutton->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ibuttons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ibuttons form large-9 medium-8 columns content">
    <?= $this->Form->create($ibutton) ?>
    <fieldset>
        <legend><?= __('Edit Ibutton') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('description');
            echo $this->Form->input('customer_id', ['options' => $customers]);
            echo $this->Form->input('driver_id', ['options' => $drivers, 'empty' => true]);
            echo $this->Form->input('privatekey');
            echo $this->Form->input('dateofpurchase', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
