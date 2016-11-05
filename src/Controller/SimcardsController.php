<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Simcards Controller
 *
 * @property \App\Model\Table\SimcardsTable $Simcards
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class SimcardsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Simcards'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Simcards'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Simcards'])->toArray();
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Simcards'])->order(['id' => 'ASC'])->toArray();
        
        $fields = array();
        foreach($dbout as $value){
            $fields[] = array("name" => $value['field_name'] , "type" => $value['datatype'] );
			
        }
      
		                           
        $output =$this->Datatable->getView($fields,['Simproviders', 'Customers']);
        $out =json_encode($output);  
	
		$this->response->body($out);
	    return $this->response;
	     
             
 }  

    /**
     * View method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $simcard = $this->Simcards->get($id, [
            'contain' => ['Simproviders', 'Customers', 'Devices']
        ]);

        $this->set('simcard', $simcard);
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $simcard = $this->Simcards->newEntity();
        if ($this->request->is('post')) {
            $simcard = $this->Simcards->patchEntity($simcard, $this->request->data);
            $simcard['customer_id']=$this->currentuser['customer_id'];
            if ($this->Simcards->save($simcard)) {
                $this->Flash->success(__('The simcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The simcard could not be saved. Please, try again.'));
            }
        }
        
        $simproviders = $this->Simcards->Simproviders->find('list', ['limit' => 200])->where("customer_id=".$this->loggedinuser['customer_id'])->where("customer_id=0");
        
                        
          $customers = $this->Simcards->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('simcard', 'simproviders', 'customers'));
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $simcard = $this->Simcards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $simcard = $this->Simcards->patchEntity($simcard, $this->request->data);
             $simcard['customer_id']=$this->currentuser['customer_id'];
            if ($this->Simcards->save($simcard)) {
                $this->Flash->success(__('The simcard has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The simcard could not be saved. Please, try again.'));
            }
        }
        $simproviders = $this->Simcards->Simproviders->find('list', ['limit' => 200]);
        $customers = $this->Simcards->Customers->find('list', ['limit' => 200]);
        $this->set(compact('simcard', 'simproviders', 'customers'));
        $this->set('_serialize', ['simcard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Simcard id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $simcard = $this->Simcards->get($id);
        if ($this->Simcards->delete($simcard)) {
            $this->Flash->success(__('The simcard has been deleted.'));
        } else {
            $this->Flash->error(__('The simcard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
