<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Createconfigs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="createconfigs form large-9 medium-8 columns content">
    <?= $this->Form->create($createconfig) ?>
    <fieldset>
        <legend><?= __('Add Createconfig') ?></legend>
        <?php
            echo $this->Form->input('table_name');
            echo $this->Form->input('field_name');
            echo $this->Form->input('datatype');
            echo $this->Form->input('has_datefield');
            echo $this->Form->input('has_select');
            echo $this->Form->input('customer_id');
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
