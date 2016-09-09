<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job'), ['action' => 'edit', $job->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trackingobjects'), ['controller' => 'Trackingobjects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trackingobject'), ['controller' => 'Trackingobjects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Timepolicies'), ['controller' => 'Timepolicies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Timepolicy'), ['controller' => 'Timepolicies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobs view large-9 medium-8 columns content">
    <h3><?= h($job->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Trackingobject') ?></th>
            <td><?= $job->has('trackingobject') ? $this->Html->link($job->trackingobject->name, ['controller' => 'Trackingobjects', 'action' => 'view', $job->trackingobject->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Assigned By') ?></th>
            <td><?= h($job->assigned_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($job->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($job->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($job->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $job->has('customer') ? $this->Html->link($job->customer->name, ['controller' => 'Customers', 'action' => 'view', $job->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $job->has('timepolicy') ? $this->Html->link($job->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $job->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Endcustomername') ?></th>
            <td><?= h($job->endcustomername) ?></td>
        </tr>
        <tr>
            <th><?= __('Endcustomermailid') ?></th>
            <td><?= h($job->endcustomermailid) ?></td>
        </tr>
        <tr>
            <th><?= __('Endcustomerphone') ?></th>
            <td><?= h($job->endcustomerphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $job->has('location') ? $this->Html->link($job->location->name, ['controller' => 'Locations', 'action' => 'view', $job->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($job->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Template Id') ?></th>
            <td><?= $this->Number->format($job->template_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($job->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Distance') ?></th>
            <td><?= $this->Number->format($job->distance) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobdate') ?></th>
            <td><?= h($job->jobdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Jobtime') ?></th>
            <td><?= h($job->jobtime) ?></td>
        </tr>
    </table>
</div>
