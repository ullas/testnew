<section class="content-header">
  <h1>
     <?= h($fuelentry->name) ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/fuelentries/"> Fuel Entries</a></li>
    <li class="active">View</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
  	
  	<div class="box box-primary">
  		<div class="box-body">
  		<table class="table table-hover">
        <tr>
            <th><?= __('Vehicle') ?></th>
            <td><?= $fuelentry->has('vehicle') ? $this->Html->link($fuelentry->vehicle->id, ['controller' => 'Vehicles', 'action' => 'view', $fuelentry->vehicle->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Fueltype') ?></th>
            <td><?= h($fuelentry->fueltype) ?></td>
        </tr>
        <tr>
            <th><?= __('Ref') ?></th>
            <td><?= h($fuelentry->ref) ?></td>
        </tr>
        <tr>
            <th><?= __('Markaspersonal') ?></th>
            <td><?= h($fuelentry->markaspersonal) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fuelentry->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Odometer') ?></th>
            <td><?= $this->Number->format($fuelentry->odometer) ?></td>
        </tr>
        <tr>
            <th><?= __('Priceperusnit') ?></th>
            <td><?= $this->Number->format($fuelentry->priceperusnit) ?></td>
        </tr>
        <tr>
            <th><?= __('Vendor Id') ?></th>
            <td><?= $this->Number->format($fuelentry->vendor_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($fuelentry->date) ?></td>
        </tr>
        <tr>
            <th><?= __('Partialfill') ?></th>
            <td><?= $fuelentry->partialfill ? __('Yes') : __('No'); ?></td>
        </tr>
 </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
<div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
		        <h4><?= __('Related Documents') ?></h4>
		        <?php if (!empty($fuelentry->fueldouments)): ?>
         </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Data') ?></th>
                <th><?= __('Fuelentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuelentry->fueldouments as $fueldouments): ?>
            <tr>
                <td><?= h($fueldouments->id) ?></td>
                <td><?= h($fueldouments->data) ?></td>
                <td><?= h($fueldouments->fuelentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fueldouments', 'action' => 'view', $fueldouments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fueldouments', 'action' => 'edit', $fueldouments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fueldouments', 'action' => 'delete', $fueldouments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fueldouments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
  </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
    <div class="row">
    	<div class="col-md-12">
  	
  	     <div class="box box-primary"><div class="box-header">
  	     	
        <h4><?= __('Related Photos') ?></h4>
        <?php if (!empty($fuelentry->fuelphotos)): ?>
         </div>
  		<div class="box-body">
  		<table class="table table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Fuelentry Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fuelentry->fuelphotos as $fuelphotos): ?>
            <tr>
                <td><?= h($fuelphotos->id) ?></td>
                <td><?= h($fuelphotos->photo) ?></td>
                <td><?= h($fuelphotos->fuelentry_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fuelphotos', 'action' => 'view', $fuelphotos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fuelphotos', 'action' => 'edit', $fuelphotos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fuelphotos', 'action' => 'delete', $fuelphotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fuelphotos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
        <?php endif; ?>
    </div>
</div>
