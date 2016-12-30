<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 */
class TripsController extends AppController
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
        $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Trips'])->order(['"order"' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Trips'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TRIPS'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Trips'])->where(['key' => 'INIT_VISIBLE_COLUMNS_TRIPS'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>['Not Void'],
      	                          'additional'=>[
      	                                ['name'=>'start_date','title'=>'Start Date'],
      	                                ['name'=>'end_date','title'=>'End Date']  	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_TRIPS'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_TRIPS'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   	}else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_TRIPS',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Trips'])
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
	
	$sql .=  count($datecol)>1? " $pre start_date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[1]);
	
	$pre=(strlen($sql)>0)?" and ":"";
	
	$sql .=  count($datecol)>1? " $pre end_date between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	$datecol=explode("-",$alldates[2]);
	//$pre=(strlen($sql)>0)?" and ":"";
	
	//$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
	
	
	return $sql;
	
	}

	public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		/*
        if($basic == 1){
        	
			$usrfiter=" servicesentries.markasvoid='true'  ";
			
        }else{
        	$usrfiter=" servicesentries.markasvoid='false'  ";
        }
		$usrfiter.=$this->getDateRangeFilters($additional,2);
		*/
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Trips'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,[ 'Customers', 'Vehicles', 'Timepolicies', 'Routes', 'Startpoints', 'Endpoints', 'Schedules', 'Tripstatuses', 'Vehiclecategories', 'Triptypes'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	     
             
 	} 
    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Customers', 'Vehicles', 'Timepolicies', 'Routes', 'Startpoints', 'Endpoints', 'Schedules', 'Tripstatuses', 'Vehiclecategories', 'Triptypes', 'Locations']
        ]);

        $this->set('trip', $trip);
        $this->set('_serialize', ['trip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->data,['associated'=>['Locations']]);
			 $trip['customer_id']=$this->loggedinuser['customer_id'];
			 $cdate = strtotime(Time::now());
			 $todatey = (date('Y', $cdate)) ;
			 $todatem = (date('m', $cdate)) ;
			 $todated = (date('d', $cdate)) ;
			 $todaydate = $todatey.'-'.$todatem.'-'.$todated;
			 
			 $trip['adt'] = $todaydate.' '.$trip['adt'];
			 $trip['aat'] = $todaydate.' '.$trip['aat'];
			 $trip['edt'] = $todaydate.' '.$trip['edt'];
			 $trip['eat'] = $todaydate.' '.$trip['eat'];
             if ($id = $this->Trips->save($trip)) {
                	return $this->redirect(['action' => 'timetable',$id->id ]);
                //$this->Flash->success(__('The trip has been saved.'));
				//return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trip could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Trips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200]);
        $timepolicies = $this->Trips->Timepolicies->find('list', ['limit' => 200]);
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $startpoints = $this->Trips->Startpoints->find('list', ['limit' => 200]);
        $endpoints = $this->Trips->Endpoints->find('list', ['limit' => 200]);
        $schedules = $this->Trips->Schedules->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $tripstatuses = $this->Trips->Tripstatuses->find('list', ['limit' => 200]);
        $vehiclecategories = $this->Trips->Vehiclecategories->find('list', ['limit' => 200]);
        $triptypes = $this->Trips->Triptypes->find('list', ['limit' => 200]);
        $locations = $this->Trips->Locations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $this->set(compact('trip', 'customers', 'vehicles', 'timepolicies', 'routes', 'startpoints', 'endpoints', 'schedules', 'tripstatuses', 'vehiclecategories', 'triptypes', 'locations'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Locations']
        ]);
		if($trip['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->data);
			$trip['customer_id']=$this->loggedinuser['customer_id'];
			
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The trip could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Trips->Customers->find('list', ['limit' => 200]);
        $vehicles = $this->Trips->Vehicles->find('list', ['limit' => 200]);
        $timepolicies = $this->Trips->Timepolicies->find('list', ['limit' => 200]);
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $startpoints = $this->Trips->Startpoints->find('list', ['limit' => 200]);
        $endpoints = $this->Trips->Endpoints->find('list', ['limit' => 200]);
        $schedules = $this->Trips->Schedules->find('list', ['limit' => 200]);
        $tripstatuses = $this->Trips->Tripstatuses->find('list', ['limit' => 200]);
        $vehiclecategories = $this->Trips->Vehiclecategories->find('list', ['limit' => 200]);
        $triptypes = $this->Trips->Triptypes->find('list', ['limit' => 200]);
        $locations = $this->Trips->Locations->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'customers', 'vehicles', 'timepolicies', 'routes', 'startpoints', 'endpoints', 'schedules', 'tripstatuses', 'vehiclecategories', 'triptypes', 'locations'));
        $this->set('_serialize', ['trip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if($trip['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Trips->delete($trip)) {
	            $this->Flash->success(__('The trip has been deleted.'));
	        } else {
	            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Trips->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Trips->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Trips has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Trips could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
 public function timetable($id)
	    {
	    	 $trip = $this->Trips->get($id, ['contain' => ['Locations'] ]);
			 $locations = $this->Trips->Locationstrips->find()->select(['id','orderid','sat','sdt','Locations.name'])->where("trip_id=".$id)
			  					 ->leftJoin('Locations', 'Locations.id = Locationstrips.location_id')->toArray();
 				
				$param = $this->request->data;
				echo $id;
				foreach($param as $key=>$value)
				{
					if(strlen($key) > 3 && substr($key,0,3) == 'sat')
					{
							$token = substr($key,3);
							$value1 = $param['sat'.$token];
							$value2 = $param['sdt'.$token];
							$value3 = $param['dys'.$token];
							$value4 = $param['dye'.$token];
							//$value5 = $param['oid'.$token];
							$timetable=$this->Trips->Locationstrips->get($token);
							$timetable['day_start'] = $value3;
							$timetable['day_end'] = $value4;
							$timetable['sat'] = $value1;
							$timetable['sdt'] = $value2;
							$timetable['customer_id'] = $this->loggedinuser['customer_id'];
							
							$this->Trips->Locationstrips->save($timetable);
					}
					
				}				
			 
			   // isset($locations[0])?$timetable=$locations[0] : $timetable=$this->Schedules->Locationsschedules->newEntity();
			   // if ($this->request->is(['patch', 'post', 'put'])) {
            	 // $timetable = $this->Schedules->Locationsschedules->patchEntity($timetable, $this->request->data);
				 // $timetable['customer_id']=$this->loggedinuser['customer_id'];
            	 // if ($this->Schedules->Locationsschedules->save($timetable)) {
                	 // $this->Flash->success(__('The timetable has been saved.'));
//  		
                	// // return $this->redirect(['action' => 'index']);
            	 // } else {
                	 // $this->Flash->error(__('The timetable could not be saved. Please, try again.'));
            	 // }
        	   // }
			  
			  
       
	   		  $times = array('00:00'=>'00:00','00:30'=>'00:30','01:00'=>'01:00');
			  $days = array('1'=>'1','2'=>'2','3'=>'3');
	   
	   
			  $this->set(compact('times', 'locations','days'));
			  // $this->set( 'locations',$locations );
              $this->set('_serialize', ['locations']);
			
	    }
}
