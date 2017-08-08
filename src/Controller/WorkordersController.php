<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Workorders Controller
 *
 * @property \App\Model\Table\WorkordersTable $Workorders
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class WorkordersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Datatable'];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                ['name'=>'assign','title'=>'Assign','class'=>'label-success'],
                ['name'=>'unassign','title'=>'Unassign','class'=>'label-warning'],
                ['name'=>'close','title'=>'Close','class'=>' label-danger '],
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Open','OverDue','Resolved','Closed'],
      	                          'additional'=>[
      	                                ['name'=>'issueddate','title'=>'Issued Date'],
      	                                ['name'=>'startdate','title' =>'Start Date'],
      	                                ['name'=>'completiondate','title'=>'Completion Date']   	                          
      	                          ]];
		 $this->set('additional',$additional);
		 $this->set('actions',$actions);	
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','usersettings','actions','additional']);
       
       
    }
	public function createajaxData()
	{
    	
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$workorder = $this->Workorders->newEntity();
			$this->request->data['issuedate']=$this->request->query['issuedate'];
            $this->request->data['workorderstatus_id']=$this->request->query['workorderstatus'];
			$this->request->data['vehicle_id']=$this->request->query['vehicleid'];
			$this->request->data['startdate']=$this->request->query['startdate'];
			$this->request->data['lables']=$this->request->query['lables'];
			$this->request->data['odometer']=$this->request->query['odometer'];
			$this->request->data['void']=$this->request->query['voidvalue'];
			$this->request->data['vendor_id']=$this->request->query['vendorid'];
			$this->request->data['completiondate']=$this->request->query['completiondate'];
			$this->request->data['issuedby_id']=$this->request->query['issuedbyid'];
			$this->request->data['assignedby_id']=$this->request->query['assignedbyid'];
			$this->request->data['assignto_id']=$this->request->query['assigntoid'];
			$this->request->data['invoicenumber']=$this->request->query['invoicenumber'];
			$this->request->data['phonenumber']=$this->request->query['phonenumber'];
			$this->request->data['description']=$this->request->query['description'];
			$this->request->data['labour']=$this->request->query['labor'];
			$this->request->data['parts']=$this->request->query['parts'];
			$this->request->data['dicount']=$this->request->query['discount'];
			$this->request->data['tax']=$this->request->query['tax'];
			
			
			
			
            $workorder=$this->Workorders->patchEntity($workorder,$this->request->data);
			$workorder['customer_id']=$this->loggedinuser['customer_id'];
			if ($this->Workorders->save($workorder)) {
				
                $this->response->body(json_encode($workorder['id']));			
	    		return $this->response;
	    		
            } else {
            	
                $this->response->body("error");
	    		return $this->response;
            }
			
		}  
    }

	public function editajaxData()
	{
    	$this->autoRender=false;
		if($this->request->is('ajax')) {
				
			$this->autoRender=false;
			
			$workorder = $this->Workorders->newEntity();
			$workorder = $this->Workorders->get($this->request->query['currentworkorderid'], [
            'contain' => []
        	]);
			
			$this->request->data['issuedate']=$this->request->query['issuedate'];
            $this->request->data['workorderstatus_id']=$this->request->query['workorderstatus'];
			$this->request->data['vehicle_id']=$this->request->query['vehicleid'];
			$this->request->data['startdate']=$this->request->query['startdate'];
			$this->request->data['lables']=$this->request->query['lables'];
			$this->request->data['odometer']=$this->request->query['odometer'];
			$this->request->data['void']=$this->request->query['voidvalue'];
			$this->request->data['vendor_id']=$this->request->query['vendorid'];
			$this->request->data['completiondate']=$this->request->query['completiondate'];
			$this->request->data['issuedby_id']=$this->request->query['issuedbyid'];
			$this->request->data['assignedby_id']=$this->request->query['assignedbyid'];
			$this->request->data['assignto_id']=$this->request->query['assigntoid'];
			$this->request->data['invoicenumber']=$this->request->query['invoicenumber'];
			$this->request->data['phonenumber']=$this->request->query['phonenumber'];
			$this->request->data['description']=$this->request->query['description'];
			$this->request->data['labour']=$this->request->query['labor'];
			$this->request->data['parts']=$this->request->query['parts'];
			$this->request->data['dicount']=$this->request->query['discount'];
			$this->request->data['tax']=$this->request->query['tax'];
			
			
			
			
            $workorder=$this->Workorders->patchEntity($workorder,$this->request->data);
			$workorder['customer_id']=$this->loggedinuser['customer_id'];
			if ($this->Workorders->save($workorder)) {

                $this->response->body(json_encode($workorder['id']));			
	    		return $this->response;
	    		
            } else {
                $this->response->body("error");
	    		return $this->response;
            }
		}  
    }
	
	public function addLaborParts()
	{
    	
      	
		if($this->request->is('ajax')) {
			
			
			$this->autoRender=false;
			$this->loadModel('Workorderlineitems');
			$this->loadModel('Workorderlabourlineitems');
			$this->loadModel('Workorderpartslineitems');
			
				$it="";
    			$it=explode(",",($this->request->query['content']));
	    		$stst = json_encode($this->request->query['content']);
				$contentarray = array();
				 for ($i=0; $i <substr_count($stst, ',')+1 ; $i++) { 
					 array_push($contentarray, $it[$i]);
				 }
				 
				   // $this->response->body(json_encode($contentarray));			
	    		   // return $this->response;
				 
			// foreach(json_encode($this->request->query['content'])  as $d){
    		foreach($contentarray as $d){
			
				
				
				$items="";
    			$items=explode("^",$d);
				
				$workorderlineitem = $this->Workorderlineitems->newEntity();
				$workorderlabourlineitem = $this->Workorderlabourlineitems->newEntity();
				$workorderpartslineitem = $this->Workorderpartslineitems->newEntity();
							
				$this->request->data['name']="";
            	$this->request->data['workorder_id']=$items[6];
				
				if($items[0] == 'servicetask')
				{
					$this->request->data['issue_id']=null;
					$this->request->data['servicetask_id']=$items[2];
					$this->request->data['workordertype_id']=1;
				}
				else if($items[0] == 'issue')
				{
					$this->request->data['servicetask_id']=null;	
					$this->request->data['issue_id']=$items[2];
					$this->request->data['workordertype_id']=2;
				}
				
				if($items[1] == 'labor')
				{
					$this->request->data['parts']=null;
					$this->request->data['labour']=$items[4] * $items[5];
					$this->request->data['tax']=$items[7] ;
					$this->request->data['taxtype']=$items[8] ;
				}
				else if($items[1] == 'part')
				{
					$this->request->data['labour']=null;
					$this->request->data['parts']=$items[4] * $items[5];
					$this->request->data['tax']= $items[7];
					$this->request->data['taxtype']= $items[8];
				}
           	 	
            	$workorderlineitem=$this->Workorderlineitems->patchEntity($workorderlineitem,$this->request->data);
				$workorderlineitem['customer_id']=$this->loggedinuser['customer_id'];
				if ($this->Workorderlineitems->save($workorderlineitem)) {
					
					 
				if($items[1] == 'labor')
				{
					$this->request->data["labour"] = $items[4] ;
					$this->request->data["hours"] = $items[5] ;
					$this->request->data["address_id"] = $items[3] ;
					$this->request->data["workorderlineitem_id"] = $workorderlineitem['id'] ;
					
					$workorderlabourlineitem=$this->Workorderlabourlineitems->patchEntity($workorderlabourlineitem,$this->request->data);
					$workorderlabourlineitem['customer_id']=$this->loggedinuser['customer_id'];
					if ($this->Workorderlabourlineitems->save($workorderlabourlineitem)) 
					{
						// $this->Flash->success(__('labourlineitre'));
					}
				}
					 
  				if($items[1] == 'part')
				{
  					$this->request->data["unitcost"] = $items[4] ;
					$this->request->data["quantity"] = $items[5] ;
					$this->request->data["part_id"] = $items[3] ;
					$this->request->data["workorderlineitems"] = $workorderlineitem['id'] ;
					$workorderpartslineitem=$this->Workorderpartslineitems->patchEntity($workorderpartslineitem,$this->request->data);
					$workorderpartslineitem['customer_id']=$this->loggedinuser['customer_id'];
					if ($this->Workorderpartslineitems->save($workorderpartslineitem)) 
					{
						// $this->Flash->success(__('partslineitre'));
					}
					// $workorderpartslineitem=$this->Workorderpartslineitems->patchEntity($workorderpartslineitem,$this->request->data);
					// $this->response->body(json_encode($workorderlineitem['id']));
					
				}
					
	    			// return $this->response;
            	} else {
            		$this->response->body("error");
	    			return $this->response;
            	}
				
			 } 
			 
			 return $this->response;
			 // return  $this->redirect(['action' => 'index']);
			
		}
        
    }

	public function editLaborParts()
	{
    	
      	
		if($this->request->is('ajax')) {
			
			
			$this->autoRender=false;
			$this->loadModel('Workorderlineitems');
			$this->loadModel('Workorderlabourlineitems');
			$this->loadModel('Workorderpartslineitems');
			
				$it="";
    			$it=explode(",",($this->request->query['content']));
	    		$stst = json_encode($this->request->query['content']);
				$contentarray = array();
				 for ($i=0; $i <substr_count($stst, ',')+1 ; $i++) 
					 { 
						 array_push($contentarray, $it[$i]);
					 }
				 
				   // $this->response->body(json_encode($contentarray));			
	    		   // return $this->response;
				 
			// foreach(json_encode($this->request->query['content'])  as $d){
    		foreach($contentarray as $d){
			
				
				
				$items="";
    			$items=explode("^",$d);
				
				$workorderlineitem = $this->Workorderlineitems->newEntity();
				$workorderlabourlineitem = $this->Workorderlabourlineitems->newEntity();
				$workorderpartslineitem = $this->Workorderpartslineitems->newEntity();
							
				$this->request->data['name']="";
            	$this->request->data['workorder_id']=$items[6];
				
				if($items[0] == 'servicetask')
				{
					$this->request->data['issue_id']=null;
					$this->request->data['servicetask_id']=$items[2];
					$this->request->data['workordertype_id']=1;
				}
				else if($items[0] == 'issue')
				{
					$this->request->data['servicetask_id']=null;	
					$this->request->data['issue_id']=$items[2];
					$this->request->data['workordertype_id']=2;
				}
				
				if($items[1] == 'labor')
				{
					$this->request->data['parts']=null;
					$this->request->data['labour']=$items[4] * $items[5];
				}
				else if($items[1] == 'part')
				{
					$this->request->data['labour']=null;
					$this->request->data['parts']=$items[4] * $items[5];
				}
           	 	
				$workorderlineitem = $this->Workorderlineitems->get($items[7], [ 'contain' => [] 	]);
				
            	$workorderlineitem=$this->Workorderlineitems->patchEntity($workorderlineitem,$this->request->data);
				$workorderlineitem['customer_id']=$this->loggedinuser['customer_id'];
				if ($this->Workorderlineitems->save($workorderlineitem)) {
					
					 
				if($items[1] == 'labor')
				{
					$this->request->data["labour"] = $items[4] ;
					$this->request->data["hours"] = $items[5] ;
					$this->request->data["address_id"] = $items[3] ;
					$this->request->data["workorderlineitem_id"] = $workorderlineitem['id'] ;
					
					$workorderlabourlineitem = $this->Workorderlabourlineitems->get($items[8], [ 'contain' => [] 	]);
				
					$workorderlabourlineitem=$this->Workorderlabourlineitems->patchEntity($workorderlabourlineitem,$this->request->data);
					$workorderlabourlineitem['customer_id']=$this->loggedinuser['customer_id'];
					if ($this->Workorderlabourlineitems->save($workorderlabourlineitem)) 
					{
						// $this->Flash->success(__('labourlineitre'));
					}
				}
					 
  				if($items[1] == 'part')
				{
  					$this->request->data["unitcost"] = $items[4] ;
					$this->request->data["quantity"] = $items[5] ;
					$this->request->data["part_id"] = $items[3] ;
					$this->request->data["workorderlineitems"] = $workorderlineitem['id'] ;
					
					$workorderpartslineitem = $this->Workorderpartslineitems->get($items[8], [ 'contain' => [] 	]);
					$workorderpartslineitem=$this->Workorderpartslineitems->patchEntity($workorderpartslineitem,$this->request->data);
					$workorderpartslineitem['customer_id']=$this->loggedinuser['customer_id'];
					if ($this->Workorderpartslineitems->save($workorderpartslineitem)) 
					{
						// $this->Flash->success(__('partslineitre'));
					}
					// $workorderpartslineitem=$this->Workorderpartslineitems->patchEntity($workorderpartslineitem,$this->request->data);
					// $this->response->body(json_encode($workorderlineitem['id']));
					
				}
					
	    			// return $this->response;
            	} else {
            		$this->response->body("error");
	    			return $this->response;
            	}
				
			} return $this->response;
			
		}
        
    }

