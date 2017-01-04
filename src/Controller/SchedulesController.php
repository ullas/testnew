<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules * @property \App\Controller\Component\DatatableComponent $Datatable */
class SchedulesController extends AppController
{

    /**
     * Components     *
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Schedules'])->order(['id' => 'ASC'])->toArray();
        
         	 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Schedules'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SCHEDULES'])->toArray();
         if(isset($usersettings[0]['value'])){
         	$this->set('usersettings',$usersettings);	
			
         }else{
         	
         	$this->loadModel('Globalusersettings');
		    $usersettings=$this->Globalusersettings->find('all')->where(['module' => 'Schedules'])->where(['key' => 'INIT_VISIBLE_COLUMNS_SCHEDULES'])->toArray();
            $this->set('usersettings',$usersettings);
			
         }
		 $actions =[
                
                ['name'=>'delete','title'=>'Delete','class'=>' label-danger ']
                ];
         $additional= [
      	                          'basic'=>[],
      	                          'additional'=>[
      	                                ['name'=>'validfrom','title'=>'Valid From'],
      	                                ['name'=>'validtill','title'=>'Valid Till']  	                          
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
	   ->where(['key' => 'INIT_VISIBLE_COLUMNS_SCHEDULES'])
	  ->where(['user_id' => $this->loggedinuser['id']])
	   ->count();
	
	if($count>0)	{	 
	
	$query = $userSettings->query();
	$res=$query->update()
	    ->set(['value' => $columns])
		->set(['value1' => $visorder])
	    ->where(['key' => 'INIT_VISIBLE_COLUMNS_SCHEDULES'])
	    ->where(['user_id' => $this->loggedinuser['id']])
	    ->execute();
	$this->response->body($res);
	
   }else{
   	  
	   $query1 = $userSettings->query();
	   $res=$query1->insert(['key','value','user_id','module'])
	   ->values(
	       ['key'=>'INIT_VISIBLE_COLUMNS_SCHEDULES',
	        'value'=>$columns,
	        'user_id'=>$this->loggedinuser['id'],
	        'module'=>'Schedules'])
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
		
		$sql .=  count($datecol)>1? " $pre validfrom between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		$datecol=explode("-",$alldates[1]);
		
		$pre=(strlen($sql)>0)?" and ":"";
		
		$sql .=  count($datecol)>1? " $pre validtill between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		// $datecol=explode("-",$alldates[2]);
		
		
		//$pre=(strlen($sql)>0)?" and ":"";
		
		//$sql .= count($datecol)>1? " $pre completiondate between '" . $this->toPostDBDate($datecol[0]) . "' and '" . $this->toPostDBDate($datecol[1]) . "'": "" ;
		
		return $sql;
		}
	
    
		public function ajaxdata() {
        $this->autoRender= false;
		$usrfiter="";
		$basic = isset($this->request->query['basic'])?$this->request->query['basic']:"" ;
		$additional = isset($this->request->query['additional'])?$this->request->query['additional']:"";
		
		
     /*   if($basic != -1){
        	$options=explode(",",$basic);
			
        	for($i=0;$i<sizeof($options);$i++){
        	    $i==0?$usrfiter.="   (workorderstatus_id=" .$options[$i]
				:$usrfiter.=" or  workorderstatus_id=" .$options[$i];
        	}
			$usrfiter.=(") ");
        }
		$usrfiter.=$this->getDateRangeFilters($additional,$basic);*/
		
		$usrfiter.=$this->getDateRangeFilters($additional,0);
		
		
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Schedules'])->order(['"order"' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
        
		
		
		                           
        $output =$this->Datatable->getView($fields,[ 'Startlocs', 'Endlocs', 'Routes', 'Customers', 'Timepolicies', 'DefaultDrivers', 'DefaultVehs'],$usrfiter);
        $out =json_encode($output);  
	   
