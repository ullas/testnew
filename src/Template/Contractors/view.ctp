<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contractor'), ['action' => 'edit', $contractor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contractor'), ['action' => 'delete', $contractor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contractor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contractors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contractor'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contractors view large-9 medium-8 columns content">
    <h3><?= h($contractor->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($contractor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Descrtption') ?></th>
            <td><?= h($contractor->descrtption) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $contractor->has('customer') ? $this->Html->link($contractor->customer->name, ['controller' => 'Customers', 'action' => 'view', $contractor->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contractor->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Drivers') ?></h4>
        <?php if (!empty($contractor->drivers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Middlename') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Nationality') ?></th>
                <th><?= __('Idcardno') ?></th>
                <th><?= __('Licenceno') ?></th>
                <th><?= __('Licenceexpdate') ?></th>
                <th><?= __('Address Id') ?></th>
                <th><?= __('Nextofkin') ?></th>
                <th><?= __('Comments') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Ibutton Id') ?></th>
                <th><?= __('Drivingpassportno') ?></th>
                <th><?= __('Drivingpassportexp') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Vehicle Id') ?></th>
                <th><?= __('Drivinglicenseclass') ?></th>
                <th><?= __('Contractor Id') ?></th>
                <th><?= __('Station Id') ?></th>
                <th><?= __('Reporingtime') ?></th>
                <th><?= __('Offday1') ?></th>
                <th><?= __('Offday2') ?></th>
                <th><?= __('Supervisor Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($contractor->drivers as $drivers): ?>
            <tr>
                <td><?= h($drivers->id) ?></td>
                <td><?= h($drivers->name) ?></td>
                <td><?= h($drivers->middlename) ?></td>
                <td><?= h($drivers->lastname) ?></td>
                <td><?= h($drivers->dob) ?></td>
                <td><?= h($drivers->sex) ?></td>
                <td><?= h($drivers->nationality) ?></td>
                <td><?= h($drivers->idcardno) ?></td>
                <td><?= h($drivers->licenceno) ?></td>
                <td><?= h($drivers->licenceexpdate) ?></td>
                <td><?= h($drivers->address_id) ?></td>
                <td><?= h($drivers->nextofkin) ?></td>
                <td><?= h($drivers->comments) ?></td>
                <td><?= h($drivers->photo) ?></td>
                <td><?= h($drivers->ibutton_id) ?></td>
                <td><?= h($drivers->drivingpassportno) ?></td>
                <td><?= h($drivers->drivingpassportexp) ?></td>
                <td><?= h($drivers->customer_id) ?></td>
                <td><?= h($drivers->vehicle_id) ?></td>
                <td><?= h($drivers->drivinglicenseclass) ?></td>
                <td><?= h($drivers->contractor_id) ?></td>
                <td><?= h($drivers->station_id) ?></td>
                <td><?= h($drivers->reporingtime) ?></td>
                <td><?= h($drivers->offday1) ?></td>
                <td><?= h($drivers->offday2) ?></td>
                <td><?= h($drivers->supervisor_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Drivers', 'action' => 'view', $drivers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Drivers', 'action' => 'edit', $drivers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Drivers', 'action' => 'delete', $drivers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
