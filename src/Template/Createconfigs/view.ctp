<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Createconfig'), ['action' => 'edit', $createconfig->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Createconfig'), ['action' => 'delete', $createconfig->id], ['confirm' => __('Are you sure you want to delete # {0}?', $createconfig->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Createconfigs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Createconfig'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="createconfigs view large-9 medium-8 columns content">
    <h3><?= h($createconfig->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Table Name') ?></th>
            <td><?= h($createconfig->table_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Field Name') ?></th>
            <td><?= h($createconfig->field_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Datatype') ?></th>
            <td><?= h($createconfig->datatype) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($createconfig->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($createconfig->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($createconfig->customer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Has Datefield') ?></th>
            <td><?= $createconfig->has_datefield ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Has Select') ?></th>
            <td><?= $createconfig->has_select ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
