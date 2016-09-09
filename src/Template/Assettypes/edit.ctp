<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assettype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assettype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Assettypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="assettypes form large-9 medium-8 columns content">
    <?= $this->Form->create($assettype) ?>
    <fieldset>
        <legend><?= __('Edit Assettype') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
