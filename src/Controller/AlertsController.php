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
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
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
				
		$usrfiter="";
        // msgdtime filter
        // if(isset($this->request->query['startdate']) && ($this->request->query['startdate'])!=null && isset($this->request->query['enddate']) && ($this->request->query['enddate'])!=null 
        															// && isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
//         	
			// $usrfiter.="alert_dtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   // ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		// }
		// //Asset filter	
        // if(isset($this->request->query['assetname'])){
//         	
        	// $pre=(strlen($usrfiter)>0)?" and ":"";
			// $usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			// $usrfiter.=$pre. " and alertcategories_id = 3 " ;
// 			
//         	
        // }
//     	
	
		$output =$this->Datatable->getView($fields,['Customers'],null);
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
		 
		$fields[0] = array("name" =>"id"  , "type" => "num");
		$fields[1] = array("name" =>"alert_dtime"  , "type" => "date");
		$fields[2] = array("name" =>"velocity"  , "type" => "num");
		$fields[3] = array("name" =>"location"  , "type" => "char");
				
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
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			$usrfiter.=$pre. " alertcategories_id = 1 " ;
			
        	
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
		 
		$fields[0] = array("name" =>"id"  , "type" => "num");
		$fields[1] = array("name" =>"alert_dtime"  , "type" => "date");
		$fields[2] = array("name" =>"location"  , "type" => "char");
				
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
			$usrfiter.=$pre. " trackingobject_id ='" .$this->request->query['assetname']. "'";
			$usrfiter.=$pre. " alertcategories_id = 5 " ;
			
        	
        }
    	
	
		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

        
}
