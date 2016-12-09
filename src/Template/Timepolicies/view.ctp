<section class="content-header">
  <h1>
     <?php echo $this->request->params['controller'] ?> Details
  </h1>
  <ol class="breadcrumb">
  	<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="/timepolicies/"> Time Policies</a></li>
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
            <td><?= h($timepolicy->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Sunday') ?></th>
            <td><?= $timepolicy->sunday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Monday') ?></th>
            <td><?= $timepolicy->monday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Tuesday') ?></th>
            <td><?= $timepolicy->tuesday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Wednesday') ?></th>
            <td><?= $timepolicy->wednesday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Thursday') ?></th>
            <td><?= $timepolicy->thursday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Friday') ?></th>
            <td><?= $timepolicy->friday ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Saturday') ?></th>
            <td><?= $timepolicy->saturday ? __('Yes') : __('No'); ?></td>
        </tr>
        
        <tr>
            <th><?= __('Sun Start Time') ?></th>
            <td><?= h($timepolicy->sun_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sun End Time') ?></th>
            <td><?= h($timepolicy->sun_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Mon Start Time') ?></th>
            <td><?= h($timepolicy->mon_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Mon End Time') ?></th>
            <td><?= h($timepolicy->mon_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Tue Start Time') ?></th>
            <td><?= h($timepolicy->tue_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Tue End Time') ?></th>
            <td><?= h($timepolicy->tue_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Wed Start Time') ?></th>
            <td><?= h($timepolicy->wed_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Wed End Time') ?></th>
            <td><?= h($timepolicy->wed_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Thu Start Time') ?></th>
            <td><?= h($timepolicy->thu_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Thu End Time') ?></th>
            <td><?= h($timepolicy->thu_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Fri Start Time') ?></th>
            <td><?= h($timepolicy->fri_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Fri End Time') ?></th>
            <td><?= h($timepolicy->fri_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat Start Time') ?></th>
            <td><?= h($timepolicy->sat_start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Sat End Time') ?></th>
            <td><?= h($timepolicy->sat_end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Ev') ?></th>
            <td><?= $timepolicy->ev ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($timepolicy->description) ?></td>
        </tr>
    </table>
   </div><!--boxbody-->
   </div><!-- box -->
  
  </div><!-- col12-->
  </div>
  </section>