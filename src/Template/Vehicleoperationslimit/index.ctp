<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicleoperationslimit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List I Buttons'), ['controller' => 'Ibuttons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New I Button'), ['controller' => 'Ibuttons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleoperationslimit index large-9 medium-8 columns content">
    <h3><?= __('Vehicleoperationslimit') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('vehice_id') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('speed_limit') ?></th>
                <th><?= $this->Paginator->sort('battery_voltage') ?></th>
                <th><?= $this->Paginator->sort('accelarationlimit') ?></th>
                <th><?= $this->Paginator->sort('breakinglimit') ?></th>
                <th><?= $this->Paginator->sort('crashlimit') ?></th>
                <th><?= $this->Paginator->sort('shutlimit') ?></th>
                <th><?= $this->Paginator->sort('continiousruntime') ?></th>
                <th><?= $this->Paginator->sort('odometer_offset') ?></th>
                <th><?= $this->Paginator->sort('iButton_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicleoperationslimit as $vehicleoperationslimit): ?>
            <tr>
                <td><?= $this->Number->format($vehicleoperationslimit->vehice_id) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->id) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->speed_limit) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->battery_voltage) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->accelarationlimit) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->breakinglimit) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->crashlimit) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->shutlimit) ?></td>
                <td><?= $this->Number->format($vehicleoperationslimit->continiousruntime) ?></td>
                <td><?= h($vehicleoperationslimit->odometer_offset) ?></td>
                <td><?= $vehicleoperationslimit->has('i_button') ? $this->Html->link($vehicleoperationslimit->i_button->id, ['controller' => 'Ibuttons', 'action' => 'view', $vehicleoperationslimit->i_button->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehicleoperationslimit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehicleoperationslimit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehicleoperationslimit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicleoperationslimit->id)]) ?>
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
