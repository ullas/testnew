<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($address->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($address->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($address->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $address->has('customer') ? $this->Html->link($address->customer->name, ['controller' => 'Customers', 'action' => 'view', $address->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($address->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Apartment') ?></th>
            <td><?= h($address->apartment) ?></td>
        </tr>
        <tr>
            <th><?= __('Streetname') ?></th>
            <td><?= h($address->streetname) ?></td>
        </tr>
        <tr>
            <th><?= __('Landmark') ?></th>
            <td><?= h($address->landmark) ?></td>
        </tr>
        <tr>
            <th><?= __('Areaname') ?></th>
            <td><?= h($address->areaname) ?></td>
        </tr>
        <tr>
            <th><?= __('Countryshortcode') ?></th>
            <td><?= h($address->countryshortcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Stateshortcode') ?></th>
            <td><?= h($address->stateshortcode) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($address->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Pincode') ?></th>
            <td><?= h($address->pincode) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
        <tr>
            <th><?= __('IscurrentAddress') ?></th>
            <td><?= $address->iscurrentAddress ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Drivers') ?></h4>
        <?php if (!empty($address->drivers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
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
                <th><?= __('Isasupervisor') ?></th>
                <th><?= __('Ragscore') ?></th>
                <th><?= __('Ragsummary') ?></th>
                <th><?= __('Salary') ?></th>
                <th><?= __('Maritalstatus') ?></th>
                <th><?= __('Experience') ?></th>
                <th><?= __('Licenseissuedby') ?></th>
                <th><?= __('Previouscompanyname') ?></th>
                <th><?= __('Shift Id') ?></th>
                <th><?= __('Ismarker') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->drivers as $drivers): ?>
            <tr>
                <td><?= h($drivers->id) ?></td>
                <td><?= h($drivers->name) ?></td>
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
                <td><?= h($drivers->isasupervisor) ?></td>
                <td><?= h($drivers->ragscore) ?></td>
                <td><?= h($drivers->ragsummary) ?></td>
                <td><?= h($drivers->salary) ?></td>
                <td><?= h($drivers->maritalstatus) ?></td>
                <td><?= h($drivers->experience) ?></td>
                <td><?= h($drivers->licenseissuedby) ?></td>
                <td><?= h($drivers->previouscompanyname) ?></td>
                <td><?= h($drivers->shift_id) ?></td>
                <td><?= h($drivers->ismarker) ?></td>
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
    <div class="related">
        <h4><?= __('Related Distributionlists') ?></h4>
        <?php if (!empty($address->distributionlists)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Name') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Id') ?></th>
                <th><?= __('System') ?></th>
                <th><?= __('Enabled') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($address->distributionlists as $distributionlists): ?>
            <tr>
                <td><?= h($distributionlists->name) ?></td>
                <td><?= h($distributionlists->description) ?></td>
                <td><?= h($distributionlists->customer_id) ?></td>
                <td><?= h($distributionlists->id) ?></td>
                <td><?= h($distributionlists->system) ?></td>
                <td><?= h($distributionlists->enabled) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Distributionlists', 'action' => 'view', $distributionlists->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Distributionlists', 'action' => 'edit', $distributionlists->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Distributionlists', 'action' => 'delete', $distributionlists->id], ['confirm' => __('Are you sure you want to delete # {0}?', $distributionlists->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
