<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Servicesentries Controller
 *
 * @property \App\Model\Table\ServicesentriesTable $Servicesentries
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class ServicesentriesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Servicesentries'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Servicesentries'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Vehicles', 'Vendors', 'Customers']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => ['Vehicles', 'Vendors', 'Customers', 'Servicecompleted', 'Servicedocuments']
        ]);

        $this->set('servicesentry', $servicesentry);
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $servicesentry = $this->Servicesentries->newEntity();
        if ($this->request->is('post')) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data);
            $servicesentry['customer_id']=$this->currentuser['customer_id'];
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The servicesentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicesentry could not be saved. Please, try again.'));
            }
        }
        
        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                        
          $customers = $this->Servicesentries->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('servicesentry', 'vehicles', 'vendors', 'customers'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $servicesentry = $this->Servicesentries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $servicesentry = $this->Servicesentries->patchEntity($servicesentry, $this->request->data);
             $servicesentry['customer_id']=$this->currentuser['customer_id'];
            if ($this->Servicesentries->save($servicesentry)) {
                $this->Flash->success(__('The servicesentry has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The servicesentry could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Servicesentries->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Servicesentries->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                        
          $customers = $this->Servicesentries->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        $this->set(compact('servicesentry', 'vehicles', 'vendors', 'customers'));
        $this->set('_serialize', ['servicesentry']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Servicesentry id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $servicesentry = $this->Servicesentries->get($id);
        if ($this->Servicesentries->delete($servicesentry)) {
            $this->Flash->success(__('The servicesentry has been deleted.'));
        } else {
            $this->Flash->error(__('The servicesentry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
