<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclewheelstyre'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehiclewheelstyres index large-9 medium-8 columns content">
    <h3><?= __('Vehiclewheelstyres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('vehicle_id') ?></th>
                <th><?= $this->Paginator->sort('drivetype') ?></th>
                <th><?= $this->Paginator->sort('breaksystem') ?></th>
                <th><?= $this->Paginator->sort('fronttrackwidth') ?></th>
                <th><?= $this->Paginator->sort('reartrackwidth') ?></th>
                <th><?= $this->Paginator->sort('wheelbase') ?></th>
                <th><?= $this->Paginator->sort('frontwheeldia') ?></th>
                <th><?= $this->Paginator->sort('rearwheeldia') ?></th>
                <th><?= $this->Paginator->sort('rearaxil') ?></th>
                <th><?= $this->Paginator->sort('fronttyretype') ?></th>
                <th><?= $this->Paginator->sort('fronttyrepsi') ?></th>
                <th><?= $this->Paginator->sort('reartyretype') ?></th>
                <th><?= $this->Paginator->sort('reartyrepsi') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehiclewheelstyres as $vehiclewheelstyre): ?>
            <tr>
                <td><?= $this->Number->format($vehiclewheelstyre->id) ?></td>
                <td><?= $vehiclewheelstyre->has('vehicle') ? $this->Html->link($vehiclewheelstyre->vehicle->name, ['controller' => 'Vehicles', 'action' => 'view', $vehiclewheelstyre->vehicle->id]) : '' ?></td>
                <td><?= h($vehiclewheelstyre->drivetype) ?></td>
                <td><?= h($vehiclewheelstyre->breaksystem) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->fronttrackwidth) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->reartrackwidth) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->wheelbase) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->frontwheeldia) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->rearwheeldia) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->rearaxil) ?></td>
                <td><?= h($vehiclewheelstyre->fronttyretype) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->fronttyrepsi) ?></td>
                <td><?= h($vehiclewheelstyre->reartyretype) ?></td>
                <td><?= $this->Number->format($vehiclewheelstyre->reartyrepsi) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclewheelstyre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclewheelstyre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclewheelstyre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclewheelstyre->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
