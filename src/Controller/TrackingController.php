<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class TrackingController extends AppController
{
   

   
  public $components = ['Datatable'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('tracking');
		
		
    }
	
	 public function operations()
    {
        
		
    }
	
	public function livepoll($stime,$filter)
	{
			
		 $flt=substr($filter,2);
		 
		// $this->autoRender = false;
		 $connection = ConnectionManager::get('default');
         $results = $connection->execute('SELECT EXTRACT(EPOCH FROM now())')->fetchAll('assoc');  
		 $servtime=$results[0]['date_part'];
		 $trobjTable = TableRegistry::get('gpsdata');
		 $cid=$this->loggedinuser['customer_id'];	 
		 if(strlen($flt)>0){
		 	
			$query = $trobjTable->find('all');
			$expr = $query->newExpr()->add("gpstime + interval '05:30'");
		    $query->select(['id','trackingobjects.name','longitude','latitude','location','gpspwer','gsmsignal','odometer','heading','gpstime'=>$expr,'status'])
		    ->where("gpsdata.customer_id=$cid and updatetime > $stime and trackingobjects.name ilike '%$flt%'")
			->contain(['Trackingobjects']);
		 	
		 
		 }else{
		 	 $query = $trobjTable->find('all');
			$expr = $query->newExpr()->add("gpstime + interval '05:30'");
		    $query->select(['id','trackingobjects.name','longitude','latitude','location','gpspwer','gsmsignal','odometer','heading','gpstime'=>$expr,'status'])
		    ->where("gpsdata.customer_id=$cid and updatetime > $stime")
			->contain(['Trackingobjects']);
		 }
			
		// $query->hydrate(false);	
		 $data=$query->all();
		 	
		$obj = (object) [
		    'stime' => $servtime,
		    'data' => $data
		];	
		
		 $d=json_encode($obj);
		 $this->autoRender = false; // Set Render False
	     $this->response->body($d);
	     return $this->response;
	}
	private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
	}
    public function ajaxData() 
	{
		$this->autoRender= false;
        
        $this->loadModel('Tracking');
        $dbout=$this->Tracking->find('all')->toArray();
     
        $fields = array();
		 
		$fields[0] = array("name" =>"Tracking.id"  , "type" => "num");
		$fields[1] = array("name" =>"Tracking.imei"  , "type" => "char");
		$fields[2] = array("name" =>"Tracking.msgdtime"  , "type" => "timestamp");
				
		$usrfiter="";
        // debug($this->request->query['startdate']);
        if(isset($this->request->query['startdate']) && isset($this->request->query['enddate']) && isset($this->request->query['starttime']) && isset($this->request->query['endtime'])){
        	
			$usrfiter.="msgdtime BETWEEN '" .$this->toPostDBDate($this->request->query['startdate']). " ".$this->request->query['starttime']
						   ."' AND '" .$this->toPostDBDate($this->request->query['enddate']). " " .$this->request->query['endtime']. "'";
		}
			
        	
    	

		$output =$this->Datatable->getView($fields,['Customers'],$usrfiter);
		$out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}
}
