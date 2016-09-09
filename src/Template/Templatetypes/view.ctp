<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Templatetype'), ['action' => 'edit', $templatetype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Templatetype'), ['action' => 'delete', $templatetype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templatetype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Templatetypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Templatetype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="templatetypes view large-9 medium-8 columns content">
    <h3><?= h($templatetype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($templatetype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($templatetype->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $templatetype->has('customer') ? $this->Html->link($templatetype->customer->name, ['controller' => 'Customers', 'action' => 'view', $templatetype->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($templatetype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Templates') ?></h4>
        <?php if (!empty($templatetype->templates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Templatetype Id') ?></th>
                <th><?= __('Alertcategory Id') ?></th>
                <th><?= __('Template') ?></th>
                <th><?= __('Subject') ?></th>
                <th><?= __('Templatecat') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($templatetype->templates as $templates): ?>
            <tr>
                <td><?= h($templates->id) ?></td>
                <td><?= h($templates->customer_id) ?></td>
                <td><?= h($templates->name) ?></td>
                <td><?= h($templates->description) ?></td>
                <td><?= h($templates->templatetype_id) ?></td>
                <td><?= h($templates->alertcategory_id) ?></td>
                <td><?= h($templates->template) ?></td>
                <td><?= h($templates->subject) ?></td>
                <td><?= h($templates->templatecat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Templates', 'action' => 'view', $templates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Templates', 'action' => 'edit', $templates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Templates', 'action' => 'delete', $templates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
