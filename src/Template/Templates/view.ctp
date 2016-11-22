<section class="content-header">
  <h1>
    <?php echo $this->request->params['controller'] ?> Details
  </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#"> Templates</a></li>
     <li><a href="/templates/"> email/sms templates</a></li>
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
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($template->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Template') ?></th>
            <td><?= h($template->templatetext) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($template->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Template Category') ?></th>
            <td><?= h($template->templatecat) ?></td>
        </tr>
        <tr>
            <th><?= __('Template Type Id') ?></th>
            <td><?= $this->Number->format($template->templatetype_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Alert Category Id') ?></th>
            <td><?= $this->Number->format($template->alertcategory_id) ?></td>
        </tr>
     </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
</div> 
</section>
