<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fuelentry'), ['action' => 'edit', $fuelentry->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fuelentry'), ['action' => 'delete', $fuelentry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelentry->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fuelentries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuelentry'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fueldouments'), ['controller' => 'Fueldouments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fueldoument'), ['controller' => 'Fueldouments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fuelphotos'), ['controller' => 'Fuelphotos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fuelphoto'), ['controller' => 'Fuelphotos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fuelentries view large-9 medium-8 columns content">
    <h3><?= h($fuelentry->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $fuelentry->has('vehicle') ? $this->Html->link($fuelentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fuelentry->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltype') ?></th>
            <td><?= h($fuelentry->fueltype) ?></td>
        </tr>
        <tr>
            <th><?= __('Ref') ?></th>
            <td><?= h($fuelentry->ref) ?></td>
        </tr>
        <tr>
            <th><?= __('Markaspersonal') ?></th>
            <td><?= h($fuelentry->markaspersonal) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuelentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($fuelentry->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Priceperusnit') ?></th>
            <td><?= $this->Number->format($fuelentry->priceperusnit) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor Id') ?></th>
            <td><?= $this->Number->format($fuelentry->vendor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($fuelentry->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Partialfill') ?></th>
            <td><?= $fuelentry->partialfill ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Fueldouments') ?></h4>
        <?php if (!empty($fuelentry->fueldouments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Fuelentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuelentry->fueldouments as $fueldouments): ?>
            <tr>
                <td><?= h($fueldouments->id) ?></td>
                <td><?= h($fueldouments->data) ?></td>
                <td><?= h($fueldouments->fuelentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fueldouments', 'action' => 'view', $fueldouments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fueldouments', 'action' => 'edit', $fueldouments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fueldouments', 'action' => 'delete', $fueldouments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fueldouments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Fuelphotos') ?></h4>
        <?php if (!empty($fuelentry->fuelphotos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Fuelentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuelentry->fuelphotos as $fuelphotos): ?>
            <tr>
                <td><?= h($fuelphotos->id) ?></td>
                <td><?= h($fuelphotos->photo) ?></td>
                <td><?= h($fuelphotos->fuelentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fuelphotos', 'action' => 'view', $fuelphotos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fuelphotos', 'action' => 'edit', $fuelphotos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fuelphotos', 'action' => 'delete', $fuelphotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelphotos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
