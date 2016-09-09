<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Provider'), ['action' => 'edit', $provider->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Provider'), ['action' => 'delete', $provider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $provider->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="providers view large-9 medium-8 columns content">
    <h3><?= h($provider->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($provider->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($provider->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $provider->has('customer') ? $this->Html->link($provider->customer->name, ['controller' => 'Customers', 'action' => 'view', $provider->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Modelno') ?></th>
            <td><?= h($provider->modelno) ?></td>
        </tr>
        <tr>
            <th><?= __('Osver') ?></th>
            <td><?= h($provider->osver) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($provider->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Devices') ?></h4>
        <?php if (!empty($provider->devices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Install Date') ?></th>
                <th><?= __('Installed By') ?></th>
                <th><?= __('Certified By') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Provider Id') ?></th>
                <th><?= __('Distance Type') ?></th>
                <th><?= __('Odometersupport') ?></th>
                <th><?= __('Initodometer') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provider->devices as $devices): ?>
            <tr>
                <td><?= h($devices->id) ?></td>
                <td><?= h($devices->code) ?></td>
                <td><?= h($devices->customer_id) ?></td>
                <td><?= h($devices->install_date) ?></td>
                <td><?= h($devices->installed_by) ?></td>
                <td><?= h($devices->certified_by) ?></td>
                <td><?= h($devices->comments) ?></td>
                <td><?= h($devices->provider_id) ?></td>
                <td><?= h($devices->distance_type) ?></td>
                <td><?= h($devices->odometersupport) ?></td>
                <td><?= h($devices->initodometer) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
