<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ownership->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ownership->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ownerships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ownerships form large-9 medium-8 columns content">
    <?= $this->Form->create($ownership) ?>
    <fieldset>
        <legend><?= __('Edit Ownership') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('customer_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
