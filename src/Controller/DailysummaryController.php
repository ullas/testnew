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
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
	}
	 
  	 public function distanceTravelledAjaxData()
		{
		$this->autoRender= false;
        
       // $this->loadModel('Alerts');
       // $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"id"  , "type" => "num");
		$fields[1] = array("name" =>"mdate"  , "type" => "date");
		$fields[2] = array("name" =>"distance"  , "type" => "num");
		//$fields[3] = array("name" =>"location"  , "type" => "char");
				
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
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
   
}
