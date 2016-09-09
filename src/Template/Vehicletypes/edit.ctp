<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehicletype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicletype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicletypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicletypes form large-9 medium-8 columns content">
    <?= $this->Form->create($vehicletype) ?>
    <fieldset>
        <legend><?= __('Edit Vehicletype') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
