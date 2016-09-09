<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Currency'), ['action' => 'edit', $currency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Currency'), ['action' => 'delete', $currency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $currency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Currencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Currency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehiclepurchases'), ['controller' => 'Vehiclepurchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclepurchase'), ['controller' => 'Vehiclepurchases', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="currencies view large-9 medium-8 columns content">
    <h3><?= h($currency->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($currency->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Abbrev') ?></th>
            <td><?= h($currency->abbrev) ?></td>
        </tr>
        <tr>
            <th><?= __('Symbol') ?></th>
            <td><?= h($currency->symbol) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($currency->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vehiclepurchases') ?></h4>
        <?php if (!empty($currency->vehiclepurchases)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Vendor Id') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Currency Id') ?></th>
                <th><?= __('Purchasedate') ?></th>
                <th><?= __('Purchasepodometer') ?></th>
                <th><?= __('Warrantyexpdate') ?></th>
                <th><?= __('Warrentyexpmeter') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($currency->vehiclepurchases as $vehiclepurchases): ?>
            <tr>
                <td><?= h($vehiclepurchases->id) ?></td>
                <td><?= h($vehiclepurchases->vendor_id) ?></td>
                <td><?= h($vehiclepurchases->price) ?></td>
                <td><?= h($vehiclepurchases->currency_id) ?></td>
                <td><?= h($vehiclepurchases->purchasedate) ?></td>
                <td><?= h($vehiclepurchases->purchasepodometer) ?></td>
                <td><?= h($vehiclepurchases->warrantyexpdate) ?></td>
                <td><?= h($vehiclepurchases->warrentyexpmeter) ?></td>
                <td><?= h($vehiclepurchases->comments) ?></td>
                <td><?= h($vehiclepurchases->vehicle_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehiclepurchases', 'action' => 'view', $vehiclepurchases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiclepurchases', 'action' => 'edit', $vehiclepurchases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehiclepurchases', 'action' => 'delete', $vehiclepurchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclepurchases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
