<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehiclelease'), ['action' => 'edit', $vehiclelease->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehiclelease'), ['action' => 'delete', $vehiclelease->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclelease->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicleleases'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehiclelease'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicleleases view large-9 medium-8 columns content">
    <h3><?= h($vehiclelease->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Vendor') ?></th>
            <td><?= $vehiclelease->has('vendor') ? $this->Html->link($vehiclelease->vendor->name, ['controller' => 'Vendors', 'action' => 'view', $vehiclelease->vendor->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ifsccode') ?></th>
            <td><?= h($vehiclelease->ifsccode) ?></td>
        </tr>
        <tr>
            <th><?= __('Swiftcode') ?></th>
            <td><?= h($vehiclelease->swiftcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Notes') ?></th>
            <td><?= h($vehiclelease->notes) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehiclelease->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Maonthypayment') ?></th>
            <td><?= $this->Number->format($vehiclelease->maonthypayment) ?></td>
        </tr>
        <tr>
            <th><?= __('Amountfinanced') ?></th>
            <td><?= $this->Number->format($vehiclelease->amountfinanced) ?></td>
        </tr>
        <tr>
            <th><?= __('Interestrate') ?></th>
            <td><?= $this->Number->format($vehiclelease->interestrate) ?></td>
        </tr>
        <tr>
            <th><?= __('Residualvalue') ?></th>
            <td><?= $this->Number->format($vehiclelease->residualvalue) ?></td>
        </tr>
        <tr>
            <th><?= __('Accountnumber') ?></th>
            <td><?= $this->Number->format($vehiclelease->accountnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Startdate') ?></th>
            <td><?= h($vehiclelease->startdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Enddate') ?></th>
            <td><?= h($vehiclelease->enddate) ?></td>
        </tr>
    </table>
</div>
