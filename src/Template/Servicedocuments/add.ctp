<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Servicedocuments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['controller' => 'Servicesentries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['controller' => 'Servicesentries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="servicedocuments form large-9 medium-8 columns content">
    <?= $this->Form->create($servicedocument) ?>
    <fieldset>
        <legend><?= __('Add Servicedocument') ?></legend>
        <?php
            echo $this->Form->input('servicesentry_id', ['options' => $servicesentries, 'empty' => true]);
            echo $this->Form->input('data');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
