<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IssuesAddresses Controller
 *
 * @property \App\Model\Table\IssuesAddressesTable $IssuesAddresses
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class IssuesAddressesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'IssuesAddresses'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'IssuesAddresses'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Issues', 'Addresses']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $issuesAddress = $this->IssuesAddresses->get($id, [
            'contain' => ['Issues', 'Addresses']
        ]);

        $this->set('issuesAddress', $issuesAddress);
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $issuesAddress = $this->IssuesAddresses->newEntity();
        if ($this->request->is('post')) {
            $issuesAddress = $this->IssuesAddresses->patchEntity($issuesAddress, $this->request->data);
            $issuesAddress['customer_id']=$this->currentuser['customer_id'];
            if ($this->IssuesAddresses->save($issuesAddress)) {
                $this->Flash->success(__('The issues address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issues address could not be saved. Please, try again.'));
            }
        }
        
        $issues = $this->IssuesAddresses->Issues->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                
        $addresses = $this->IssuesAddresses->Addresses->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('issuesAddress', 'issues', 'addresses'));
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $issuesAddress = $this->IssuesAddresses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $issuesAddress = $this->IssuesAddresses->patchEntity($issuesAddress, $this->request->data);
             $issuesAddress['customer_id']=$this->currentuser['customer_id'];
            if ($this->IssuesAddresses->save($issuesAddress)) {
                $this->Flash->success(__('The issues address has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The issues address could not be saved. Please, try again.'));
            }
        }
        $issues = $this->IssuesAddresses->Issues->find('list', ['limit' => 200]);
        $addresses = $this->IssuesAddresses->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('issuesAddress', 'issues', 'addresses'));
        $this->set('_serialize', ['issuesAddress']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Issues Address id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $issuesAddress = $this->IssuesAddresses->get($id);
        if ($this->IssuesAddresses->delete($issuesAddress)) {
            $this->Flash->success(__('The issues address has been deleted.'));
        } else {
            $this->Flash->error(__('The issues address could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
