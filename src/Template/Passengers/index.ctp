<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passengers index large-9 medium-8 columns content">
    <h3><?= __('Passengers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('middle_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('sex') ?></th>
                <th><?= $this->Paginator->sort('age') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('comments') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passengers as $passenger): ?>
            <tr>
                <td><?= $this->Number->format($passenger->id) ?></td>
                <td><?= h($passenger->first_name) ?></td>
                <td><?= h($passenger->middle_name) ?></td>
                <td><?= h($passenger->last_name) ?></td>
                <td><?= h($passenger->active) ?></td>
                <td><?= h($passenger->sex) ?></td>
                <td><?= $this->Number->format($passenger->age) ?></td>
                <td><?= h($passenger->address) ?></td>
                <td><?= h($passenger->phone) ?></td>
                <td><?= h($passenger->mobile) ?></td>
                <td><?= h($passenger->comments) ?></td>
                <td><?= $passenger->has('customer') ? $this->Html->link($passenger->customer->name, ['controller' => 'Customers', 'action' => 'view', $passenger->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passenger->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passenger->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?>
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
