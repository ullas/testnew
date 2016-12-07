<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orderstates Controller
 *
 * @property \App\Model\Table\OrderstatesTable $Orderstates * @property \App\Controller\Component\DatatableComponent $Datatable */
class OrderstatesController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Orderstates'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Orderstates'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Orderstates'])->toArray();
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Orderstates'])->order(['id' => 'ASC'])->toArray();
        
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
     * @param string|null $id Orderstate id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderstate = $this->Orderstates->get($id, [
            'contain' => ['Customers', 'Deiveryorders', 'Pickupdeiveryorders', 'Pickuporders']
        ]);

        $this->set('orderstate', $orderstate);
        $this->set('_serialize', ['orderstate']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderstate = $this->Orderstates->newEntity();
        if ($this->request->is('post')) {
            $orderstate = $this->Orderstates->patchEntity($orderstate, $this->request->data);
            $orderstate['customer_id']=$this->currentuser['customer_id'];
            if ($this->Orderstates->save($orderstate)) {
                $this->Flash->success(__('The orderstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orderstate could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Orderstates->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('orderstate', 'customers'));
        $this->set('_serialize', ['orderstate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orderstate id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderstate = $this->Orderstates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderstate = $this->Orderstates->patchEntity($orderstate, $this->request->data);
             $orderstate['customer_id']=$this->currentuser['customer_id'];
            if ($this->Orderstates->save($orderstate)) {
                $this->Flash->success(__('The orderstate has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orderstate could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Orderstates->Customers->find('list', ['limit' => 200]);
        $this->set(compact('orderstate', 'customers'));
        $this->set('_serialize', ['orderstate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Orderstate id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderstate = $this->Orderstates->get($id);
        if ($this->Orderstates->delete($orderstate)) {
            $this->Flash->success(__('The orderstate has been deleted.'));
        } else {
            $this->Flash->error(__('The orderstate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
