<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timepolicies index large-9 medium-8 columns content">
    <h3><?= __('Timepolicies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('sunday') ?></th>
                <th><?= $this->Paginator->sort('monday') ?></th>
                <th><?= $this->Paginator->sort('tuesday') ?></th>
                <th><?= $this->Paginator->sort('wednesday') ?></th>
                <th><?= $this->Paginator->sort('thursday') ?></th>
                <th><?= $this->Paginator->sort('friday') ?></th>
                <th><?= $this->Paginator->sort('saturday') ?></th>
                <th><?= $this->Paginator->sort('sun_start_time') ?></th>
                <th><?= $this->Paginator->sort('sun_end_time') ?></th>
                <th><?= $this->Paginator->sort('mon_start_time') ?></th>
                <th><?= $this->Paginator->sort('mon_end_time') ?></th>
                <th><?= $this->Paginator->sort('tue_start_time') ?></th>
                <th><?= $this->Paginator->sort('tue_end_time') ?></th>
                <th><?= $this->Paginator->sort('wed_start_time') ?></th>
                <th><?= $this->Paginator->sort('wed_end_time') ?></th>
                <th><?= $this->Paginator->sort('thu_start_time') ?></th>
                <th><?= $this->Paginator->sort('thu_end_time') ?></th>
                <th><?= $this->Paginator->sort('fri_start_time') ?></th>
                <th><?= $this->Paginator->sort('fri_end_time') ?></th>
                <th><?= $this->Paginator->sort('sat_start_time') ?></th>
                <th><?= $this->Paginator->sort('sat_end_time') ?></th>
                <th><?= $this->Paginator->sort('ev') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('system') ?></th>
                <th><?= $this->Paginator->sort('enabled') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timepolicies as $timepolicy): ?>
            <tr>
                <td><?= h($timepolicy->name) ?></td>
                <td><?= h($timepolicy->sunday) ?></td>
                <td><?= h($timepolicy->monday) ?></td>
                <td><?= h($timepolicy->tuesday) ?></td>
                <td><?= h($timepolicy->wednesday) ?></td>
                <td><?= h($timepolicy->thursday) ?></td>
                <td><?= h($timepolicy->friday) ?></td>
                <td><?= h($timepolicy->saturday) ?></td>
                <td><?= h($timepolicy->sun_start_time) ?></td>
                <td><?= h($timepolicy->sun_end_time) ?></td>
                <td><?= h($timepolicy->mon_start_time) ?></td>
                <td><?= h($timepolicy->mon_end_time) ?></td>
                <td><?= h($timepolicy->tue_start_time) ?></td>
                <td><?= h($timepolicy->tue_end_time) ?></td>
                <td><?= h($timepolicy->wed_start_time) ?></td>
                <td><?= h($timepolicy->wed_end_time) ?></td>
                <td><?= h($timepolicy->thu_start_time) ?></td>
                <td><?= h($timepolicy->thu_end_time) ?></td>
                <td><?= h($timepolicy->fri_start_time) ?></td>
                <td><?= h($timepolicy->fri_end_time) ?></td>
                <td><?= h($timepolicy->sat_start_time) ?></td>
                <td><?= h($timepolicy->sat_end_time) ?></td>
                <td><?= h($timepolicy->ev) ?></td>
                <td><?= $this->Number->format($timepolicy->id) ?></td>
                <td><?= $timepolicy->has('customer') ? $this->Html->link($timepolicy->customer->name, ['controller' => 'Customers', 'action' => 'view', $timepolicy->customer->id]) : '' ?></td>
                <td><?= h($timepolicy->system) ?></td>
                <td><?= h($timepolicy->enabled) ?></td>
                <td><?= h($timepolicy->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timepolicy->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timepolicy->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timepolicy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timepolicy->id)]) ?>
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
