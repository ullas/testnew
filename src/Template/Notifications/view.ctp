<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Notification 
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Templates</a></li>
     <li><a href="/notifications/"> Notifications</a></li>
    <li class="active">View</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-12">
     <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Details</h3>

          <div class="box-tools pull-right">
            <a href="/notifications/add/" class="btn btn-sm btn-info btn-flat pull-left">Add a new New Notification</a>
         
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
        <tr>
            <th><?= __('Timepolicy') ?></th>
            <td><?= $notification->has('timepolicy') ? $this->Html->link($notification->timepolicy->name, ['controller' => 'Timepolicies', 'action' => 'view', $notification->timepolicy->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($notification->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notification->id) ?></td>
        </tr>
    </table>
     </div> <!-- table responsive -->
    </div> <!-- box body -->
     </div> <!-- box -->
    </div> <!--col -->
 </div> <!--row-->
 </section>
    