<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assettype'), ['action' => 'edit', $assettype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assettype'), ['action' => 'delete', $assettype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assettype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assettypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assettype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assettypes view large-9 medium-8 columns content">
    <h3><?= h($assettype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($assettype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($assettype->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($assettype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trackingobjects') ?></h4>
        <?php if (!empty($assettype->trackingobjects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Assettype Id') ?></th>
                <th><?= __('Created Date') ?></th>
                <th><?= __('Modifield Date') ?></th>
                <th><?= __('Public Asset') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($assettype->trackingobjects as $trackingobjects): ?>
            <tr>
                <td><?= h($trackingobjects->id) ?></td>
                <td><?= h($trackingobjects->name) ?></td>
                <td><?= h($trackingobjects->assettype_id) ?></td>
                <td><?= h($trackingobjects->created_date) ?></td>
                <td><?= h($trackingobjects->modifield_date) ?></td>
                <td><?= h($trackingobjects->public_asset) ?></td>
                <td><?= h($trackingobjects->is_active) ?></td>
                <td><?= h($trackingobjects->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trackingobjects', 'action' => 'view', $trackingobjects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trackingobjects', 'action' => 'edit', $trackingobjects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trackingobjects', 'action' => 'delete', $trackingobjects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trackingobjects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
