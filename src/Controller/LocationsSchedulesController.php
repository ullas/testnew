<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LocationsSchedules Controller
 *
 * @property \App\Model\Table\LocationsSchedulesTable $LocationsSchedules * @property \App\Controller\Component\DatatableComponent $Datatable */
class LocationsSchedulesController extends AppController
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
    	/*
      		    
        */
       
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'LocationsSchedules'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'LocationsSchedules'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_LocationsSchedules'])->toArray();
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
                ['name'=>'close','title'=>'Close','class'=>' label-danger ']
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
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'LocationsSchedules'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Schedules', 'Locations']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Locations Schedule id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $locationsSchedule = $this->LocationsSchedules->get($id, [
            'contain' => ['Schedules', 'Locations']
        ]);

        $this->set('locationsSchedule', $locationsSchedule);
        $this->set('_serialize', ['locationsSchedule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $locationsSchedule = $this->LocationsSchedules->newEntity();
        if ($this->request->is('post')) {
            $locationsSchedule = $this->LocationsSchedules->patchEntity($locationsSchedule, $this->request->data);
            $locationsSchedule['customer_id']=$this->currentuser['customer_id'];
            if ($this->LocationsSchedules->save($locationsSchedule)) {
                $this->Flash->success(__('The locations schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locations schedule could not be saved. Please, try again.'));
            }
        }
        
        $schedules = $this->LocationsSchedules->Schedules->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $locations = $this->LocationsSchedules->Locations->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('locationsSchedule', 'schedules', 'locations'));
        $this->set('_serialize', ['locationsSchedule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Locations Schedule id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $locationsSchedule = $this->LocationsSchedules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $locationsSchedule = $this->LocationsSchedules->patchEntity($locationsSchedule, $this->request->data);
             $locationsSchedule['customer_id']=$this->currentuser['customer_id'];
            if ($this->LocationsSchedules->save($locationsSchedule)) {
                $this->Flash->success(__('The locations schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The locations schedule could not be saved. Please, try again.'));
            }
        }
        $schedules = $this->LocationsSchedules->Schedules->find('list', ['limit' => 200]);
        $locations = $this->LocationsSchedules->Locations->find('list', ['limit' => 200]);
        $this->set(compact('locationsSchedule', 'schedules', 'locations'));
        $this->set('_serialize', ['locationsSchedule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Locations Schedule id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $locationsSchedule = $this->LocationsSchedules->get($id);
        if ($this->LocationsSchedules->delete($locationsSchedule)) {
            $this->Flash->success(__('The locations schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The locations schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