		$this->response->body($out);
	    return $this->response;
	}

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Startlocs', 'Endlocs', 'Routes', 'Customers', 'Timepolicies', 'DefaultDrivers', 'DefaultVehs', 'Locations', 'Subscriptions', 'Trips']
        ]);

        $this->set('schedule', $schedule);
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data,['associated'=>['Drivers','Locations']]);
            $schedule['customer_id']=$this->loggedinuser['customer_id'];
			
			
			
			if ($id = $this->Schedules->save($schedule)) {
            	$nodays = $schedule['nodays'];
				
                //$this->Flash->success(__('The schedule has been saved.'));
				return $this->redirect(['action' => 'timetable',$id->id ]);
 				//return $this->redirect(['action' => 'timetable/'.$nodays.'',$id->id ]);
				//return $this->redirect(['action' => 'timetable',$id->id,$nodays ]);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        
        $startlocs = $this->Schedules->Startlocs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $endlocs = $this->Schedules->Endlocs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $routes = $this->Schedules->Routes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $timepolicies = $this->Schedules->Timepolicies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        $defaultDrivers = $this->Schedules->DefaultDrivers->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $defaultVehs = $this->Schedules->DefaultVehs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        $locations = $this->Schedules->Locations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $passengergroups = $this->Schedules->Passengergroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']]) ;
        $drivers = $this->Schedules->Drivers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']]) ;
        
        $this->set(compact('schedule','passengergroups', 'startlocs', 'endlocs', 'routes', 'customers', 'timepolicies', 'defaultDrivers', 'defaultVehs', 'locations','drivers'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Locations','Drivers']
        ]);
		if($schedule['customer_id']!= $this->loggedinuser['customer_id'])
		{
			 $this->Flash->success(__('You are not Authorized.'));
			 return $this->redirect(['action' => 'index']);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->data);
             $schedule['customer_id']=$this->loggedinuser['customer_id'];
            if ($id =$this->Schedules->save($schedule)) {
               		
               	$nodays = $schedule['nodays'];
				return $this->redirect(['action' => 'timetable',$id->id ]);
               // $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
        }
        
        $startlocs = $this->Schedules->Startlocs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $endlocs = $this->Schedules->Endlocs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $routes = $this->Schedules->Routes->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $customers = $this->Schedules->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      	$timepolicies = $this->Schedules->Timepolicies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        $defaultDrivers = $this->Schedules->DefaultDrivers->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $defaultVehs = $this->Schedules->DefaultVehs->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        $locations = $this->Schedules->Locations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        $passengergroups = $this->Schedules->Passengergroups->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']]) ;
        $drivers = $this->Schedules->Drivers->find('list', ['limit' => 200])->where(['customer_id' => $this->loggedinuser['customer_id']]) ;
        $this->set(compact('schedule','drivers','passengergroups', 'startlocs', 'endlocs', 'routes', 'customers', 'timepolicies', 'defaultDrivers', 'defaultVehs', 'locations'));
        $this->set('_serialize', ['schedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
		if($schedule['customer_id'] = $this->loggedinuser['customer_id'])
		{
	        if ($this->Schedules->delete($schedule)) {
	            $this->Flash->success(__('The schedule has been deleted.'));
	        } else {
	            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
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
			    	
					$record = $this->Schedules->get($value);
					
					 if($record['customer_id']== $this->loggedinuser['customer_id']) {
					 	
						   if ($this->Schedules->delete($record)) {
					           $sucess= $sucess | true;
					        } else {
					           $failure= $failure | true;
					        }
					}
				}  	  
			}
		   		        
		
				if($sucess){
					$this->Flash->success(__('Selected Schedules has been deleted.'));
				}
		        if($failure){
					$this->Flash->error(__('The Schedules could not be deleted. Please, try again.'));
				}
		
		   }

             return $this->redirect(['action' => 'index']);	
     }
	
	
	public function timetable($id)
	    {
	    	 $schedule = $this->Schedules->get($id, ['contain' => ['Locations'] ]);
			 
			  $locations = $this->Schedules->Locationsschedules->find()->select(['id','orderid','sat','sdt','Locations.name'])->where("schedule_id=".$id)
			  					 ->leftJoin('Locations', 'Locations.id = Locationsschedules.location_id')->toArray();
 				$nodays = $schedule['nodays'];
				$strTime = $schedule['start_time'];
				$endTime = $schedule['end_time'];
				$this->log(json_encode($locations));
				//$this->log($sttime);
				//$this->log($endtime);
				$param = $this->request->data;
				echo $strTime;
				foreach($param as $key=>$value)
				{
					if(strlen($key) > 3 && substr($key,0,3) == 'sat')
					{
							$token = substr($key,3);
							$value1 = $param['sat'.$token];
							$value2 = $param['sdt'.$token];
							$value3 = $param['dys'.$token]+ 1;
							$value4 = $param['dye'.$token]+ 1;
							//$value5 = $param['oid'.$token];
							$timetable=$this->Schedules->Locationsschedules->get($token);
							$timetable['day_start'] = $value3;
							$timetable['day_end'] = $value4;
							$timetable['sat'] = $value1;
							$timetable['sdt'] = $value2;
							$timetable['customer_id'] = $this->loggedinuser['customer_id'];
							
							$this->Schedules->Locationsschedules->save($timetable);
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
			  
			  
       
	   		  $times = array('10:00'=>'10:00','10:30'=>'10:30','10:35'=>'10:35','10:45'=>'10:45','11:00'=>'11:00','11:30'=>'11:30','11:35'=>'11:35','11:40'=>'11:40','11:50'=>'11:50','12:00'=>'12:00');
			   for($s=1;$s<=$nodays;$s++)
			        {
			  			$days[$s] = $s;
			  	    }
			  //$days = array('1'=>'1','2'=>'2','3'=>'3');
			  // $date_arr= explode(" ", $sttime);
				// $date1= $date_arr[0];
				// $strTime= $date_arr[1];
// 				
				// $date_arr= explode(" ", $endtime);
				// $date2= $date_arr[0];
				// $endTime= $date_arr[1];
	   
	   print_r(json_encode($days));
			  $this->set(compact('times', 'locations','days','strTime','endTime','nodays'));
			  // $this->set( 'locations',$locations );
              $this->set('_serialize', ['locations']);
			
	    }
	
}