public function updateSettings()
{
   	
	$this->autoRender= false;	
	$columns=$_POST['columns'];
	$visorder = $_POST['visorder'];
		
	
	$columns=isset($columns)?$columns:6;
	$userSettings = TableRegistry::get('Usersettings');
	$count = $userSettings->find('all')
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	   
	  
	   
	  
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_WORKORDERS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_WORKORDERS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Workorders'])
	    ->execute();
	   $this->response->body($res);
	
	   
   }
	
	
	
	
}

private function toPostDBDate($date){
	
		 $ret="";
		 $parts=explode("/",$date);
		 if(count($parts)==3){
		 	$ret= $date= '20' .trim($parts[2]) . "-" . trim($parts[1]) . "-" . trim($parts[0]);
			
		 }
		
	  return $ret;
}


private function getDateRangeFilters($dates,$basic)  {
	
	$sql="";	
		
	$alldates=explode(",",$dates);
	
	$pre=($basic>0)?" and ":"";
	
	$datecol=explode("-",$alldates[0]);
	
	$sql .=  count($datecol)>1? " $pre issuedate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre startdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[2]);
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	return $sql;
}  
    
public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (workorderstatus_id=" .$options[$i]
				:$usrfiter.=" or  workorderstatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workorder = $this->Workorders->get($id, [
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers', 'Issues', 'Workorderdocuments']
            
        ]);

        $this->set('workorder', $workorder);
        $this->set('_serialize', ['workorder']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$resissuesArray = $this->request->url;
		$this->log($resissuesArray);
		$resissues1 = explode('/', $resissuesArray);
		$str = implode(" ",$resissues1);
		$resissues2 = explode('/', $str);
		$resissues2 = implode(" ",$resissues2);
		$str = explode(",",$resissues1[2]);
		$stack = array();
		for ($i=0; $i < count($str) ; $i++) { 
			array_push($stack, $str[$i]);
		}
		$resissues = $stack;
		
        $workorder = $this->Workorders->newEntity();
		$liteitemTable = TableRegistry::get('Workorderlineitems');
		$servicetasksTable = TableRegistry::get('Servicetasks');
		$issuesTable = TableRegistry::get('Issues');
		$addressesTable = TableRegistry::get('Addresses');
		$partsTable = TableRegistry::get('Parts');
			
        if ($this->request->is('post')) {
        	
			
			
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
			
				// print_r($workorder['id']);
			
            $workorder['customer_id']=$this->loggedinuser['customer_id'];
			
			
            if ($this->Workorders->save($workorder)) {
            	$this->log($this->request->data);
			   if(isset($this->request->data['workorderlineitem'])){
			   	// $this->log("sssooo");
				$lineitems=$this->request->data['workorderlineitem'];
				for($i=0;$i<count($lineitems);$i++)
				{
					$lineitem= $liteitemTable->newEntity();
					$lineitem['labour']=$lineitems[$i]['labour'];
					$lineitem['parts']=$lineitems[$i]['parts'];
					$lineitem['numitems']=isset($lineitems[$i]['numitems'])?$lineitems[$i]['numitems']:0;
					$lineitem['customer_id']=$this->loggedinuser['customer_id'];
					$lineitem['servicetask_id']=isset($lineitems[$i]['servicetask_id'])?$lineitems[$i]['servicetask_id']:null;
					$lineitem['issue_id']=isset($lineitems[$i]['issue_id'])?$lineitems[$i]['issue_id']:null;
					if($lineitem['servicetask_id']!=null){
						$lineitem['workordertype_id']=1;
					}else{
						$lineitem['workordertype_id']=2;
					}
					$lineitem['workorder_id']=$workorder->id;
					
					$liteitemTable->save($lineitem);
					
				 }
				  
			    }	
				
                // $this->Flash->success(__('The workorder has been saved.'));

                 // return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
			// return $this->redirect(['action' => 'index']);
        }
        
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                        
         $servicetasks=$servicetasksTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
		 $this->set('servicetaskarr', json_encode($servicetasks));
		 
		 $issues=$issuesTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('issuearr', json_encode($issues));
		
		 $addresses=$addressesTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('addressesarr', json_encode($addresses));
		 
		 $parts=$partsTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('partssarr', json_encode($parts));
        
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues','$addresses','$parts'));
        $this->set('_serialize', ['workorder','workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues','$addresses','$parts']);
    
		// $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues'));
        // $this->set('_serialize', ['workorder','workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues']);
    	
	}

    /**
     * Edit method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	$liteitemTable = TableRegistry::get('Workorderlineitems');
		$servicetasksTable = TableRegistry::get('Servicetasks');
		$issuesTable = TableRegistry::get('Issues');
		$addressesTable = TableRegistry::get('Addresses');
		$partsTable = TableRegistry::get('Parts');
		$workorderlineitemTable = TableRegistry::get('Workorderlineitems');
		$workorderlaborlineitemTable = TableRegistry::get('Workorderlabourlineitems');
		$workorderpartslineitemTable = TableRegistry::get('Workorderpartslineitems');
		
        $workorder = $this->Workorders->get($id, [
            'contain' => []
        ]);
        if($workorder['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
             $workorder['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
		 $servicetasks=$servicetasksTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
		 $this->set('servicetaskarr', json_encode($servicetasks));
		 
		 $issues=$issuesTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('issuearr', json_encode($issues));
		
		 $addresses=$addressesTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('addressesarr', json_encode($addresses));
		 
		 $parts=$partsTable->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->all()->toArray();
		 $this->set('partssarr', json_encode($parts));
     	 
		 $workorderlaborlineitems=$workorderlaborlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 // $workorderlaborlineitems=$workorderlaborlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		 $this->set('workorderlaborlineitemsarr', json_encode($workorderlaborlineitems));
		 
		 $workorderpartslineitems=$workorderpartslineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 // $workorderlaborlineitems=$workorderlaborlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
		 $this->set('workorderpartslineitemsarr', json_encode($workorderpartslineitems));
		 
		  $this->set('workorderid',$workorder['id'] );
		 
		 // $workorderlineitemTable
     	 $workorderlineitemsst=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id'])->andwhere("labour  IS NOT null");
		 // $workorderlineitemsst=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 $this->set('workorderlineitemsstarr', json_encode($workorderlineitemsst));
		 
		 $workorderlineitemslbr=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id'])->andwhere("labour  IS NOT null");
		 // $workorderlineitemsst=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 $this->set('workorderlineitemslbrarr', json_encode($workorderlineitemslbr));
		 
		   $workorderlineitemspt=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id'])->andwhere("parts  IS NOT null");
		  $this->set('workorderlineitemsptarr', json_encode($workorderlineitemspt));
		 
		 
		  $workorderlineitems=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 // $workorderlineitemsst=$workorderlineitemTable->find('all', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->andwhere("workorder_id=".$workorder['id']);
		 $this->set('workorderlineitemsarr', json_encode($workorderlineitems));
		 
		 
		 
               
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues','$addresses','$parts','workorderlaborlineitems'));
        // $this->set('_serialize', ['workorder']);
		$this->set('_serialize', ['workorder','workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers','servicetasks','issues','$addresses','$parts','workorderlaborlineitems']);
    
    }

    /**
     * Delete method
     *
     * @param string|null $id Workorder id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workorder = $this->Workorders->get($id);
		if($workorder['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Workorders->delete($workorder)) 
		        {
		            $this->Flash->success(__('The workorder has been deleted.'));
					$this->loadModel('Workorderlineitems');
					$result = $this->Workorderlineitems->deleteLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
				    
				    $this->loadModel('Workorderlabourlineitems');
					$result1 = $this->Workorderlabourlineitems->deleteLabourLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
				    
					$this->loadModel('Workorderpartslineitems');
					$result2 = $this->Workorderpartslineitems->deletePartsLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
				} 
	        
	        else 
		        {
		            $this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
		        }
		 }
	     else
		    {
		   	    $this->Flash->error(__('You are not authorized'));
			
		    }
        return $this->redirect(['action' => 'index']);
    }

    public function deleteAll($id=null){
    	
		$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        
        $data=$this->request->data;
			
		if(isset($data))
			{
			   foreach($data as $key =>$value)
				   {
				   	   
					    $itemna=explode("-",$key);
					    if(count($itemna)== 2 && $itemna[0]=='chk')
						    {
						    	$workorder = $this->Workorders->get($value);
								if($workorder['customer_id']== $this->loggedinuser['customer_id']) 
								 {
								 	   if ($this->Workorders->delete($workorder)) 
										   {
										   		
												$this->loadModel('Workorderlineitems');
												$result = $this->Workorderlineitems->deleteLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
											    
											    $this->loadModel('Workorderlabourlineitems');
												$result1 = $this->Workorderlabourlineitems->deleteLabourLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
											    
												$this->loadModel('Workorderpartslineitems');
												$result2 = $this->Workorderpartslineitems->deletePartsLineItemsFromIndex($this->loggedinuser['customer_id'],$workorder['id']);
											   
															
									            $sucess= $sucess | true;
									         } 
								         else 
									         {
									            $failure= $failure | true;
									         }
									
								 }
								
						    }  	  
					   
				   }
			   		        
			
				if($sucess)
					{
						$this->Flash->success(__('Selected workorders has been deleted.'));
					}
		        if($failure)
			        {
						$this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
					}
			
			   }

             return $this->redirect(['action' => 'index']);	
     }
	
	public function deleteLabourLineItems($id=null)
	{
		if($this->request->is('ajax')) 
		   {
				$this->autoRender= false;
				$data=$this->request->data;
				$lineitemid = $data["lineitemid"];
				$workorderitemid = explode(',', $lineitemid);
				
			    $this->loadModel('Workorderlineitems');
			    $result2 = $this->Workorderlineitems->deleteLineItems($this->loggedinuser['customer_id'],$workorderitemid[1]);
			    
				$this->loadModel('Workorderlabourlineitems');
				$result1 = $this->Workorderlabourlineitems->deleteLabourLineItems($this->loggedinuser['customer_id'],$workorderitemid[0]);
				
				$this->response->body("success");
			    return $this->response; 
		   } 				
	}
	
	public function deletePartsLineItems($id=null)
	{
	   if($this->request->is('ajax')) 
		   {
				$this->autoRender= false;
				$data=$this->request->data;
				$lineitemid = $data["lineitemid"];
				$workorderitemid = explode(',', $lineitemid);
				
			    $this->loadModel("Workorderlineitems");
				$result2 = $this->Workorderlineitems->deleteLineItems($this->loggedinuser['customer_id'],$workorderitemid[1]);
			    
				$this->loadModel("Workorderpartslineitems");
				$result1 = $this->Workorderpartslineitems->deletePartsLineItems($this->loggedinuser['customer_id'],$workorderitemid[0]);  
				$this->response->body("success");
			    return $this->response;    
		   } 				
	}
	
	public function updateWorkordersAfterItemsDeletion($id=null)
	{
	   if($this->request->is('ajax')) 
		   {
				$this->autoRender= false;
				$data=$this->request->data;
				$values = $data["items"];
				$values = explode(',', $values);
				$wid = $values[0];
				$labour = $values[1];
				$parts = $values[2];
				
				$result = $this->Workorders->updateWorkordersAfterItemsDeletion($this->loggedinuser['customer_id'],$wid,$labour,$parts);
							   
				$this->response->body("success");
			    return $this->response;    
		   } 				
	}


}
