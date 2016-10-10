<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses index large-9 medium-8 columns content">
    <h3><?= __('Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('designation') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('apartment') ?></th>
                <th><?= $this->Paginator->sort('streetname') ?></th>
                <th><?= $this->Paginator->sort('landmark') ?></th>
                <th><?= $this->Paginator->sort('areaname') ?></th>
                <th><?= $this->Paginator->sort('countryshortcode') ?></th>
                <th><?= $this->Paginator->sort('stateshortcode') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('pincode') ?></th>
                <th><?= $this->Paginator->sort('iscurrentAddress') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address): ?>
            <tr>
                <td><?= $this->Number->format($address->id) ?></td>
                <td><?= h($address->name) ?></td>
                <td><?= h($address->designation) ?></td>
                <td><?= h($address->email) ?></td>
                <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?></td>
                <td><?= h($address->mobile) ?></td>
                <td><?= h($address->apartment) ?></td>
                <td><?= h($address->streetname) ?></td>
                <td><?= h($address->landmark) ?></td>
                <td><?= h($address->areaname) ?></td>
                <td><?= h($address->countryshortcode) ?></td>
                <td><?= h($address->stateshortcode) ?></td>
                <td><?= h($address->city) ?></td>
                <td><?= h($address->pincode) ?></td>
                <td><?= h($address->iscurrentAddress) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
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
