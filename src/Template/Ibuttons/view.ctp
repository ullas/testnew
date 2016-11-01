<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Hardware</a></li>
     <li><a href="/ibuttons/"> iButtons</a></li>
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
            <th><?= __('Code') ?></th>
            <td><?= h($ibutton->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($ibutton->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $ibutton->has('customer') ? $this->Html->link($ibutton->customer->name, ['controller' => 'Customers', 'action' => 'view', $ibutton->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ibutton->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Driver Id') ?></th>
            <td><?= $this->Number->format($ibutton->driver_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Purchase') ?></th>
            <td><?= h($ibutton->dateofpurchase) ?></td>
        </tr>
        <tr>
            <th><?= __('Private Key') ?></th>
            <td><?= $ibutton->privatekey ? __('Yes') : __('No'); ?></td>
        </tr>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div>
</section>