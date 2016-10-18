<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Globalusersettings Controller
 *
 * @property \App\Model\Table\GlobalusersettingsTable $Globalusersettings
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class GlobalusersettingsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Globalusersettings'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Globalusersettings'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Users']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Globalusersetting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $globalusersetting = $this->Globalusersettings->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('globalusersetting', $globalusersetting);
        $this->set('_serialize', ['globalusersetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $globalusersetting = $this->Globalusersettings->newEntity();
        if ($this->request->is('post')) {
            $globalusersetting = $this->Globalusersettings->patchEntity($globalusersetting, $this->request->data);
            $globalusersetting['customer_id']=$this->currentuser['customer_id'];
            if ($this->Globalusersettings->save($globalusersetting)) {
                $this->Flash->success(__('The globalusersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The globalusersetting could not be saved. Please, try again.'));
            }
        }
        
        $users = $this->Globalusersettings->Users->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('globalusersetting', 'users'));
        $this->set('_serialize', ['globalusersetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Globalusersetting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $globalusersetting = $this->Globalusersettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $globalusersetting = $this->Globalusersettings->patchEntity($globalusersetting, $this->request->data);
             $globalusersetting['customer_id']=$this->currentuser['customer_id'];
            if ($this->Globalusersettings->save($globalusersetting)) {
                $this->Flash->success(__('The globalusersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The globalusersetting could not be saved. Please, try again.'));
            }
        }
        $users = $this->Globalusersettings->Users->find('list', ['limit' => 200]);
        $this->set(compact('globalusersetting', 'users'));
        $this->set('_serialize', ['globalusersetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Globalusersetting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $globalusersetting = $this->Globalusersettings->get($id);
        if ($this->Globalusersettings->delete($globalusersetting)) {
            $this->Flash->success(__('The globalusersetting has been deleted.'));
        } else {
            $this->Flash->error(__('The globalusersetting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
