<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicleleases Controller
 *
 * @property \App\Model\Table\VehicleleasesTable $Vehicleleases
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class VehicleleasesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicleleases'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Vehicleleases'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Vendors']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Vehiclelease id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehiclelease = $this->Vehicleleases->get($id, [
            'contain' => ['Vendors']
        ]);

        $this->set('vehiclelease', $vehiclelease);
        $this->set('_serialize', ['vehiclelease']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehiclelease = $this->Vehicleleases->newEntity();
        if ($this->request->is('post')) {
            $vehiclelease = $this->Vehicleleases->patchEntity($vehiclelease, $this->request->data);
            $vehiclelease['customer_id']=$this->loggedinuser['customer_id'];
            if ($this->Vehicleleases->save($vehiclelease)) {
                $this->Flash->success(__('The vehiclelease has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclelease could not be saved. Please, try again.'));
            }
        }
        
        $vendors = $this->Vehicleleases->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('vehiclelease', 'vendors'));
        $this->set('_serialize', ['vehiclelease']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehiclelease id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehiclelease = $this->Vehicleleases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehiclelease = $this->Vehicleleases->patchEntity($vehiclelease, $this->request->data);
             $vehiclelease['customer_id']=$this->currentuser['customer_id'];
            if ($this->Vehicleleases->save($vehiclelease)) {
                $this->Flash->success(__('The vehiclelease has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehiclelease could not be saved. Please, try again.'));
            }
        }
        $vendors = $this->Vehicleleases->Vendors->find('list', ['limit' => 200]);
        $this->set(compact('vehiclelease', 'vendors'));
        $this->set('_serialize', ['vehiclelease']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehiclelease id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehiclelease = $this->Vehicleleases->get($id);
        if ($this->Vehicleleases->delete($vehiclelease)) {
            $this->Flash->success(__('The vehiclelease has been deleted.'));
        } else {
            $this->Flash->error(__('The vehiclelease could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
