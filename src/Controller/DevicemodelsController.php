<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Devicemodels Controller
 *
 * @property \App\Model\Table\DevicemodelsTable $Devicemodels
 * @property \App\Controller\Component\DatatableComponent $Datatable
 */
class DevicemodelsController extends AppController
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
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Devicemodels'])->order(['id' => 'ASC'])->toArray();
        
         $this->set('configs',$configs);	
         $this->set('_serialize', ['configs']);
         
         
         
         $this->loadModel('CreateConfigs');
         $configs=$this->CreateConfigs->find('all')->where(['table_name' => 'Devicemodels'])->order(['"order"' => 'ASC'])->toArray();
		 $this->loadModel('Usersettings');
		 $usersettings=$this->Usersettings->find('all')->where(['user_id' => $this->loggedinuser['id']])->where(['module' => 'Workorders'])->where(['key' => 'INIT_VISIBLE_COLUMNS_Devicemodels'])->toArray();
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
       $dbout=$this->CreateConfigs->find('all')->where(['table_name' => 'Devicemodels'])->order(['id' => 'ASC'])->toArray();
        
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
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $devicemodel = $this->Devicemodels->get($id, [
            'contain' => ['Customers', 'Devices']
        ]);

        $this->set('devicemodel', $devicemodel);
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $devicemodel = $this->Devicemodels->newEntity();
        if ($this->request->is('post')) {
            $devicemodel = $this->Devicemodels->patchEntity($devicemodel, $this->request->data);
            $devicemodel['customer_id']=$this->currentuser['customer_id'];
            if ($this->Devicemodels->save($devicemodel)) {
                $this->Flash->success(__('The devicemodel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The devicemodel could not be saved. Please, try again.'));
            }
        }
                
          $customers = $this->Devicemodels->Customers->find('list', ['limit' => 200])->where("id=".$this->loggedinuser['customer_id']);
      
        
                $this->set(compact('devicemodel', 'customers'));
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $devicemodel = $this->Devicemodels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $devicemodel = $this->Devicemodels->patchEntity($devicemodel, $this->request->data);
             $devicemodel['customer_id']=$this->currentuser['customer_id'];
            if ($this->Devicemodels->save($devicemodel)) {
                $this->Flash->success(__('The devicemodel has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The devicemodel could not be saved. Please, try again.'));
            }
        }
        $customers = $this->Devicemodels->Customers->find('list', ['limit' => 200]);
        $this->set(compact('devicemodel', 'customers'));
        $this->set('_serialize', ['devicemodel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Devicemodel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $devicemodel = $this->Devicemodels->get($id);
        if ($this->Devicemodels->delete($devicemodel)) {
            $this->Flash->success(__('The devicemodel has been deleted.'));
        } else {
            $this->Flash->error(__('The devicemodel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
