<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicecompleted'), ['action' => 'edit', $servicecompleted->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicecompleted'), ['action' => 'delete', $servicecompleted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicecompleted->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicecompleted'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicecompleted'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['controller' => 'Servicesentries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['controller' => 'Servicesentries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicecompleted view large-9 medium-8 columns content">
    <h3><?= h($servicecompleted->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Servicesentry') ?></th>
            <td><?= $servicecompleted->has('servicesentry') ? $this->Html->link($servicecompleted->servicesentry->id, ['controller' => 'Servicesentries', 'action' => 'view', $servicecompleted->servicesentry->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Servicescompleted') ?></th>
            <td><?= h($servicecompleted->servicescompleted) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicecompleted->id) ?></td>
        </tr>
    </table>
</div>
