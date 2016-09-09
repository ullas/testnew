<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tripstatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tripstatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tripstatuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tripstatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($tripstatus) ?>
    <fieldset>
        <legend><?= __('Edit Tripstatus') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
