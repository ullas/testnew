<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workorder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workorder->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Workorders'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicles'), ['controller' => 'Vehicles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vehicle'), ['controller' => 'Vehicles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vendors'), ['controller' => 'Vendors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vendor'), ['controller' => 'Vendors', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Issues'), ['controller' => 'Issues', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Issue'), ['controller' => 'Issues', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Worklorderlineitems'), ['controller' => 'Worklorderlineitems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Worklorderlineitem'), ['controller' => 'Worklorderlineitems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workorderdocuments'), ['controller' => 'Workorderdocuments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workorderdocument'), ['controller' => 'Workorderdocuments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workorders form large-9 medium-8 columns content">
    <?= $this->Form->create($workorder) ?>
    <fieldset>
        <legend><?= __('Edit Workorder') ?></legend>
        <?php
            echo $this->Form->input('issuedate', ['empty' => true]);
            echo $this->Form->input('workorderstatus_id');
            echo $this->Form->input('vehicle_id', ['options' => $vehicles, 'empty' => true]);
            echo $this->Form->input('startdate', ['empty' => true]);
            echo $this->Form->input('lables');
            echo $this->Form->input('odometer');
            echo $this->Form->input('void');
            echo $this->Form->input('vendor_id', ['options' => $vendors, 'empty' => true]);
            echo $this->Form->input('completiondate', ['empty' => true]);
            echo $this->Form->input('labour');
            echo $this->Form->input('parts');
            echo $this->Form->input('dicount');
            echo $this->Form->input('tax');
            echo $this->Form->input('issuedby_id');
            echo $this->Form->input('assignedby_id');
            echo $this->Form->input('assignto_id');
            echo $this->Form->input('invoicenumber');
            echo $this->Form->input('POnumber');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
