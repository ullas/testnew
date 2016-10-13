<?php
namespace App\Controller;

use App\Controller\AppController;

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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Drivers'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Drivers'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Addresses', 'Customers', 'Contractors', 'Stations', 'Supervisors', 'Shifts']);
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
}
