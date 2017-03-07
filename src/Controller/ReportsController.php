<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Contractors Controller
 *
 * @property \App\Model\Table\ContractorsTable $Contractors
 */
class ReportsController extends AppController
{
	/**
     * Components
     *
     * @var array
     */
    public $components = ['Datatablemaster'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function adhocreport()
    {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
         // $this->log(json_encode($searchresults));
		 
		//$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','10'=>'Journey Summary','11'=>'Activity Summary Report','12'=>'Route Violation Report','13'=>'Zone Visit','14'=>'Milage Report','15'=>'Usage Details','16'=>'Debug','17'=>'Driver Error','18'=>'Zone Visit Count Report','19'=>'Trip Start Report','20'=>'Trip End Report','21'=>'Loading and Unloading Details','22'=>'Non Operative Vehicles','23'=>'Non Productive Vehicles','24'=>'Running Time Summary','25'=>'Over Speed Summary','26'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	$key=$value['id'];
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
	 $columnnos =6;
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects','columnnos'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }


	public function checkAjax(){
    	// $this->autoRender = false;
    	//echo 'Test string';
		
	  	 $this->loadModel('Journeys');
		 // echo $this->request->query['assetname'];
         // $assetmonthlydata=$this->Journeys->getMonthlySummary(1,$this->request->query['assetname']);
         $assetmonthlydata=$this->Journeys->getMonthlySummary($this->loggedinuser['customer_id'],$this->request->query['assetname'],$this->request->query['monthname']);
        
        $this->set('assetmonthlydata',$assetmonthlydata);
		$this->set('_serialize', ['assetmonthlydata']);
        echo json_encode($assetmonthlydata);
         // $assetmonthlydata=$this->Journeys->find('all');
		  $out= json_encode($assetmonthlydata) ;
		 // echo json_encode(compact('assetmonthlydata'));
	     //return $this->set(compact('assetmonthlydata'));
		 
		 // print_r( $assetmonthlydata );
		 // $this->set('trips', $assetmonthlydata);
		// $this->set('lastid',-1);
			
          // $this->set('_serialize', ['trips']);
		 // print_r( $trips );
		 
		 $this->response->body($out);
		return $this->response;
	}

	public function checkAjax2(){
    	// $this->autoRender = false;
    	//echo 'Test string';
		// echo "sdfs";
	  	 $this->loadModel('Trackingobjects');
		 // echo $this->request->query['assetname'];
         // $assetmonthlydata=$this->Journeys->getMonthlySummary(1,$this->request->query['assetname']);
         $assetmonthlydata=$this->Trackingobjects->getTrackingobjects($this->loggedinuser['customer_id'],$this->request->query['groupname']);
        
        $this->set('assetmonthlydata',$assetmonthlydata);
		$this->set('_serialize', ['assetmonthlydata']);
        echo json_encode($assetmonthlydata);
         // $assetmonthlydata=$this->Journeys->find('all');
		  $out= json_encode($assetmonthlydata) ;
		 // echo json_encode(compact('assetmonthlydata'));
	     //return $this->set(compact('assetmonthlydata'));
		 
		 // print_r( $assetmonthlydata );
		 // $this->set('trips', $assetmonthlydata);
		// $this->set('lastid',-1);
			
          // $this->set('_serialize', ['trips']);
		 // print_r( $trips );
		 
		 $this->response->body($out);
		return $this->response;
	}
	
	public function checkAjax3(){
    	// $this->autoRender = false;
    	//echo 'Test string';
		
	  	 $this->loadModel('Journeys');
		 // echo $this->request->query['assetname'];
         // $assetmonthlydata=$this->Journeys->getMonthlySummary(1,$this->request->query['assetname']);
         $assetmonthlydata=$this->Journeys->getWeeklySummary($this->loggedinuser['customer_id'],$this->request->query['assetname']);
        
        $this->set('assetmonthlydata',$assetmonthlydata);
		$this->set('_serialize', ['assetmonthlydata']);
        echo json_encode($assetmonthlydata);
         // $assetmonthlydata=$this->Journeys->find('all');
		  $out= json_encode($assetmonthlydata) ;
		 // echo json_encode(compact('assetmonthlydata'));
	     //return $this->set(compact('assetmonthlydata'));
		 
		 // print_r( $assetmonthlydata );
		 // $this->set('trips', $assetmonthlydata);
		// $this->set('lastid',-1);
			
          // $this->set('_serialize', ['trips']);
		 // print_r( $trips );
		 
		 $this->response->body($out);
		return $this->response;
	}

	public function checkAjax4()
	{
    		
    	$this->loadModel('Journeys');
		$assetdailydata=$this->Journeys->getAssetsDailySummary($this->loggedinuser['customer_id'],$this->request->query['assetname'],$this->request->query['date']);
        $this->set('assetdailydata',$assetdailydata);
		$this->set('_serialize', ['assetdailydata']);
        $out= json_encode($assetdailydata) ;
		$this->response->body($out);
		return $this->response;
	}
	
	public function groupdailyreport()
    {
        $start=strtotime('00:00');
		$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60)
				 {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				 }
				
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->set(compact('groupsdatanames'));
		
      }
	
	public function groupweeklyreport()
    {
        $start=strtotime('00:00');
		$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60)
				 {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				 }
				
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->set(compact('groupsdatanames'));
		
      }
	
	

