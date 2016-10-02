<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Servicesentry'), ['action' => 'edit', $servicesentry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Servicesentry'), ['action' => 'delete', $servicesentry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicesentry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Servicesentries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicesentry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicecompleted'), ['controller' => 'Servicecompleted', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicecompleted'), ['controller' => 'Servicecompleted', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicedocuments'), ['controller' => 'Servicedocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servicedocument'), ['controller' => 'Servicedocuments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="servicesentries view large-9 medium-8 columns content">
    <h3><?= h($servicesentry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $servicesentry->has('vehicle') ? $this->Html->link($servicesentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $servicesentry->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Refer') ?></th>
            <td><?= h($servicesentry->refer) ?></td>
        </tr>
        <tr>
            <th><?= __('Parts') ?></th>
            <td><?= h($servicesentry->parts) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $servicesentry->has('vendor') ? $this->Html->link($servicesentry->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $servicesentry->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($servicesentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($servicesentry->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Labour') ?></th>
            <td><?= $this->Number->format($servicesentry->labour) ?></td>
        </tr>
        <tr>
            <th><?= __('Tax') ?></th>
            <td><?= $this->Number->format($servicesentry->tax) ?></td>
        </tr>
        <tr>
            <th><?= __('Markasvoid') ?></th>
            <td><?= $servicesentry->markasvoid ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comments') ?></h4>
        <?= $this->Text->autoParagraph(h($servicesentry->comments)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicecompleted') ?></h4>
        <?php if (!empty($servicesentry->servicecompleted)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicesentry Id') ?></th>
                <th><?= __('Servicescompleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicesentry->servicecompleted as $servicecompleted): ?>
            <tr>
                <td><?= h($servicecompleted->id) ?></td>
                <td><?= h($servicecompleted->servicesentry_id) ?></td>
                <td><?= h($servicecompleted->servicescompleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicecompleted', 'action' => 'view', $servicecompleted->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicecompleted', 'action' => 'edit', $servicecompleted->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicecompleted', 'action' => 'delete', $servicecompleted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicecompleted->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Servicedocuments') ?></h4>
        <?php if (!empty($servicesentry->servicedocuments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Servicesentry Id') ?></th>
                <th><?= __('Data') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($servicesentry->servicedocuments as $servicedocuments): ?>
            <tr>
                <td><?= h($servicedocuments->id) ?></td>
                <td><?= h($servicedocuments->servicesentry_id) ?></td>
                <td><?= h($servicedocuments->data) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Servicedocuments', 'action' => 'view', $servicedocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Servicedocuments', 'action' => 'edit', $servicedocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Servicedocuments', 'action' => 'delete', $servicedocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicedocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
