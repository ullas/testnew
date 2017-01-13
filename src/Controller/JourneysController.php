<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;


/**
 * Journeys Controller
 *
 * @property \App\Model\Table\JourneysTable $Journeys
 */
class JourneysController extends AppController
{
	 public $components = ['Datatable'];

    private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
	}
	public function topSpeedAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Journeys.id"  , "type" => "num");
		$fields[1] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[2] = array("name" =>"Journeys.end_time"  , "type" => "num");
		$fields[3] = array("name" =>"Journeys.maxspeed"  , "type" => "char");
		$fields[4] = array("name" =>"Journeys.distance"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
				$usrfiter.=" AND end_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
			
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			// $splmt = $this->request->query['speedlimit'];
			// $usrfiter.=$pre. " maxspeed > ".$splmt;
			
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function idleTimeAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
		
		$journeyTable = TableRegistry::get('Journeys');
		$query=$journeyTable->find('All')->where(['customer_id'=>$this->loggedinuser['customer_id']]);
		$idletimesum=$query->sumOf('idletime') ;
		
     	$fields = array();
		 
		$fields[0] = array("name" =>"Journeys.id"  , "type" => "num");
		$fields[1] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[2] = array("name" =>"Journeys.start_loc"  , "type" => "char");
		$fields[3] = array("name" =>"Journeys.idletime" , "type" => "num");
		$fields[4] = array("name" =>"Journeys.distance"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
				 $usrfiter.=" AND idletime is not null";
						   
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function travelSummaryAjaxData()
	{
		
		$this->autoRender= false;
        
        $this->loadModel('Journeys');
        $dbout=$this->Journeys->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Journeys.id"  , "type" => "num");
		$fields[1] = array("name" =>"Journeys.start_time"  , "type" => "date");
		$fields[2] = array("name" =>"Journeys.distance"  , "type" => "char");
		$fields[3] = array("name" =>"Journeys.maxspeed"  , "type" => "num");
		$fields[4] = array("name" =>"Journeys.averagespeed"  , "type" => "num");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime']))
        	{
        	
			$usrfiter.="start_time BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
						   
			}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

}
