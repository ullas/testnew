<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicetask'), ['action' => 'edit', $servicetask->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicetask'), ['action' => 'delete', $servicetask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicetask->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicetasks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicetask'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicereminders'), ['controller' => 'Servicereminders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicereminder'), ['controller' => 'Servicereminders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicetasks view large-9 medium-8 columns content">
    <h3><?= h($servicetask->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($servicetask->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $servicetask->has('customer') ? $this->Html->link($servicetask->customer->name, ['controller' => 'Customers', 'action' => 'view', $servicetask->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicetask->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Servicereminders') ?></h4>
        <?php if (!empty($servicetask->servicereminders)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicetask Id') ?></th>
                <th><?= __('Meterinterval') ?></th>
                <th><?= __('Daysinterval') ?></th>
                <th><?= __('Meterthreshold') ?></th>
                <th><?= __('Timethreashold') ?></th>
                <th><?= __('Notificationrequired') ?></th>
                <th><?= __('Distributionlist Id') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicetask->servicereminders as $servicereminders): ?>
            <tr>
                <td><?= h($servicereminders->id) ?></td>
                <td><?= h($servicereminders->servicetask_id) ?></td>
                <td><?= h($servicereminders->meterinterval) ?></td>
                <td><?= h($servicereminders->daysinterval) ?></td>
                <td><?= h($servicereminders->meterthreshold) ?></td>
                <td><?= h($servicereminders->timethreashold) ?></td>
                <td><?= h($servicereminders->notificationrequired) ?></td>
                <td><?= h($servicereminders->distributionlist_id) ?></td>
                <td><?= h($servicereminders->group_id) ?></td>
                <td><?= h($servicereminders->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicereminders', 'action' => 'view', $servicereminders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicereminders', 'action' => 'edit', $servicereminders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicereminders', 'action' => 'delete', $servicereminders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicereminders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
