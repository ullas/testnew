<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehiclelease'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicleleases index large-9 medium-8 columns content">
    <h3><?= __('Vehicleleases') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('maonthypayment') ?></th>
                <th><?= $this->Paginator->sort('startdate') ?></th>
                <th><?= $this->Paginator->sort('enddate') ?></th>
                <th><?= $this->Paginator->sort('amountfinanced') ?></th>
                <th><?= $this->Paginator->sort('interestrate') ?></th>
                <th><?= $this->Paginator->sort('residualvalue') ?></th>
                <th><?= $this->Paginator->sort('vendor_id') ?></th>
                <th><?= $this->Paginator->sort('accountnumber') ?></th>
                <th><?= $this->Paginator->sort('ifsccode') ?></th>
                <th><?= $this->Paginator->sort('swiftcode') ?></th>
                <th><?= $this->Paginator->sort('notes') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicleleases as $vehiclelease): ?>
            <tr>
                <td><?= $this->Number->format($vehiclelease->id) ?></td>
                <td><?= $this->Number->format($vehiclelease->maonthypayment) ?></td>
                <td><?= h($vehiclelease->startdate) ?></td>
                <td><?= h($vehiclelease->enddate) ?></td>
                <td><?= $this->Number->format($vehiclelease->amountfinanced) ?></td>
                <td><?= $this->Number->format($vehiclelease->interestrate) ?></td>
                <td><?= $this->Number->format($vehiclelease->residualvalue) ?></td>
                <td><?= $vehiclelease->has('vendor') ? $this->Html->link($vehiclelease->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vehiclelease->vendor->id]) : '' ?></td>
                <td><?= $this->Number->format($vehiclelease->accountnumber) ?></td>
                <td><?= h($vehiclelease->ifsccode) ?></td>
                <td><?= h($vehiclelease->swiftcode) ?></td>
                <td><?= h($vehiclelease->notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vehiclelease->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vehiclelease->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vehiclelease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclelease->id)]) ?>
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
