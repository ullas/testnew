<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicedocument'), ['action' => 'edit', $servicedocument->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicedocument'), ['action' => 'delete', $servicedocument->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicedocument->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicedocuments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicedocument'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['controller' => 'Servicesentries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['controller' => 'Servicesentries', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicedocuments view large-9 medium-8 columns content">
    <h3><?= h($servicedocument->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Servicesentry') ?></th>
            <td><?= $servicedocument->has('servicesentry') ? $this->Html->link($servicedocument->servicesentry->id, ['controller' => 'Servicesentries', 'action' => 'view', $servicedocument->servicesentry->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicedocument->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($servicedocument->data)); ?>
    </div>
</div>
