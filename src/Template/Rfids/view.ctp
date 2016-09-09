<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfid'), ['action' => 'edit', $rfid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfid'), ['action' => 'delete', $rfid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfids view large-9 medium-8 columns content">
    <h3><?= h($rfid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($rfid->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($rfid->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $rfid->has('customer') ? $this->Html->link($rfid->customer->name, ['controller' => 'Customers', 'action' => 'view', $rfid->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Passenger') ?></th>
            <td><?= $rfid->has('passenger') ? $this->Html->link($rfid->passenger->id, ['controller' => 'Passengers', 'action' => 'view', $rfid->passenger->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($rfid->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Driver Id') ?></th>
            <td><?= $this->Number->format($rfid->driver_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateofpurchase') ?></th>
            <td><?= h($rfid->dateofpurchase) ?></td>
        </tr>
        <tr>
            <th><?= __('Privatekey') ?></th>
            <td><?= $rfid->privatekey ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Drivers') ?></h4>
        <?php if (!empty($rfid->drivers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Firstname') ?></th>
                <th><?= __('Middlename') ?></th>
                <th><?= __('Lastname') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('Sex') ?></th>
                <th><?= __('Nationality') ?></th>
                <th><?= __('Idcardno') ?></th>
                <th><?= __('Licenceno') ?></th>
                <th><?= __('Licenceexpdate') ?></th>
                <th><?= __('Contact Id') ?></th>
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
            <?php foreach ($rfid->drivers as $drivers): ?>
            <tr>
                <td><?= h($drivers->id) ?></td>
                <td><?= h($drivers->firstname) ?></td>
                <td><?= h($drivers->middlename) ?></td>
                <td><?= h($drivers->lastname) ?></td>
                <td><?= h($drivers->dob) ?></td>
                <td><?= h($drivers->sex) ?></td>
                <td><?= h($drivers->nationality) ?></td>
                <td><?= h($drivers->idcardno) ?></td>
                <td><?= h($drivers->licenceno) ?></td>
                <td><?= h($drivers->licenceexpdate) ?></td>
                <td><?= h($drivers->contact_id) ?></td>
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
