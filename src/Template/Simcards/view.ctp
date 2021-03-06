<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/simcards/"> Sim Cards</a></li>
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
            <td><?= h($simcard->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sim Provider') ?></th>
            <td><?= $simcard->has('simprovider') ? $this->Html->link($simcard->simprovider->name, ['controller' => 'Simproviders', 'action' => 'view', $simcard->simprovider->id]) : '' ?></td>
        </tr>
       <tr>
            <th><?= __('Bill Day Of Month') ?></th>
            <td><?= $this->Number->format($simcard->billdayofmonth) ?></td>
        </tr>
        <tr>
            <th><?= __('Due Day Of Month') ?></th>
            <td><?= $this->Number->format($simcard->duedayofmonth) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Date With Fine') ?></th>
            <td><?= $this->Number->format($simcard->lastdatewithfine) ?></td>
        </tr>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>