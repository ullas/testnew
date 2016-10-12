<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inspectionstatuses Controller
 *
 * @property \App\Model\Table\InspectionstatusesTable $Inspectionstatuses
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class InspectionstatusesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Inspectionstatuses'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Inspectionstatuses'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Customers']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inspectionstatus = $this->Inspectionstatuses->get($id, [
            'contain' => ['Customers', 'Inspections']
        ]);

        $this->set('inspectionstatus', $inspectionstatus);
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inspectionstatus = $this->Inspectionstatuses->newEntity();
        if ($this->request->is('post')) {
            $inspectionstatus = $this->Inspectionstatuses->patchEntity($inspectionstatus, $this->request->data);
            $inspectionstatus['customer_id']=$this->currentuser['customer_id'];
            if ($this->Inspectionstatuses->save($inspectionstatus)) {
                $this->Flash->success(__('The inspectionstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionstatus could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Inspectionstatuses->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('inspectionstatus', 'customers'));
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inspectionstatus = $this->Inspectionstatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inspectionstatus = $this->Inspectionstatuses->patchEntity($inspectionstatus, $this->request->data);
             $inspectionstatus['customer_id']=$this->currentuser['customer_id'];
            if ($this->Inspectionstatuses->save($inspectionstatus)) {
                $this->Flash->success(__('The inspectionstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inspectionstatus could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Inspectionstatuses->Customers->find('list', ['limit' => 200]);
        $this->set(compact('inspectionstatus', 'customers'));
        $this->set('_serialize', ['inspectionstatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Inspectionstatus id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inspectionstatus = $this->Inspectionstatuses->get($id);
        if ($this->Inspectionstatuses->delete($inspectionstatus)) {
            $this->Flash->success(__('The inspectionstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The inspectionstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
