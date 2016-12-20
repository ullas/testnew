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
		  
		  $var = "'1 months'";
		  $query=$dailysummaryTable->find('All')->where(['EXTRACT(month from mdate) = EXTRACT(month from date(now()) - INTERVAL  '.$var.')'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']]);
		  $lastmonthdistancecount=$query->sumOf('distance');
		  
		  
		  $query=$ragtable->find('All')->where(['EXTRACT(day from idate) = EXTRACT(day from date(now()))'])->andwhere(['customer_id'=>$this->loggedinuser['customer_id']])->toArray();
		 (isset($query)) ? $ragcontent=$query : $ragcontent="";
		  // $this->log($ragcontent);
		  
		  $this->set(compact('totalcount','vehiclescount','peoplecount','assetcount','overspeedalertcount','totaloverspeedalertcount',
		  'harshbreakingalertcount','totalharshbreakingalertcount','fenceviolationalertcount','totalfenceviolationalertcount',
		  'eccessiveaccelalertcount','totaleccessiveaccelalertcount','distancecount','lastmonthdistancecount','ragcontent','fuelsum'
		  ,'nonprodhrssum','runtimesum','lastmonthfuelsum','lastmonthnonprodhrssum','lastmonthruntimesum','countrecs'));
    }
	
	 public function operations()
    {
        
		
    }

    
}
