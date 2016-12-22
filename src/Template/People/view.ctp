<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
  	<li><a href="#"><i class="fa fa-puzzle-piece"></i> Administration</a></li>
    <li><a href="#"><i class="fa fa-puzzle-piece"></i> Tracking Items</a></li>
    <li><a href="/people/"><i class="fa fa-user"></i> People</a></li>
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
            <td><?= h($person->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($person->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($person->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Line1') ?></th>
            <td><?= h($person->addressline1) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($person->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($person->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($person->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($person->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= $person->has('department') ? $this->Html->link($person->department->name, ['controller' => 'Departments', 'action' => 'view', $person->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Station') ?></th>
            <td><?= $person->has('station') ? $this->Html->link($person->station->name, ['controller' => 'Stations', 'action' => 'view', $person->station->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($person->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Age') ?></th>
            <td><?= $this->Number->format($person->age) ?></td>
        </tr>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>