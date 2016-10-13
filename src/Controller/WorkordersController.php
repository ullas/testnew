<?php
namespace App\Controller;

use App\Controller\AppController;

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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Workorders'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers']);
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
            'contain' => ['Workorderstatuses', 'Vehicles', 'Vendors', 'Issuedbies', 'Assignedbies', 'Assigntos', 'Customers', 'Issues', 'Worklorderlineitems', 'Workorderdocuments']
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
        $workorder = $this->Workorders->newEntity();
        if ($this->request->is('post')) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
            $workorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                        
          $customers = $this->Workorders->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers'));
        $this->set('_serialize', ['workorder']);
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
        $workorder = $this->Workorders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workorder = $this->Workorders->patchEntity($workorder, $this->request->data);
             $workorder['customer_id']=$this->currentuser['customer_id'];
            if ($this->Workorders->save($workorder)) {
                $this->Flash->success(__('The workorder has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The workorder could not be saved. Please, try again.'));
            }
        }
        $workorderstatuses = $this->Workorders->Workorderstatuses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->orwhere("customer_id=0");
        
                
        $vehicles = $this->Workorders->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $vendors = $this->Workorders->Vendors->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $issuedbies = $this->Workorders->Issuedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assignedbies = $this->Workorders->Assignedbies->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
                
        $assigntos = $this->Workorders->Assigntos->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id']);
        
               
        $this->set(compact('workorder', 'workorderstatuses', 'vehicles', 'vendors', 'issuedbies', 'assignedbies', 'assigntos', 'customers'));
        $this->set('_serialize', ['workorder']);
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
        if ($this->Workorders->delete($workorder)) {
            $this->Flash->success(__('The workorder has been deleted.'));
        } else {
            $this->Flash->error(__('The workorder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
