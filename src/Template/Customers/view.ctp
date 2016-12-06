<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/Customers/"> Customers</a></li>
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
            <td><?= h($customer->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($customer->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact First Name') ?></th>
            <td><?= h($customer->contact_first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Technical Contact First Name') ?></th>
            <td><?= h($customer->tech_cont_first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert Email') ?></th>
            <td><?= h($customer->alert_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Phone') ?></th>
            <td><?= h($customer->contact_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Technical Contact Phone') ?></th>
            <td><?= h($customer->tech_cont_phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($customer->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Last Name') ?></th>
            <td><?= h($customer->contact_last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Technical Contact Last Name') ?></th>
            <td><?= h($customer->tech_cont_last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Contact Email') ?></th>
            <td><?= h($customer->contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($customer->city) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($customer->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($customer->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip') ?></th>
            <td><?= h($customer->zip) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($customer->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($customer->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th><?= __('No Of Lic') ?></th>
            <td><?= $this->Number->format($customer->no_of_lic) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Timezone') ?></th>
            <td><?= $this->Number->format($customer->timezone) ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= $this->Number->format($customer->language) ?></td>
        </tr>
       
        <tr>
            <th><?= __('Init Lat') ?></th>
            <td><?= $this->Number->format($customer->initlat) ?></td>
        </tr>
        <tr>
            <th><?= __('Init Long') ?></th>
            <td><?= $this->Number->format($customer->initlong) ?></td>
        </tr>
        <tr>
            <th><?= __('Update Group') ?></th>
            <td><?= $this->Number->format($customer->updategroup) ?></td>
        </tr>
        <tr>
            <th><?= __('Weekly Off1') ?></th>
            <td><?= $this->Number->format($customer->weekly_off1) ?></td>
        </tr>
        <tr>
            <th><?= __('Weekly Off2') ?></th>
            <td><?= $this->Number->format($customer->weekly_off2) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Expiry Date') ?></th>
            <td><?= h($customer->srv_exp_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Service Start Date') ?></th>
            <td><?= h($customer->srv_str_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($customer->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($customer->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('SMS Enabled') ?></th>
            <td><?= $customer->smsenabled ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>