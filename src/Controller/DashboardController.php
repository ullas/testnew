<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class DashboardController extends AppController
{


  
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        
		  $tobjTable = TableRegistry::get('Trackingobjects');
		  $vehicleTable = TableRegistry::get('Vehicles');
		  $peopleTable = TableRegistry::get('People');
		  $assetTable = TableRegistry::get('Assets');
		  $alertTable = TableRegistry::get('Alerts');
		  $dailysummaryTable = TableRegistry::get('Dailysummary');
		  $ragtable = TableRegistry::get('Ragscores');
		  $triptable = TableRegistry::get('Trips');
		  $jobtable = TableRegistry::get('Jobs');
		  $remindertable = TableRegistry::get('Todaysreminders');
		  
		  $query=$tobjTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalcount=$query->count();
		  
		  $query=$vehicleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $vehiclescount=$query->count();
		  
		  $query=$peopleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $peoplecount=$query->count();
		  $query=$assetTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $assetcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '1'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $overspeedalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totaloverspeedalertcount=$query->count();
		  
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '2'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $harshbreakingalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '2'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalharshbreakingalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '3'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $fenceviolationalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '3'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalfenceviolationalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '4'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $eccessiveaccelalertcount=$query->count();
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '4'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totaleccessiveaccelalertcount=$query->count();
		  
		  $query=$dailysummaryTable->find('All')->where(['EXTRACT(month from mdate) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $distancecount=$query->sumOf('distance');
		  $fuelsum=$query->sumOf('fuel');
		 // $nonprodhrssum=$query->sumOf('businesstime');
		  $runtimesum=$query->sumOf('runningtime')/3600 ;
		  $countrecs = $query->count();
		  $nonprodhrssum = ($countrecs*86400 - $query->sumOf('businesstime')) / 3600;
		  
		  $var = "'1 months'";
		  $query=$dailysummaryTable->find('All')->where(['EXTRACT(month from mdate) = EXTRACT(month from date(now()) - INTERVAL  '.$var.')'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $lastmonthdistancecount=$query->sumOf('distance');
		  $lastmonthfuelsum=$query->sumOf('fuel');
		  //$lastmonthnonprodhrssum=$query->sumOf('businesstime') / 3600;
		  $lastmonthcountrecs = $query->count();
		  $lastmonthnonprodhrssum = ($lastmonthcountrecs*86400 - $query->sumOf('businesstime')) / 3600;
		   
		  $lastmonthruntimesum=$query->sumOf('runningtime') / 3600;
		  
		 
		  
		  
		  $query=$ragtable->find('All')->where(['EXTRACT(day from idate) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']])->toArray();
		  (isset($query)) ? $ragcontent=$query : $ragcontent="";
		  // $this->log($ragcontent);
		  
		  //$query=$triptable->find('All')->where(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  
		  $query=$triptable->find('All')->where(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->orwhere(['EXTRACT(day from end_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  
		  $tripscount=$query->count();
		  $query2=$triptable->find('All')->where(['CURRENT_TIME BETWEEN start_time AND end_time'])->andwhere(['tripstatus_id = 1'])->andwhere(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->orwhere(['EXTRACT(day from end_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $currenttripscount=$query2->count();
		  $widthtrip = ($currenttripscount / $tripscount) * 100;
		  
		  $query=$jobtable->find('All')->where(['EXTRACT(day from jobdate) = EXTRACT(day from date(now()))'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $jobcount=$query->count();
		  $query2=$jobtable->find('All')->where(['status = 0'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $pendingjobcount=$query2->count();
		  $query3=$jobtable->find('All')->where(['EXTRACT(day from jobdate) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totaljobcount=$query3->count();
		  $widthjob = ($pendingjobcount / $totaljobcount) * 100;
		  
		  $query=$remindertable->find('All')->where(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $remindercount=$query->count();
		  $query2=$remindertable->find('All')->where(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalremindercount=$query2->count();
		  
		  // pending maintenance count from todays summary table. servicetask_id = 2 for maintenance
		  $query=$remindertable->find('All')->where(['servicetask_id = 2'])->andwhere(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $totalpendingmaintenancecount=$query->count();
		  $query=$remindertable->find('All')->where(['servicetask_id = 2'])->andwhere(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $pendingmaintenancecount=$query->count();
		  
		  $cls1 = (($distancecount-$lastmonthdistancecount) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  $cls2 = (($fuelsum-$lastmonthfuelsum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  $cls3 = (($nonprodhrssum-$lastmonthnonprodhrssum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";		
		  $cls4 = (($runtimesum-$lastmonthruntimesum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  
		  $this->set(compact('totalcount','vehiclescount','peoplecount','assetcount','overspeedalertcount','totaloverspeedalertcount',
		  'harshbreakingalertcount','totalharshbreakingalertcount','fenceviolationalertcount','totalfenceviolationalertcount',
		  'eccessiveaccelalertcount','totaleccessiveaccelalertcount','distancecount','lastmonthdistancecount','ragcontent','fuelsum'
		  ,'nonprodhrssum','runtimesum','lastmonthfuelsum','lastmonthnonprodhrssum','lastmonthruntimesum','countrecs','tripscount',
		  'currenttripscount','jobcount','pendingjobcount','remindercount','totalremindercount','cls1','cls2','cls3','cls4',
		  'widthtrip','widthjob','totalpendingmaintenancecount','pendingmaintenancecount'));
		  
		  
    }
	public function getChartData(){
     	
		$this->autoRender= false;
		
		$dailysummaryTable = TableRegistry::get('Dailysummary');
		$query=$dailysummaryTable->find('All')->andwhere(['customer_id'=>$this->loggedinuser['customer_id']])->toArray();
		
		$businesstime=[];
		$fuel=[];
		for ($x = 0; $x < count($query); $x++) {
			$businesstime[$x]=$query[$x]['businesstime'];
			$fuel[$x]=$query[$x]['fuel'];
		}

		 
			$this->response->body($businesstime."$".$fuel);
	    	return $this->response;

		
     }
	 public function operations()
    {
        
		
    }

    
}
