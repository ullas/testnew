<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * Alerts Controller
 *
 * @property \App\Model\Table\AlertsTable $Alerts
 */
class AlertsController extends AppController
{
	 public $components = ['Datatable'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	 $alertcategories = $this->Alerts->Alertcategories->find('list', ['limit' => 200]);
		 $groupsTable = TableRegistry::get('groups');
		 $cid=$this->loggedinuser['customer_id'];
		 $groups = $groupsTable->find('list');
		 $groups->where("id in (select group_id from trackingobjects_groups where customer_id=$cid)");
		 $this->set(compact( 'groups', 'alertcategories'));
        
    }
	private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	//$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
		 	$ret= $date= trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
	}
	public function fencingAjaxData()
	{
		$this->autoRender= false;
        
        // $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Alerts.id"  , "type" => "num");
		$fields[1] = array("name" =>"alert_dtime"  , "type" => "timestamp");
		$fields[2] = array("name" =>"velocity"  , "type" => "num");
		$fields[3] = array("name" =>"location"  , "type" => "char");
		$fields[4] = array("name" =>"Alerts.alert_message"  , "type" => "char");
				
		$usrfiter="";
        //msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " alertcategories_id = 3 and trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	//
    	$pre=(strlen($usrfiter)>0)?" and ":"";
		$usrfiter.=$pre. " customer_id ='" .$this->loggedinuser['customer_id']. "'";
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
	public function overSpeedAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Alerts.id"  , "type" => "num");
		$fields[1] = array("name" =>"Alerts.alert_dtime"  , "type" => "date");
		$fields[2] = array("name" =>"Alerts.velocity"  , "type" => "num");
		$fields[3] = array("name" =>"Alerts.location"  , "type" => "char");
		$fields[4] = array("name" =>"Alerts.alert_message"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " alertcategories_id = 1 and trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

	public function stoppageAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Alerts.id"  , "type" => "num");
		$fields[1] = array("name" =>"Alerts.alert_dtime"  , "type" => "date");
		$fields[2] = array("name" =>"Alerts.location"  , "type" => "char");
		$fields[3] = array("name" =>"Alerts.velocity"  , "type" => "num");
		$fields[4] = array("name" =>"Alerts.alert_message"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
			$usrfiter.=$pre. " alertcategories_id = 5 and trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    public function alertSummaryAjaxData()
	{
		$this->autoRender= false;
        
        // $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Alertcategories.name"  , "type" => "char");
		$fields[1] = array("name" =>"alertcategories_id"  , "type" => "count");
		$fields[2] = array("name" =>"location"  , "type" => "char");
				
		$usrfiter="";
        //msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
		//	$usrfiter.=$pre. "  trackingobject_id ='" .$this->request->query['assetname']. "'";
			$usrfiter.=$pre. "  trackingobject_id ='" .$this->request->query['assetname']. "' and Alerts.customer_id ='" .$this->loggedinuser['customer_id']. "'group by alertcategories.name, alerts.location";
			
			
        	
        }
    	
    	//$pre=(strlen($usrfiter)>0)?" and ":"";
	//	$usrfiter.=$pre. " Alerts.customer_id ='" .$this->loggedinuser['customer_id']. "' group by alertcategories.name, alerts.location";
	
		$output =$this->Datatable->getView($fields,['Alertcategories','Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}  
																	
		public function routeViolationsAjaxData()
	{
		$this->autoRender= false;
        
        $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		 
		$fields[0] = array("name" =>"Alerts.id"  , "type" => "num");
		$fields[1] = array("name" =>"Alerts.alert_dtime"  , "type" => "date");
		$fields[2] = array("name" =>"Alerts.location"  , "type" => "char");
		$fields[3] = array("name" =>"Alerts.velocity"  , "type" => "num");
		$fields[4] = array("name" =>"Alerts.alert_message"  , "type" => "char");
				
		$usrfiter="";
        // msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":""; 
			$usrfiter.=$pre. " alertcategories_id = 12 and trackingobject_id ='" .$this->request->query['assetname']. "'";
			
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}	

	 public function overSpeedSummaryAjaxData()
	{
		$this->autoRender= false;
        
        // $this->loadModel('Alerts');
        $dbout=$this->Alerts->find('all')->toArray();
     	$fields = array();
		
		$fields[0] = array("name" =>"Alerts.id"  , "type" => "num"); 
		$fields[1] = array("name" =>"Trackingobjects.name"  , "type" => "char");
		$fields[2] = array("name" =>"Alerts.alert_dtime"  , "type" => "date");
		$fields[3] = array("name" =>"Alerts.velocity"  , "type" => "char");
		$fields[4] = array("name" =>"Alerts.location"  , "type" => "char");
				
		$usrfiter="";
        //msgdtime filter
        if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															&& isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
		//Asset filter	
        if(isset($this->request->query['assetname'])){
        	
        	$pre=(strlen($usrfiter)>0)?" and ":"";
		//	$usrfiter.=$pre. "  trackingobject_id ='" .$this->request->query['assetname']. "'";
			//$usrfiter.=$pre. "  trackingobject_id ='" .$this->request->query['assetname']. "' and Alerts.customer_id ='" .$this->loggedinuser['customer_id']. "'group by alertcategories.name, alerts.location";
			
			
        	
        }
    	
    	//$pre=(strlen($usrfiter)>0)?" and ":"";
	//	$usrfiter.=$pre. " Alerts.customer_id ='" .$this->loggedinuser['customer_id']. "' group by alertcategories.name, alerts.location";
	
		$output =$this->Datatable->getView($fields,['Trackingobjects','Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}  
																  
}
