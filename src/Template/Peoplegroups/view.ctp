<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Peoplegroup'), ['action' => 'edit', $peoplegroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Peoplegroup'), ['action' => 'delete', $peoplegroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peoplegroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Peoplegroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Peoplegroup'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="peoplegroups view large-9 medium-8 columns content">
    <h3><?= h($peoplegroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($peoplegroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($peoplegroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($peoplegroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Defaultperson Id') ?></th>
            <td><?= $this->Number->format($peoplegroup->defaultperson_id) ?></td>
        </tr>
    </table>
</div>
