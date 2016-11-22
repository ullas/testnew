<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Distributioncenters Controller
 *
 * @property \App\Model\Table\DistributioncentersTable $Distributioncenters * @property \App\Controller\Component\DatatableComponent $Datatable */
class DistributioncentersController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Distributioncenters'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Distributioncenters'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Distributioncenters'])->toArray();
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Distributioncenters'])->order(['id' => 'ASC'])->toArray();
        
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
     * @param string|null $id Distributioncenter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $distributioncenter = $this->Distributioncenters->get($id, [
            'contain' => ['Customers', 'Deiveryorders', 'Pickupdeiveryorders', 'Pickuporders']
        ]);

        $this->set('distributioncenter', $distributioncenter);
        $this->set('_serialize', ['distributioncenter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $distributioncenter = $this->Distributioncenters->newEntity();
        if ($this->request->is('post')) {
            $distributioncenter = $this->Distributioncenters->patchEntity($distributioncenter, $this->request->data);
            $distributioncenter['customer_id']=$this->currentuser['customer_id'];
            if ($this->Distributioncenters->save($distributioncenter)) {
                $this->Flash->success(__('The distributioncenter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributioncenter could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Distributioncenters->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('distributioncenter', 'customers'));
        $this->set('_serialize', ['distributioncenter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Distributioncenter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $distributioncenter = $this->Distributioncenters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $distributioncenter = $this->Distributioncenters->patchEntity($distributioncenter, $this->request->data);
             $distributioncenter['customer_id']=$this->currentuser['customer_id'];
            if ($this->Distributioncenters->save($distributioncenter)) {
                $this->Flash->success(__('The distributioncenter has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The distributioncenter could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Distributioncenters->Customers->find('list', ['limit' => 200]);
        $this->set(compact('distributioncenter', 'customers'));
        $this->set('_serialize', ['distributioncenter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Distributioncenter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $distributioncenter = $this->Distributioncenters->get($id);
        if ($this->Distributioncenters->delete($distributioncenter)) {
            $this->Flash->success(__('The distributioncenter has been deleted.'));
        } else {
            $this->Flash->error(__('The distributioncenter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