	public function groupmonthlyreport()
    {
       
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->set(compact('groupsdatanames'));
		
      }
	public function assetmonthlyreport()
    {
       
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->loadModel('Tracking');	
			$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
       
	 
			$this->set(compact('groupsdatanames','trackingobjects'));
		
      }
	
	public function assetweeklyreport()
 	{
       
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->loadModel('Tracking');	
			$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
       
	 
			$this->set(compact('groupsdatanames','trackingobjects'));
		
      }
	
	public function assetdailyreport()
 	{
       
		$this->loadModel('Groups');
        $groupsdata=$this->Groups->find('all')->toArray();
         	
		 	foreach($groupsdata as $key => $value)
		 		{
		 			$key=$value['id'];
		 				
		 			$groupsdatanames[$key]=$value['name'];
		 		}
			$this->loadModel('Tracking');	
			$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
       
	 
			$this->set(compact('groupsdatanames','trackingobjects'));
		
      }


	
	public function ajaxdata() 
	{
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		

        $this->loadModel('Contractors');
        $dbout=$this->Contractors->find('all')->toArray();
     
         $fields = array();
		 
				$fields[0] = array("name" =>"Contractors.id"  , "type" => "num");
				$fields[1] = array("name" =>"Contractors.name"  , "type" => "char");
				$fields[2] = array("name" =>"Contractors.description"  , "type" => "char");
				
		
		$this->log($fields);
		$output =$this->Datatablemaster->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    public function fencingreport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }
	public function topspeedreport()
	     {
	         $this->loadModel('Tracking');
	         $gpsdata=$this->Tracking->find('all')->toArray();
			  
			//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
			//$this->set('searchresults',$searchresults);
			
				
	         $this->set('_serialize', ['searchresults']);
	          // $this->log(json_encode($searchresults));
			 
			$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
			$start=strtotime('00:00');
					$end=strtotime('24:00');
					for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
	    				$timeintrvl=date('H:i',$halfhour);
	    				$times[$timeintrvl]=$timeintrvl;
					}
					
			$this->loadModel('Groups');
	         $groupsdata=$this->Groups->find('all')->toArray();
			 foreach($groupsdata as $key => $value)
			 {
			 	
				$groupsdatanames[$key]=$value['name'];
			 }
			
			$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
	        
			$fields = array();
					$fields[0] = array("title" =>"Date"  , "type" => "date");
					$fields[1] = array("title" =>"Time"  , "type" => "time");
					$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
					$fields[3] = array("title" =>"Temperature"  , "type" => "char");
					$fields[4] = array("title" =>"Humidity"  , "type" => "char");
					$fields[5] = array("title" =>"Location"  , "type" => "char");
					$fields[6] = array("title" =>"Status"  , "type" => "char");
			$colheads =$fields;
			 $this->set('gpsdata',$gpsdata);	
			 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
			
	         //$this->set('_serialize', ['configs','actions']);
			 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
	    }

		public function overSpeedreport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }
	public function distanceTravelledreport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }

	public function stoppagereport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }
public function idleTimereport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }


	public function travelSummaryReport()
     {
         $this->loadModel('Tracking');
         $gpsdata=$this->Tracking->find('all')->toArray();
		  
		//$searchresults = $this->Tracking->getTravelDetailsRpt( $this->loggedinuser['id']);
		//$this->set('searchresults',$searchresults);
		
			
         $this->set('_serialize', ['searchresults']);
          // $this->log(json_encode($searchresults));
		 
		$reporttypes = array('0'=>'Travel Details Report','1'=>'Fencing Report','2'=>'Top Speed Report','3'=>'Over Speed Report','4'=>'Distance Travelled Report','5'=>'Stoppage Report','6'=>'Idle Time Report','7'=>'Travel Summary','8'=>'Alerts Summary','9'=>'Driving Behaviour','11'=>'Journey Summary','12'=>'Activity Summary Report','13'=>'Route Violation Report','55'=>'Zone Visit','56'=>'Milage Report','57'=>'Usage Details','60'=>'Debug','65'=>'Driver Error','68'=>'Zone Visit Count Report','71'=>'Trip Start Report','72'=>'Trip End Report','73'=>'Loading and Unloading Details','74'=>'Non Operative Vehicles','75'=>'Non Productive Vehicles','76'=>'Running Time Summary','77'=>'Over Speed Summary','88'=>'Zone Activity');
		$start=strtotime('00:00');
				$end=strtotime('24:00');
				for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+5*60) {
    				$timeintrvl=date('H:i',$halfhour);
    				$times[$timeintrvl]=$timeintrvl;
				}
				
		$this->loadModel('Groups');
         $groupsdata=$this->Groups->find('all')->toArray();
		 foreach($groupsdata as $key => $value)
		 {
		 	
			$groupsdatanames[$key]=$value['name'];
		 }
		
		$trackingobjects = $this->Tracking->TrackingObjects->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		$fields = array();
				$fields[0] = array("title" =>"Date"  , "type" => "date");
				$fields[1] = array("title" =>"Time"  , "type" => "time");
				$fields[2] = array("title" =>"Speed(Km/hr)"  , "type" => "char");
				$fields[3] = array("title" =>"Temperature"  , "type" => "char");
				$fields[4] = array("title" =>"Humidity"  , "type" => "char");
				$fields[5] = array("title" =>"Location"  , "type" => "char");
				$fields[6] = array("title" =>"Status"  , "type" => "char");
		$colheads =$fields;
		 $this->set('gpsdata',$gpsdata);	
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads','trackingobjects'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
    }

	
	
}
