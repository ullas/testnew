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
    public function traveldetailsreport()
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
		 $this->set(compact('reporttypes', 'gpsdata','times','groupsdatanames','colheads'));
		
         //$this->set('_serialize', ['configs','actions']);
		 //$this->set('_serialize', ['configs','usersettings','actions','additional']);
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

    /**
     * View method
     *
     * @param string|null $id Contractor id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   
}
