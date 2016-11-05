<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Administration</a></li>
     <li><a href="/vendors/"> Vendors</a></li>
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
            <th><?= __('Address Line2 ') ?></th>
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
            <th><?= __('Zip Postal') ?></th>
            <td><?= h($vendor->zippostal) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($vendor->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Name') ?></th>
            <td><?= h($vendor->contactname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($vendor->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Phone') ?></th>
            <td><?= h($vendor->contactphone) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($vendor->id) ?></td>
        </tr>
        </tbody>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>