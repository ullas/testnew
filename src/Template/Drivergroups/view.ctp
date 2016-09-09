<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Drivergroup'), ['action' => 'edit', $drivergroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Drivergroup'), ['action' => 'delete', $drivergroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drivergroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Drivergroups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Drivergroup'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Defaultdrivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Defaultdriver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="drivergroups view large-9 medium-8 columns content">
    <h3><?= h($drivergroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($drivergroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($drivergroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Defaultdriver') ?></th>
            <td><?= $drivergroup->has('defaultdriver') ? $this->Html->link($drivergroup->defaultdriver->id, ['controller' => 'Drivers', 'action' => 'view', $drivergroup->defaultdriver->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($drivergroup->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Drivers') ?></h4>
        <?php if (!empty($drivergroup->drivers)): ?>
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
                <th><?= __('Rfid Id') ?></th>
                <th><?= __('Drivingpassportno') ?></th>
                <th><?= __('Drivingpassportexp') ?></th>
                <th><?= __('Isibutton') ?></th>
                <th><?= __('Isrfid') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($drivergroup->drivers as $drivers): ?>
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
                <td><?= h($drivers->rfid_id) ?></td>
                <td><?= h($drivers->drivingpassportno) ?></td>
                <td><?= h($drivers->drivingpassportexp) ?></td>
                <td><?= h($drivers->isibutton) ?></td>
                <td><?= h($drivers->isrfid) ?></td>
                <td><?= h($drivers->customer_id) ?></td>
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
