<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pickupdeliverytypes Controller
 *
 * @property \App\Model\Table\PickupdeliverytypesTable $Pickupdeliverytypes * @property \App\Controller\Component\DatatableComponent $Datatable */
class PickupdeliverytypesController extends AppController
{

    /**
     * Components     *
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Pickupdeliverytypes'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Pickupdeliverytypes'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Pickupdeliverytypes'])->toArray();
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Pickupdeliverytypes'])->order(['id' => 'ASC'])->toArray();
        
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
     * @param string|null $id Pickupdeliverytype id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pickupdeliverytype = $this->Pickupdeliverytypes->get($id, [
            'contain' => ['Customers', 'Deiveryorders', 'Pickupdeiveryorders', 'Pickuporders']
        ]);

        $this->set('pickupdeliverytype', $pickupdeliverytype);
        $this->set('_serialize', ['pickupdeliverytype']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pickupdeliverytype = $this->Pickupdeliverytypes->newEntity();
        if ($this->request->is('post')) {
            $pickupdeliverytype = $this->Pickupdeliverytypes->patchEntity($pickupdeliverytype, $this->request->data);
            $pickupdeliverytype['customer_id']=$this->currentuser['customer_id'];
            if ($this->Pickupdeliverytypes->save($pickupdeliverytype)) {
                $this->Flash->success(__('The pickupdeliverytype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pickupdeliverytype could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Pickupdeliverytypes->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('pickupdeliverytype', 'customers'));
        $this->set('_serialize', ['pickupdeliverytype']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pickupdeliverytype id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pickupdeliverytype = $this->Pickupdeliverytypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pickupdeliverytype = $this->Pickupdeliverytypes->patchEntity($pickupdeliverytype, $this->request->data);
             $pickupdeliverytype['customer_id']=$this->currentuser['customer_id'];
            if ($this->Pickupdeliverytypes->save($pickupdeliverytype)) {
                $this->Flash->success(__('The pickupdeliverytype has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pickupdeliverytype could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Pickupdeliverytypes->Customers->find('list', ['limit' => 200]);
        $this->set(compact('pickupdeliverytype', 'customers'));
        $this->set('_serialize', ['pickupdeliverytype']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pickupdeliverytype id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pickupdeliverytype = $this->Pickupdeliverytypes->get($id);
        if ($this->Pickupdeliverytypes->delete($pickupdeliverytype)) {
            $this->Flash->success(__('The pickupdeliverytype has been deleted.'));
        } else {
            $this->Flash->error(__('The pickupdeliverytype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
