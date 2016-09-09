<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $vehiclewheelstyre->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclewheelstyre->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehiclewheelstyres'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclewheelstyres form large-9 medium-8 columns content">
    <?= $this->Form->create($vehiclewheelstyre) ?>
    <fieldset>
        <legend><?= __('Edit Vehiclewheelstyre') ?></legend>
        <?php
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('drivetype');
            echo $this->Form->input('breaksystem');
            echo $this->Form->input('fronttrackwidth');
            echo $this->Form->input('reartrackwidth');
            echo $this->Form->input('wheelbase');
            echo $this->Form->input('frontwheeldia');
            echo $this->Form->input('rearwheeldia');
            echo $this->Form->input('rearaxil');
            echo $this->Form->input('fronttyretype');
            echo $this->Form->input('fronttyrepsi');
            echo $this->Form->input('reartyretype');
            echo $this->Form->input('reartyrepsi');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
