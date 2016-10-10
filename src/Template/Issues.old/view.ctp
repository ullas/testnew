<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Issue'), ['action' => 'edit', $issue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Issue'), ['action' => 'delete', $issue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issue->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Issues'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issue'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Issuedocuments'), ['controller' => 'Issuedocuments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Issuedocument'), ['controller' => 'Issuedocuments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="issues view large-9 medium-8 columns content">
    <h3><?= h($issue->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $issue->has('vehicle') ? $this->Html->link($issue->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $issue->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Summary') ?></th>
            <td><?= h($issue->summary) ?></td>
        </tr>
        <tr>
            <th><?= __('Tags') ?></th>
            <td><?= h($issue->tags) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($issue->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($issue->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Reportedby Id') ?></th>
            <td><?= $this->Number->format($issue->reportedby_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignedto Id') ?></th>
            <td><?= $this->Number->format($issue->assignedto_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Reportedon') ?></th>
            <td><?= h($issue->reportedon) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($issue->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Issuedocuments') ?></h4>
        <?php if (!empty($issue->issuedocuments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Issue Id') ?></th>
                <th><?= __('Docs') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($issue->issuedocuments as $issuedocuments): ?>
            <tr>
                <td><?= h($issuedocuments->id) ?></td>
                <td><?= h($issuedocuments->name) ?></td>
                <td><?= h($issuedocuments->issue_id) ?></td>
                <td><?= h($issuedocuments->docs) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Issuedocuments', 'action' => 'view', $issuedocuments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Issuedocuments', 'action' => 'edit', $issuedocuments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Issuedocuments', 'action' => 'delete', $issuedocuments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $issuedocuments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
