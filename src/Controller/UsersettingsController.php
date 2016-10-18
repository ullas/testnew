<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usersettings Controller
 *
 * @property \App\Model\Table\UsersettingsTable $Usersettings
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class UsersettingsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Usersettings'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
       
       
    }
    
    
public function ajaxdata() {
        $this->autoRender= false;
      
          
       $this->loadModel('CreateConfigs');
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Usersettings'])->order(['id' => 'ASC'])->toArray();
        
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
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersetting = $this->Usersettings->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('usersetting', $usersetting);
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersetting = $this->Usersettings->newEntity();
        if ($this->request->is('post')) {
            $usersetting = $this->Usersettings->patchEntity($usersetting, $this->request->data);
            $usersetting['customer_id']=$this->currentuser['customer_id'];
            if ($this->Usersettings->save($usersetting)) {
                $this->Flash->success(__('The usersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usersetting could not be saved. Please, try again.'));
            }
        }
        
        $users = $this->Usersettings->Users->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                $this->set(compact('usersetting', 'users'));
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersetting = $this->Usersettings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersetting = $this->Usersettings->patchEntity($usersetting, $this->request->data);
             $usersetting['customer_id']=$this->currentuser['customer_id'];
            if ($this->Usersettings->save($usersetting)) {
                $this->Flash->success(__('The usersetting has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usersetting could not be saved. Please, try again.'));
            }
        }
        $users = $this->Usersettings->Users->find('list', ['limit' => 200]);
        $this->set(compact('usersetting', 'users'));
        $this->set('_serialize', ['usersetting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usersetting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersetting = $this->Usersettings->get($id);
        if ($this->Usersettings->delete($usersetting)) {
            $this->Flash->success(__('The usersetting has been deleted.'));
        } else {
            $this->Flash->error(__('The usersetting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
