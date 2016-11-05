<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
   
    <li><a href="/parts/"> Parts</a></li>
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
            <th><?= __('Part No') ?></th>
            <td><?= h($part->partno) ?></td>
        </tr>
        <tr>
            <th><?= __('Part Category') ?></th>
            <td><?= $part->has('partcategory') ? $this->Html->link($part->partcategory->name, ['controller' => 'Partcategories', 'action' => 'view', $part->partcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Manufacturer Part No') ?></th>
            <td><?= h($part->manufacturerpartno) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($part->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Measurement Unit') ?></th>
            <td><?= $part->has('measurementunit') ? $this->Html->link($part->measurementunit->name, ['controller' => 'Measurementunits', 'action' => 'view', $part->measurementunit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $part->has('station') ? $this->Html->link($part->station->name, ['controller' => 'Stations', 'action' => 'view', $part->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Manufacturer') ?></th>
            <td><?= $part->has('manufacturer') ? $this->Html->link($part->manufacturer->name, ['controller' => 'Manufacturers', 'action' => 'view', $part->manufacturer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($part->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Upc') ?></th>
            <td><?= $this->Number->format($part->upc) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost') ?></th>
            <td><?= $this->Number->format($part->cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $this->Number->format($part->customer_id) ?></td>
        </tr>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> </table>
</div>
</section>
