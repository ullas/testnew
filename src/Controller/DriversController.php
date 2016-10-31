<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Drivers Controller
 *
 * @property \App\Model\Table\DriversTable $Drivers
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class DriversController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Drivers'])->order(['"order"' => 'ASC'])->toArray();
        
       $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Drivers'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DRIVERS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Drivers'])->where(['key' => 'INIT_VISIBLE_COLUMNS_DRIVERS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Active','OnLeave'],
      	                          'additional'=>[
      	                                ['name'=>'dob','title'=>'Date Of Birth'],
      	                                ['name'=>'licenceexpdate','title' =>'Licence Expiry Date'],
      	                                ['name'=>'drivingpassportexp','title'=>'Passport Expiry Date']   	                          
      	                          ]];
		 $this->set('additional',$additional);
		 $this->set('actions',$actions);	
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs','usersettings','actions','additional']);
       
       
       
    }
    
public function updateSettings()
{
   	
	$this->autoRender= false;	
	$columns=$_POST['columns'];
	$visorder = $_POST['visorder'];
		
	
	$columns=isset($columns)?$columns:6;
	$userSettings = TableRegistry::get('Usersettings');
	$count = $userSettings->find('all')
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_DRIVERS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_DRIVERS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_DRIVERS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Drivers'])
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
	
	$sql .=  count($datecol)>1? " $pre dob between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre licenceexpdate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[2]);
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .= count($datecol)>1? " $pre drivingpassportexp between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	return $sql;
}      
	
	
public function ajaxdata() {
          $this->autoRender= false;
		$usrfilter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<count($options);$i++){
        		
        	    if($options[$i]==1){
        	    	if(strlen($usrfilter)>0){
        	    		$usrfilter.= " and ";
        	    	}
					$usrfilter.= " drivers.active='true' ";
        	    }
				if($options[$i]==2){
        	    	if(strlen($usrfilter)>0){
        	    		$usrfilter.= " and ";
        	    	}
					$usrfilter.= " drivers.onleave='true' ";
        	    }
        	}
			
        }else{
        	$usrfilter.= " drivers.active='false' ";
        }
		$usrfilter.=$this->getDateRangeFilters($additional,$basic);
		
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Drivers'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Addresses','Ibuttons', 'Customers','Vehicles', 'Contractors', 'Stations', 'Supervisors', 'Shifts'],$usrfilter);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Addresses', 'Customers', 'Contractors', 'Stations', 'Supervisors', 'Shifts', 'Vehicles', 'Drivergroups', 'Languages', 'Ibuttons', 'Alerts', 'Rfids']
        ]);

        $this->set('driver', $driver);
        $this->set('_serialize', ['driver']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driver = $this->Drivers->newEntity();
        if ($this->request->is('post')) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->data);
            $driver['customer_id']=$this->currentuser['customer_id'];
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driver could not be saved. Please, try again.'));
            }
        }
        
        $addresses = $this->Drivers->Addresses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Drivers->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                
        $contractors = $this->Drivers->Contractors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $stations = $this->Drivers->Stations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $supervisors = $this->Drivers->Supervisors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $shifts = $this->Drivers->Shifts->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $vehicles = $this->Drivers->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $drivergroups = $this->Drivers->Drivergroups->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $languages = $this->Drivers->Languages->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('driver', 'addresses', 'customers', 'contractors', 'stations', 'supervisors', 'shifts', 'vehicles', 'drivergroups', 'languages'));
        $this->set('_serialize', ['driver']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Vehicles', 'Drivergroups', 'Languages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->data);
             $driver['customer_id']=$this->currentuser['customer_id'];
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The driver could not be saved. Please, try again.'));
            }
        }
        $addresses = $this->Drivers->Addresses->find('list', ['limit' => 200]);
        $customers = $this->Drivers->Customers->find('list', ['limit' => 200]);
        $contractors = $this->Drivers->Contractors->find('list', ['limit' => 200]);
        $stations = $this->Drivers->Stations->find('list', ['limit' => 200]);
        $supervisors = $this->Drivers->Supervisors->find('list', ['limit' => 200]);
        $shifts = $this->Drivers->Shifts->find('list', ['limit' => 200]);
        $vehicles = $this->Drivers->Vehicles->find('list', ['limit' => 200]);
        $drivergroups = $this->Drivers->Drivergroups->find('list', ['limit' => 200]);
        $languages = $this->Drivers->Languages->find('list', ['limit' => 200]);
        $this->set(compact('driver', 'addresses', 'customers', 'contractors', 'stations', 'supervisors', 'shifts', 'vehicles', 'drivergroups', 'languages'));
        $this->set('_serialize', ['driver']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driver = $this->Drivers->get($id);
        if ($this->Drivers->delete($driver)) {
            $this->Flash->success(__('The driver has been deleted.'));
        } else {
            $this->Flash->error(__('The driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteAll($id=null)
	{
    	$this->request->allowMethod(['post', 'deleteall']);
        $sucess=false;$failure=false;
        $data=$this->request->data;
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Drivers->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Drivers->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Service entries has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Service entries could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
