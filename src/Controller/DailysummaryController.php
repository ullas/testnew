<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Dailysummary Controller
 *
 * @property \App\Model\Table\DailysummaryTable $Dailysummary
 */
class DailysummaryController extends AppController
{
	 public $components = ['Datatable'];
	 
	 private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	// $ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			$ret= $date= trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
		 }
		
	  return $ret;
	}
	 
  	 public function distanceTravelledAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Dailysummary.id"  , "type" => "num");
		$fields[1] = array("name" =>"Dailysummary.mdate"  , "type" => "date");
		$fields[2] = array("name" =>"Dailysummary.distance"  , "type" => "num");
		//$fields[3] = array("name" =>"location"  , "type" => "char");
		$fields[3] = array("name" =>"Dailysummary.idletime"  , "type" => "char");
		$fields[4] = array("name" =>"Dailysummary.businesstime"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="mdate BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
        	
        }
    	
	// $distancecount=$query->sumOf('distance') 
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	  	 public function activitySummaryAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Dailysummary.id"  , "type" => "num");
		$fields[1] = array("name" =>"Dailysummary.mdate"  , "type" => "date");
		$fields[2] = array("name" =>"Dailysummary.idletime"  , "type" => "num");
		//$fields[3] = array("name" =>"location"  , "type" => "char");
		$fields[3] = array("name" =>"Dailysummary.runningtime"  , "type" => "char");
		$fields[4] = array("name" =>"Dailysummary.stoppedtime"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="mdate BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
        	
        }
    	
	// $distancecount=$query->sumOf('distance') 
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	 public function mileageAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Dailysummary.id"  , "type" => "num");
		$fields[1] = array("name" =>"Dailysummary.mdate"  , "type" => "date");
		$fields[2] = array("name" =>"Dailysummary.idletime"  , "type" => "num");
		//$fields[3] = array("name" =>"location"  , "type" => "char");
		$fields[3] = array("name" =>"Dailysummary.distance / (Dailysummary.runningtime/3600)"  , "type" => "char");
		$fields[4] = array("name" =>"Dailysummary.distance"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="mdate BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
        	
        }
    	
	// $distancecount=$query->sumOf('distance') 
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	function secondsToTime($seconds) {

  // extract hours
  $hours = floor($seconds / (60 * 60));

  // extract minutes
  $divisor_for_minutes = $seconds % (60 * 60);
  $minutes = floor($divisor_for_minutes / 60);

  // extract the remaining seconds
  $divisor_for_seconds = $divisor_for_minutes % 60;
  $seconds = ceil($divisor_for_seconds);

  // return the final array
  $obj = array(
      "h" => (int) $hours,
      "m" => (int) $minutes,
      "s" => (int) $seconds,
   );

  return $obj;
}
	 public function runningTimeSummaryAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Dailysummary.id"  , "type" => "num");
		$fields[1] = array("name" =>"Dailysummary.mdate"  , "type" => "date");
		$fields[2] = array("name" =>"Trackingobjects.name"  , "type" => "num");
		$fields[3] = array("name" => "Dailysummary.runningtime * interval '1 sec'", "type" => "num");
		$fields[4] = array("name" =>"Dailysummary.distance"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="mdate BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	//$pre=(strlen($usrfiter)>0)?" and ":"";
			//$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
        	
        }
    	
	// $distancecount=$query->sumOf('distance') 
	
		//$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$output =$this->Datatable->getView($fields,['Trackingobjects','Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	
	 public function usageDetailsAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Dailysummary.id"  , "type" => "num");
		$fields[1] = array("name" =>"Dailysummary.mdate"  , "type" => "date");
		$fields[2] = array("name" =>"Dailysummary.distance"  , "type" => "num");
		//$fields[3] = array("name" =>"location"  , "type" => "char");
		$fields[3] = array("name" =>"Dailysummary.runningtime"  , "type" => "char");
		$fields[4] = array("name" =>"Dailysummary.businesstime"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="mdate BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
        	
        }
    	
	// $distancecount=$query->sumOf('distance') 
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
   
}
