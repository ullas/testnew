<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Issues Controller
 *
 * @property \App\Model\Table\IssuesTable $Issues
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class IssuesController extends AppController
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
    public function index() {
    	
		
	}
	public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Issues'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Vehicles', 'Reportedby', 'Customers', 'Workorders', 'Servicesentries']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Vehicles', 'Reportedby', 'Customers', 'Workorders', 'Servicesentries', 'Addresses', 'Issuedocuments']
        ]);

        $this->set('issue', $issue);
        $this->set('_serialize', ['issue']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issue = $this->Issues->newEntity();
        if ($this->request->is('post')) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
            $issue['customer_id']=$this->currentuser['customer_id'];
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        
        $vehicles = $this->Issues->Vehicles->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $reportedby = $this->Issues->Reportedby->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Issues->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                
        $workorders = $this->Issues->Workorders->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $servicesentries = $this->Issues->Servicesentries->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $addresses = $this->Issues->Addresses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('issue', 'vehicles', 'reportedby', 'customers', 'workorders', 'servicesentries', 'addresses'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issue = $this->Issues->get($id, [
            'contain' => ['Addresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issue = $this->Issues->patchEntity($issue, $this->request->data);
             $issue['customer_id']=$this->currentuser['customer_id'];
            if ($this->Issues->save($issue)) {
                $this->Flash->success(__('The issue has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issue could not be saved. Please, try again.'));
            }
        }
        $vehicles = $this->Issues->Vehicles->find('list', ['limit' => 200]);
        $reportedby = $this->Issues->Reportedby->find('list', ['limit' => 200]);
        $customers = $this->Issues->Customers->find('list', ['limit' => 200]);
        $workorders = $this->Issues->Workorders->find('list', ['limit' => 200]);
        $servicesentries = $this->Issues->Servicesentries->find('list', ['limit' => 200]);
        $addresses = $this->Issues->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('issue', 'vehicles', 'reportedby', 'customers', 'workorders', 'servicesentries', 'addresses'));
        $this->set('_serialize', ['issue']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issue id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issue = $this->Issues->get($id);
        if ($this->Issues->delete($issue)) {
            $this->Flash->success(__('The issue has been deleted.'));
        } else {
            $this->Flash->error(__('The issue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
