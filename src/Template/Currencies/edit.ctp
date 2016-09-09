<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $currency->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Currencies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehiclepurchases'), ['controller' => 'Vehiclepurchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehiclepurchase'), ['controller' => 'Vehiclepurchases', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="currencies form large-9 medium-8 columns content">
    <?= $this->Form->create($currency) ?>
    <fieldset>
        <legend><?= __('Edit Currency') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('abbrev');
            echo $this->Form->input('symbol');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
