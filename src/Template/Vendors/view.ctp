<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Vendor 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    
    <li class="active">Vendor</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Vendor Details</h3>

          <div class="box-tools pull-right">
           <a href="/vendors/add/" class="btn btn-sm btn-success" aria-label="Add a new vendor"><i class="fa fa-plus" aria-hidden="true"></i></a></a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin table-hover">
            	<thead>
            		<tr>
            			
            		</tr>
            		<tr>
            			
            		</tr>
               </thead>
              <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($vendor->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($vendor->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($vendor->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($vendor->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Addressline2') ?></th>
            <td><?= h($vendor->addressline2) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($vendor->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($vendor->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Zippostal') ?></th>
            <td><?= h($vendor->zippostal) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($vendor->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Contactname') ?></th>
            <td><?= h($vendor->contactname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($vendor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contactphone') ?></th>
            <td><?= h($vendor->contactphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendor->id) ?></td>
        </tr>
        </tbody>
    </table>
    </div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
 
  <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Purchase Details</h3>

          <div class="box-tools pull-right">
           
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
             <thead>
            		<tr>
            			
            		</tr>
            		<tr>
            			
            		</tr>
               </thead>
              <tbody>
            <tr>
                <th><?= __('ID') ?></th>
              
                <th><?= __('Price') ?></th>
               
                <th><?= __('Purchase Date') ?></th>
                <th><?= __('Purchase Odometer') ?></th>
                <th><?= __('Warranty Exp. Date') ?></th>
                <th><?= __('Warrenty Exp. Odmeter') ?></th>
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vendor->vehiclepurchases as $vehiclepurchases): ?>
            <tr>
                <td><?= h($vehiclepurchases->id) ?></td>
                <td><?= h($vehiclepurchases->price) ?></td>
               <td><?= h($vehiclepurchases->purchasedate) ?></td>
                <td><?= h($vehiclepurchases->purchasepodometer) ?></td>
                <td><?= h($vehiclepurchases->warrantyexpdate) ?></td>
                <td><?= h($vehiclepurchases->warrentyexpmeter) ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehiclepurchases', 'action' => 'view', $vehiclepurchases->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehiclepurchases', 'action' => 'edit', $vehiclepurchases->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehiclepurchases', 'action' => 'delete', $vehiclepurchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehiclepurchases->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
       </div> <!--box body -->
     </div> <!-- box -->
    </div> <!-- col -->
  </div> <!-- row -->

</section>
