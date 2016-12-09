<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;

/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 */
class VehiclesController extends AppController
{

    var $components = array('Datatable');
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
      
    public function index()
    {
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicles'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Vehicles'])->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Vehicles'])->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLES'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
               
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['All'],
      	                          'additional'=>[
      	                              /*  ['name'=>'issueddate','title'=>'Issued Date'],
      	                                ['name'=>'startdate','title' =>'Start Date'],
      	                                ['name'=>'completiondate','title'=>'Completion Date']
									   * */   	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLES'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_VEHICLES'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_VEHICLES',
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
		
	/*
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
	*/
	
	return $sql;
}  


 public function ajaxData() {
         $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		/*
        if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (workorderstatus_id=" .$options[$i]
				:$usrfiter.=" or  workorderstatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);
		*/
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicles'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		$contains=['Vehiclespecifications', 'Vehicleengines', 'Vehiclewheelstyres','Vehiclefluids','Vehiclepurchases','Vehicleleases'];
		
		                           
        $output =$this->Datatable->getView($fields,['Vehicletypes', 'Vehiclestatuses', 'Ownerships', 'Symbols', 'Driverdetectionmodes', 'Stations', 'Departments','Purposes','Transporters','Activedrivers','Customers'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
	     
             
    }  


 
    /**
     * View method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Vehicletypes', 'Vehiclestatuses', 'Ownerships', 'Symbols', 'Stations', 'Departments',  'Purposes', 'Transporters', 'Drivers', 'Fuelentries', 'Issues', 'Servicesentries', 'Trips', 'Vehicleengines', 'Vehiclefluids', 'Vehiclepermits', 'Vehiclepurchases', 'Vehiclespecifications', 'Vehiclewheelstyres', 'Workorders','Vehicleleases']
        ]);

        $this->set('vehicle', $vehicle);
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicle = $this->Vehicles->newEntity();
		
        if ($this->request->is('post')) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data,
            ['associated' => ['Vehiclespecifications',
		                       'Vehicleengines',
			                   'Vehiclewheelstyres',
			                   'Vehiclefluids',
			                   'Vehiclepurchases',
			                   'Vehicleleases',
			                   'Customers'
			                   ]]);
							   
            $vehicle['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehiclespecification']['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehicleengine']['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehiclewheelstyre']['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehiclefluid']['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehiclepurchase']['customer_id']=$this->loggedinuser['customer_id'];
			$vehicle['vehiclelease']['customer_id']=$this->loggedinuser['customer_id'];
			$trobjTable = TableRegistry::get('Trackingobjects');
			$trobj=$trobjTable->newEntity();
			
			
			 $trobj->name=$vehicle->name;
			 $trobjTable->save($trobj);
				
			 $vehicle['trackingobject_id']=$trobj->id;
			
			
			
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $vehicletypes = $this->Vehicles->Vehicletypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $vehiclestatuses = $this->Vehicles->Vehiclestatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $ownerships = $this->Vehicles->Ownerships->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $symbols = $this->Vehicles->Symbols->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $stations = $this->Vehicles->Stations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $departments = $this->Vehicles->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $driverdetectionmodes = $this->Vehicles->Driverdetectionmodes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $purposes = $this->Vehicles->Purposes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $transporters = $this->Vehicles->Transporters->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $currencies = $this->Vehicles->Currencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $this->set(compact('vehicle', 'vehicletypes', 'vehiclestatuses', 'ownerships', 'symbols', 'stations', 'departments',  'purposes', 'transporters', 'drivers','driverdetectionmodes','currencies'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trobjTable = TableRegistry::get('Trackingobjects');	
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Drivers','Vehiclespecifications',
		                            'Vehicleengines',
			                        'Vehiclewheelstyres',
			                        'Vehiclefluids',
			                        'Vehiclepurchases',
			                        'Vehicleleases',
			                        'Customers']
        ]);
		$trobj=$trobjTable->get($vehicle->trackingobject_id, [
            'contain' => []
        ]);
		if($vehicle['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
			$trobj->name=$vehicle->name;
		    $trobjTable->save($trobj);
            if ($this->Vehicles->save($vehicle)) {
            
			
				
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $vehicletypes = $this->Vehicles->Vehicletypes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $vehiclestatuses = $this->Vehicles->Vehiclestatuses->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $ownerships = $this->Vehicles->Ownerships->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $symbols = $this->Vehicles->Symbols->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $stations = $this->Vehicles->Stations->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $driverdetectionmodes = $this->Vehicles->Driverdetectionmodes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        
        $departments = $this->Vehicles->Departments->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $currencies = $this->Vehicles->Currencies->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $purposes = $this->Vehicles->Purposes->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $transporters = $this->Vehicles->Transporters->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']])->orwhere(['customer_id' => '0']) ;
        $drivers = $this->Vehicles->Drivers->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'vehicletypes','driverdetectionmodes', 'vehiclestatuses', 'ownerships', 'symbols', 'stations', 'departments',  'purposes', 'transporters', 'drivers','currencies'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		$trackingObjTable = TableRegistry::get('Trackingobjects');
        $vehicle = $this->Vehicles->get($id);
		
		 
		if($vehicle['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Vehicles->delete($vehicle)) {
	        	$trobj=$trackingObjTable->get($vehicle['trackingobject_id']);
				$trackingObjTable->delete($trobj);
	            $this->Flash->success(__('The vehicle has been deleted.'));
	        } else {
	            $this->Flash->error(__('The vehicle could not be deleted. Please, try again.'));
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
			
		if(isset($data)){
		   foreach($data as $key =>$value){
		   	   		
		   	   	$itemna=explode("-",$key);
			    
			    if(count($itemna)== 2 && $itemna[0]=='chk'){
			    	
					$record = $this->Vehicles->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Vehicles->delete($record)) {
						   	$trobj=$trackingObjTable->get($record['trackingobject_id']);
							$trackingObjTable->delete($trobj);
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Vehicles has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Vehicles could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
}
