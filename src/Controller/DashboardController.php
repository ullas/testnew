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
		  (isset($query)) ? $totalcount=$query->count() : $totalcount="";
		 
		  $query=$vehicleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $vehiclescount=$query->count() : $vehiclescount="";
		  
		  $query=$peopleTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $peoplecount=$query->count() : $peoplecount="";
		  
		  $query=$assetTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $assetcount=$query->count() : $assetcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '1'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $overspeedalertcount=$query->count() : $overspeedalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totaloverspeedalertcount=$query->count() : $totaloverspeedalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '2'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $harshbreakingalertcount=$query->count() : $harshbreakingalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '2'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totalharshbreakingalertcount=$query->count() : $totalharshbreakingalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '3'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $fenceviolationalertcount=$query->count() : $fenceviolationalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '3'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totalfenceviolationalertcount=$query->count() : $totalfenceviolationalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '4'])->andwhere(['EXTRACT(month from alert_dtime) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $eccessiveaccelalertcount=$query->count() : $eccessiveaccelalertcount="";
		  
		  $query=$alertTable->find('All')->where (['alertcategories_id' => '4'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totaleccessiveaccelalertcount=$query->count() : $totaleccessiveaccelalertcount="";
		  
		  $query=$alertTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totalalertcount=$query->count() : $totalalertcount="";
		  
		  $query=$alertTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']])->andwhere(['ack = false']);
		  (isset($query)) ? $totalnonackalertcount=$query->count() : $totalnonackalertcount="";
		  
		  $query =$alertTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']])->andwhere(['ack = false'])->toArray();
		  (isset($query)) ? $alertcontent=$query : $alertcontent="";
		  
		  $query=$dailysummaryTable->find('All')->where(['EXTRACT(month from mdate) = EXTRACT(month from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $distancecount=$query->sumOf('distance') : $distancecount="";
		  (isset($query)) ? $fuelsum=$query->sumOf('fuel') : $fuelsum="";
		  (isset($query)) ? $runtimesum=$query->sumOf('runningtime')/3600 : $runtimesum="";
		  (isset($query)) ? $countrecs = $query->count() : $countrecs="";
		  (isset($query)) ? $nonprodhrssum = ($countrecs*86400 - $query->sumOf('businesstime')) / 3600: $nonprodhrssum="";
		  
		  $var = "'1 months'";
		  $query=$dailysummaryTable->find('All')->where(['EXTRACT(month from mdate) = EXTRACT(month from date(now()) - INTERVAL  '.$var.')'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $lastmonthdistancecount=$query->sumOf('distance') : $lastmonthdistancecount="";
		  (isset($query)) ? $lastmonthfuelsum=$query->sumOf('fuel') : $lastmonthfuelsum="";
		  (isset($query)) ? $lastmonthcountrecs = $query->count() : $lastmonthcountrecs="";
		  $lastmonthcountrecs = $query->count();
		  (isset($query)) ? $lastmonthnonprodhrssum = ($lastmonthcountrecs*86400 - $query->sumOf('businesstime')) / 3600 : $lastmonthnonprodhrssum="";
		  (isset($query)) ? $lastmonthruntimesum=$query->sumOf('runningtime') / 3600 : $lastmonthruntimesum="";
		   
		  if(($distancecount-$lastmonthdistancecount)>0)
		  	{
		  	 $colorclassdistance = "description-percentage text-green";	
		  	}
		   if(($distancecount-$lastmonthdistancecount)<=0)
		  	{
		  	 $colorclassdistance = "description-percentage text-red";	
		  	}
			
		  if(($fuelsum-$lastmonthfuelsum)>0)
		  	{
		  	 $colorclassfuel = "description-percentage text-green";	
		  	}
			if(($fuelsum-$lastmonthfuelsum)<=0)
		  	{
		  	 $colorclassfuel = "description-percentage text-red";	
		  	}
			
		  if(($nonprodhrssum-$lastmonthnonprodhrssum)>0)
		  	{
		  	 $colorclassnonprodhrs = "description-percentage text-green";	
		  	}
			if(($nonprodhrssum-$lastmonthnonprodhrssum)<=0)
		  	{
		  	 $colorclassnonprodhrs = "description-percentage text-red";	
		  	}
			
		  if(($runtimesum-$lastmonthruntimesum)>0)
		  	{
		  	 $colorclassruntime = "description-percentage text-green";	
		  	}
			if(($runtimesum-$lastmonthruntimesum)<=0)
		  	{
		  	 $colorclassruntime = "description-percentage text-red";	
		  	}
		  
		  $query=$ragtable->find('All')->where(['EXTRACT(day from idate)  = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']])->toArray();
		  (isset($query)) ? $ragcontent=$query : $ragcontent="";
		  // $this->log($ragcontent);
		  $query=$triptable->find('All')->where(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->orwhere(['EXTRACT(day from end_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $tripscount=$query->count() : $tripscount="";
		  $query2=$triptable->find('All')->where(['CURRENT_TIME BETWEEN start_time AND end_time'])->andwhere(['tripstatus_id = 1'])->andwhere(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->orwhere(['EXTRACT(day from end_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query2)) ? $currenttripscount=$query2->count() : $currenttripscount="";
		  
		  if($tripscount > 0)
		   {
		  		 $res = ($currenttripscount / $tripscount) * 100;
		  	if (isset ($query, $query2) )
		  		{
				  	$widthtrip = ($currenttripscount / $tripscount) * 100;
				}
			else
				{
					$widthtrip="";
				}	
		   }
		  else
		  	{
		  		
				$widthtrip = 0;
		  	
		  	}
		 
		  
		  
		  $query=$jobtable->find('All')->where(['jobdate=date(now())'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $jobcount=$query->count() : $jobcount="";
		  $query2=$jobtable->find('All')->where(['status = 0'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query2)) ? $pendingjobcount=$query2->count() : $pendingjobcount="";
		  $query3=$jobtable->find('All')->where(['jobdate=date(now())'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query3)) ? $totaljobcount=$query3->count() : $totaljobcount="";
		  if($totaljobcount > 0)
			  {
			  	$widthjob = ($pendingjobcount / $totaljobcount) * 100;
			  }
		  else 
		  	  {
		  		$widthjob = 0;
		  	  }
		  
		  
		  
		  
		  $query=$remindertable->find('All')->where(['date=date(now())'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $remindercount=$query->count() : $remindercount="";
		  $query2=$remindertable->find('All')->where(['date=date(now())'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query2)) ? $totalremindercount=$query2->count() : $totalremindercount="";
		  
		  if($totalremindercount > 0)
		  	{
		  		$widthreminder = ($remindercount / $totalremindercount) * 100;
		  	}
		  else
		  	{
		  		$widthreminder = 0;
		  	}
		  
		  
		  $query=$remindertable->find('All')->where(['servicetask_id = 2'])->andwhere(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $totalpendingmaintenancecount=$query->count() : $totalpendingmaintenancecount="";
		  $totalpendingmaintenancecount=$query->count();
		  
		  $query=$remindertable->find('All')->where(['servicetask_id = 2'])->andwhere(['EXTRACT(day from date) = EXTRACT(day from date(now()))'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  (isset($query)) ? $pendingmaintenancecount=$query->count() : $pendingmaintenancecount="";
		 
		  if($totalpendingmaintenancecount > 0)
		  	{
		  		$widthpendingmaintenance = ($pendingmaintenancecount / $totalpendingmaintenancecount) * 100;
		  	}
		  else
		  	{
		  		$widthpendingmaintenance = 0;
		  	}
		  
		  
		  $cls1 = (($distancecount-$lastmonthdistancecount) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  $cls2 = (($fuelsum-$lastmonthfuelsum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  $cls3 = (($nonprodhrssum-$lastmonthnonprodhrssum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";		
		  $cls4 = (($runtimesum-$lastmonthruntimesum) > 0) ? "fa fa-caret-up" : "fa fa-caret-down";
		  
		  $this->set(compact('totalcount','vehiclescount','peoplecount','assetcount','overspeedalertcount','totaloverspeedalertcount',
		  'harshbreakingalertcount','totalharshbreakingalertcount','fenceviolationalertcount','totalfenceviolationalertcount',
		  'eccessiveaccelalertcount','totaleccessiveaccelalertcount','distancecount','lastmonthdistancecount','ragcontent','fuelsum'
		  ,'nonprodhrssum','runtimesum','lastmonthfuelsum','lastmonthnonprodhrssum','lastmonthruntimesum','countrecs','tripscount',
		  'currenttripscount','jobcount','pendingjobcount','remindercount','totalremindercount','cls1','cls2','cls3','cls4',
		  'widthtrip','widthjob','totalpendingmaintenancecount','pendingmaintenancecount','widthreminder','widthpendingmaintenance',
		  'totalalertcount','totalnonackalertcount','alertcontent','colorclassdistance','colorclassfuel','colorclassnonprodhrs',
		  'colorclassruntime'));
    }
	
	 public function operations()
    	{
	          $alertTable = TableRegistry::get('Alerts');
			  $triptable = TableRegistry::get('Trips');
			  $vehicletable = TableRegistry::get('Vehicles');
			  $jobtable = TableRegistry::get('Jobs');
			  $workordertable = TableRegistry::get('Workorders');
			  $gpsdatatable = TableRegistry::get('Gpsdata');
			  $driversdatatable = TableRegistry::get('Drivers');
			  $locationstripsdatatable = TableRegistry::get('Locations_trips');
			  
			   $results = $triptable->getActiveTrips($this->loggedinuser['customer_id']);
		  	   //print_r($results);
			  
			  $query=$alertTable->find('All')->where (['alertcategories_id' => '1'])->andwhere(['EXTRACT(day from alert_dtime) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $overspeedalertcount=$query->count(): $overspeedalertcount="";
			 
			  $query=$alertTable->find('All')->where(['EXTRACT(day from alert_dtime) = EXTRACT(day from (now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']])->toArray();
			  (isset($query)) ? $alertscontent=$query : $alertscontent="";
			  
			  
			  
			  
			  $query=$vehicletable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $vehiclescount=$query->count(): $vehiclescount="";
			  $query2=$triptable->find('All')->where(['CURRENT_TIME BETWEEN start_time AND end_time'])->andwhere(['tripstatus_id = 1'])->andwhere(['EXTRACT(day from start_date) = EXTRACT(day from date(now()))'])->orwhere(['EXTRACT(day from end_date) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query2)) ? $currenttripscount=$query2->count(): $currenttripscount="";
			  $percentagerunning = abs(($currenttripscount / $vehiclescount)*100);
			  
			  $var = "'running'";
			  $query=$gpsdatatable->find('All')->where(['EXTRACT(day from msgdtime)  = EXTRACT(day from now())'])->andwhere(['status = '. $var .'' ])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			 
			  (isset($query)) ? $runningvehiclescount=$query->count(): $runningvehiclescount="";
			  $query2=$gpsdatatable->find('All')->where(['EXTRACT(day from msgdtime)  = EXTRACT(day from now())'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  $vehiclescount=$query2->count();
			  (isset($query2)) ? $vehiclescount=$query2->count(): $vehiclescount="";
			 
			   if($vehiclescount > 0)
		  		{
		  			 $percentagerunning = ($runningvehiclescount / $vehiclescount)*100;
		  		}
			   else
			   	{
			   		 $percentagerunning = 0;
					
			   	}
			  
			  
			  $query = $gpsdatatable->find('All')->where(['EXTRACT(day from msgdtime)  = EXTRACT(day from now())'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['ibuttoncode']);
			  (isset($query)) ? $runningdriverscount=$query->count(): $runningdriverscount="";
			  
			  $query = $gpsdatatable->find('All')->where(['EXTRACT(day from msgdtime)  != EXTRACT(day from now())'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]) ->distinct(['imei']);
			  (isset($query)) ? $comfailurecount=$query->count(): $comfailurecount="";
			  
			  
			  //status = 1 for completed & status = 0 for notstarted
			  $query=$jobtable->find('All')->where(['EXTRACT(day from jobdate) = EXTRACT(day from date(now()))'])->andwhere(['status = 1'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $completedjobcount=$query->count() : $completedjobcount="";
			  $query=$jobtable->find('All')->where(['EXTRACT(day from jobdate) = EXTRACT(day from date(now()))'])->andwhere(['status = 0'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $notstartedjobcount=$query->count() : $notstartedjobcount="";
			  $notstartedjobcount=$query->count();
			  
			  $query3=$jobtable->find('All')->where(['EXTRACT(day from jobdate) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $totaljobcount=$query3->count() : $notstartedjobcount="";
			  $totaljobcount=$query3->count();
			   if($totaljobcount > 0)
		  		{
		  			$percentagecompletedjob = ($completedjobcount / $totaljobcount) * 100;
			  		$percentagenotstartedjob = ($notstartedjobcount / $totaljobcount) * 100;
		  		}
			   else
			   	{
			   		 $percentagecompletedjob = 0;
			  		 $percentagenotstartedjob = 0;
					
			   	}
			  
			 
			  
			  $query=$workordertable->find('All')->where(['CURRENT_DATE BETWEEN startdate AND completiondate'])->andwhere(['workorderstatus_id'=>1])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $openworkordercount=$query->count() : $openworkordercount="";
	
			  $query=$workordertable->find('All')->where(['CURRENT_DATE BETWEEN startdate AND completiondate'])->andwhere(['workorderstatus_id'=>2])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $overdueworkordercount=$query->count() : $overdueworkordercount="";
			  
			  $query=$workordertable->find('All')->where(['CURRENT_DATE BETWEEN startdate AND completiondate'])->andwhere(['workorderstatus_id'=>3])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $deferredworkordercount=$query->count() : $deferredworkordercount="";
			  
			  $query=$workordertable->find('All')->where(['CURRENT_DATE BETWEEN startdate AND completiondate'])->andwhere(['workorderstatus_id'=>4])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $closedworkordercount=$query->count() : $closedworkordercount="";
			  
			  $query=$workordertable->find('All')->where(['CURRENT_DATE BETWEEN startdate AND completiondate'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
			  (isset($query)) ? $totalworkordercount=$query->count() : $totalworkordercount="";
			   
			  $percentageopenworkorder = ($openworkordercount / $totalworkordercount) * 100;
			  $percentageoverdueworkorder = ($overdueworkordercount / $totalworkordercount) * 100;
			  $percentagedeferredworkorder = ($deferredworkordercount / $totalworkordercount) * 100;
			  $percentageclosedworkorder = ($closedworkordercount / $totalworkordercount) * 100;
			  
			  
			  
			              
			 
			 
			   
			  $this->set(compact('overspeedalertcount','percentagerunning','currenttripscount',
			  					'completedjobcount','notstartedjobcount','percentagecompletedjob',
								'percentagenotstartedjob','percentageopenworkorder','percentageoverdueworkorder',
								'percentagedeferredworkorder','percentageclosedworkorder','openworkordercount',
								'completedjobcount','notstartedjobcount','deferredworkordercount','closedworkordercount',
								'overdueworkordercount','runningdriverscount','comfailurecount','alertscontent','results'));
		
		}

}
