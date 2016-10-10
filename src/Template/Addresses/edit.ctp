<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $address->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Distributionlists'), ['controller' => 'Distributionlists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Distributionlist'), ['controller' => 'Distributionlists', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses form large-9 medium-8 columns content">
    <?= $this->Form->create($address) ?>
    <fieldset>
        <legend><?= __('Edit Address') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('designation');
            echo $this->Form->input('email');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('mobile');
            echo $this->Form->input('apartment');
            echo $this->Form->input('streetname');
            echo $this->Form->input('landmark');
            echo $this->Form->input('areaname');
            echo $this->Form->input('countryshortcode');
            echo $this->Form->input('stateshortcode');
            echo $this->Form->input('city');
            echo $this->Form->input('pincode');
            echo $this->Form->input('iscurrentAddress');
            echo $this->Form->input('distributionlists._ids', ['options' => $distributionlists]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
