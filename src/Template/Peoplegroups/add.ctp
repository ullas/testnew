<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Peoplegroups'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="peoplegroups form large-9 medium-8 columns content">
    <?= $this->Form->create($peoplegroup) ?>
    <fieldset>
        <legend><?= __('Add Peoplegroup') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('defaultperson_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
